<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'blog_db';

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
