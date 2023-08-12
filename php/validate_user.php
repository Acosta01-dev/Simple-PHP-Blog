<?php
session_start();
require_once "../php/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['user'];

    try {
        $sql = 'SELECT user_id FROM user WHERE name = :name';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':name', $user, PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            $userId = $result['user_id'];
            echo "El ID de usuario para el nombre $user es: $userId";
            $_SESSION['user_id'] = $userId;
            header('location: ../pages/admin');
        } else {
            echo "No se encontró ningún usuario con el nombre $user";
        }
    } catch (PDOException $e) {
        echo "Error de la base de datos: " . $e->getMessage();
    }
}
?>
