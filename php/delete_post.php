<?php

session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id) {
    header('location:../index');
}

require_once '../php/db_connect.php';

if (isset($_GET['post_id'])) {
    $post_id = intval($_GET['post_id']);

    $sql = 'DELETE FROM post WHERE post_id = :id';
    $stmt = $connection->prepare($sql);

    $stmt->bindParam(':id', $post_id);

    try {
        $stmt->execute();
        
        header('location: ../pages/admin?deleted');

    } catch (PDOException $e) {
        echo "Error deleting data: " . $e->getMessage();
    }
} else {
    echo "No post_id parameter provided.";
}
?>
