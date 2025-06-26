<?php
require_once 'db/config.php';
$id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM books WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
}