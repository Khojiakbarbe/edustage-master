<?php
include ('../connect.php');

$id = $_GET['id'];

$pdoStatement = $pdo->prepare("
    DELETE FROM `message` WHERE id=$id    
");

if ($pdoStatement->execute()) {
    header('location: index.php');
}
?>