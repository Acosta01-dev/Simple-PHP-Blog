<?php
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
        echo "Error al borrados datos: " . $e->getMessage();
    }
} else {
    echo "No post_id parameter provided.";
}
?>