<?php
$host = 'localhost';
$user = 'root';
$password = 'alvee';
$dbname = 'bookstore';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$pdo = new PDO($dsn, $user, $password);

