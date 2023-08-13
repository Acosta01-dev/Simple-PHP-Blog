<?php
session_start();
require_once "../php/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['user']; 

    try {
        $sql = 'SELECT user_id, password FROM user WHERE name = :username'; 
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $userId = $result['user_id'];
            $storedPassword = $result['password'];

            $providedPassword = $_POST['password']; 
            if (password_verify($providedPassword, $storedPassword)) {
                $_SESSION['user_id'] = $userId;
                header('Location: ../pages/admin');
                exit();
            } else {
                echo "Contraseña incorrecta. Inténtalo de nuevo.";
            }
        } else {
            echo "No se encontró ningún usuario con el nombre $username";
        }
    } catch (PDOException $e) {
        echo "Error de la base de datos: " . $e->getMessage();
    }
}
?>
