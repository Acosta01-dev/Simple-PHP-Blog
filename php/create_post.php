<?php
session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id) {
    header('location:../index');
}

require_once '../php/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    if (isset($_POST["featured"]) && $_POST["featured"] === "1") {
        $featured = true;
        // Reset all other posts to not featured
        $resetFeaturedSql = "UPDATE post SET featured = 0";
        $resetFeaturedStmt = $connection->prepare($resetFeaturedSql);
        $resetFeaturedStmt->execute();
    } else {
        $featured = false;
    }

    $targetDir = "../assets/images/uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imageName = basename($_FILES["image"]["name"]); // Only store the image name
            $date = date("Y-m-d");
            $sql = "INSERT INTO post (title, description, content, featured, category, date, user_id, image) 
            VALUES (:title, :description, :content, :featured, :category, :date, :user_id, :image)";
            
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':featured', $featured, PDO::PARAM_BOOL);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':image', $imageName); // Store the image name

            try {
                $stmt->execute();
                header("location: ../pages/admin?added");
                exit(); // Terminate script execution after redirect
            } catch (PDOException $e) {
                echo "Error inserting data: " . $e->getMessage();
            }
        } else {
            echo "There was an error uploading the image.";
        }
    } else {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
    }

    $connection = null;
}
?>
