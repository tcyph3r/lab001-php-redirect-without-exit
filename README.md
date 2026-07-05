# Lab 001 - PHP Redirect Without Exit

**CWE:** CWE-306 (Missing Authentication for Critical Function)
**Severity:** Critical
**Stack:** PHP 8.2, Apache, MariaDB 10.6, Docker

## What this lab demonstrates

A PHP session check sends a 302 redirect when no valid session exists but never calls `exit()` afterward. PHP keeps executing, queries the database, builds the full page, and delivers it inside the same response body as the redirect. The browser follows the redirect and shows the login page. A proxy like Burp Suite reads the response body directly and sees everything.

## Setup

```
docker compose up --build
```

App runs at http://localhost:8080

## Credentials

| Username | Password |
|----------|----------|
| admin    | admin123 |

## The vulnerable file

`app/admin/includes/session.php`

```php
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    // exit() is missing here
}
```

## How to reproduce

1. Start Burp Suite and set your browser to proxy through it
2. Without logging in, navigate to http://localhost:8080/admin/records.php
3. The browser lands on the login page
4. In Burp, find the 302 response to /admin/records.php
5. Check the response body - the full admin page and its data are there

## The fix

Add one line after the redirect header:

```php
if (!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit();
}
```

## Writeup

See `writeup.md` for the full breakdown.
