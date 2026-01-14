<?php
$host = "sql113.infinityfree.com";
$user = "if0_40899389";  // Remove the extra quote
$pass = "2yqMf9vT7F4Y";
$dbname = "if0_40899389_edutrack";  // Remove the extra quote

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
