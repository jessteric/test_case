<?php
$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "test_case_db";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Error connection: " . $mysqli->connect_error);
}
