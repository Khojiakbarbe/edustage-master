<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'imitixon_php';
$dsn = "mysql:host=$host; dbname=$dbname";
$pdo = new PDO($dsn, $user, $password);


session_start();