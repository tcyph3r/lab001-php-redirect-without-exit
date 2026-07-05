<?php
$host = 'db';
$db   = 'lab001';
$user = 'lab';
$pass = 'lab';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
