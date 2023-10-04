<?php
require_once ("classes/Database.php");

$db = new Database();
$db->createDatabase();
$db->createTable();
$db->closeConnection();

