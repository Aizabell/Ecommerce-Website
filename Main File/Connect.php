<?php
require_once "Database.php";

$host = "localhost";
$dbname = "mysql";
$username = "root";
$password ="";
$mydb ="Karaweik_Database";

$connection = new Database($host, $dbname, $username, $password);
$pdo = $connection->getConnection();
$pdo->exec("USE $mydb");


?>