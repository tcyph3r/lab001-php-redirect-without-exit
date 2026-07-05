# Writeup - Lab 001: PHP Redirect Without Exit

## The vulnerability

During a web application assessment, I accessed a protected admin route without any credentials. The browser redirected me to the login page as expected. But the 302 response body was over 90,000 bytes. A redirect should carry almost nothing.

Clicking Render in Burp showed the full admin dashboard sitting inside that redirect response.

## Root cause

The session check in `app/admin/includes/session.php` correctly detects a missing session and sends the redirect header. But there is no `exit()` call afterward.

```php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    // execution continues here
}
```

PHP treats `header()` as metadata queued for the response. It does not stop execution. So after setting the Location header, PHP continues into `records.php`, queries the database, renders the full page, and appends it to the same response body.

The browser only sees the 302 status code and follows the redirect. A proxy reads the full response including the body.

## Reproduction steps

1. Start the lab: `docker compose up --build`
2. Open Burp Suite, proxy your browser through it
3. Without logging in, visit http://localhost:8080/admin/records.php
4. Observe the browser redirect to the login page
5. In Burp HTTP history, open the 302 response to /admin/records.php
6. Scroll the response body or click Render
7. The complete admin records page is visible

## Impact

Any unauthenticated user who intercepts traffic (or uses a proxy) can access every protected page and all underlying data without credentials. Authentication is effectively bypassed across every route that uses this session check pattern.

## Fix

```php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}
```

One line. `exit()` halts PHP execution immediately. The response body stays empty. The redirect works as intended.

## What to look for in real applications

When reviewing PHP source code, check every authentication gate for `exit()` or `die()` after redirect headers. Any missing call on a protected route is exploitable the same way regardless of how complex the surrounding logic is.
