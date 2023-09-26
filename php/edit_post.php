<?php
// Start a session to access user data
session_start();

// Get the user ID from the session or set it to null
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Redirect to the index page if the user is not logged in
if (!$user_id) {
    header('location:../index');
}

// Include the database connection
require_once "../php/db_connect.php";

// Validate and sanitize the post_id
if (isset($_GET['post_id']) && is_numeric($_GET['post_id'])) {
    $postId = $_GET['post_id'];
} else {
    // Handle the error: TODO
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and validate form data
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $content = htmlspecialchars($_POST['content']);
    $category = htmlspecialchars($_POST['category']);
    $featured = isset($_POST['featured']) && $_POST['featured'] === '1';

    // Validate and sanitize file upload
    if (isset($_FILES["image"]["name"])) {
        $targetDir = "../assets/images/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowedExtensions = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $allowedExtensions) && $_FILES["image"]["size"] > 0) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $imageName = basename($_FILES["image"]["name"]);

                $sql = "UPDATE post SET image = :image WHERE post_id = :post_id AND user_id = :user_id";
                $stmt = $connection->prepare($sql);
                $stmt->bindValue(':post_id', $postId, PDO::PARAM_INT);
                $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindValue(':image', $imageName ?? null, PDO::PARAM_STR);
                $stmt->execute();
            } else {
                // Handle the error
                echo "Error uploading the image.";
            }
        } else {
            // Handle the error
            echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }

    // Ensure only 1 post can be featured
    if ($featured) {
        $resetFeaturedSql = "UPDATE post SET featured = 0";
        $resetFeaturedStmt = $connection->prepare($resetFeaturedSql);
        $resetFeaturedStmt->execute();
    }

    // Update the database
    $is_admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : null;
    if (isset($is_admin)) {
        $sql = "UPDATE post SET title = :title, description = :description, content = :content, category = :category, featured = :featured WHERE post_id = :post_id";
    } else {
        $sql = "UPDATE post SET title = :title, description = :description, content = :content, category = :category, featured = :featured WHERE post_id = :post_id AND user_id = :user_id";
    }

    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->bindValue(':featured', $featured, PDO::PARAM_INT);
    $stmt->bindValue(':post_id', $postId, PDO::PARAM_INT);

    if (!isset($is_admin)) {    // Avoid error "number of bound variables does not match number of tokens in"
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    }

    if ($stmt->execute()) {
        // Successfully updated the blog post
        // Redirect or show a success message to the user
        header('Location: ../pages/admin?edited');
        exit();
    } else {
        // Error occurred while updating the blog post
        // Handle the error (e.g., log, display a user-friendly message)
        echo "Error updating the blog post.";
    }
}

// Fetch the blog post data for pre-filling the form
$is_admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : null;
if (isset($is_admin)) {
    $sql = "SELECT * FROM post WHERE post_id = :post_id";
} else {
    $sql = "SELECT * FROM post WHERE post_id = :post_id AND user_id = :user_id";
}


$stmt = $connection->prepare($sql);
if (!isset($is_admin)) {    // Avoid error "number of bound variables does not match number of tokens in"
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
}

$stmt->bindValue(':post_id', $postId, PDO::PARAM_INT);
$stmt->execute();

$blogPost = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit a post</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- Responsive navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../index">Go Back</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h1 class="mb-4">Bootstrap 5 Form Example</h1>
        <form enctype="multipart/form-data" action="../php/edit_post?post_id=<?= $_GET['post_id']; ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $blogPost['title'] ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="<?= $blogPost['description'] ?>">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" rows="3"
                    name="content"><?= $blogPost['content'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" id="category" name="category">
                    <option value="Web Design" <?php if ($blogPost['category'] === 'Web Design') echo 'selected'; ?>>Web
                        Design</option>
                    <option value="HTML" <?php if ($blogPost['category'] === 'HTML') echo 'selected'; ?>>HTML</option>
                    <option value="Freebies" <?php if ($blogPost['category'] === 'Freebies') echo 'selected'; ?>>Freebies</option>
                    <option value="JavaScript" <?php if ($blogPost['category'] === 'JavaScript') echo 'selected'; ?>>JavaScript</option>
                    <option value="CSS" <?php if ($blogPost['category'] === 'CSS') echo 'selected'; ?>>CSS</option>
                    <option value="Tutorials" <?php if ($blogPost['category'] === 'Tutorials') echo 'selected'; ?>>Tutorials</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="currentImage" class="form-label">Current Image</label>
                <input type="text" class="form-control" id="currentImage" name="currentImage"
                    value="<?= $blogPost['image'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">New Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="check" name="featured"
                    value="1" <?php echo ($blogPost['featured'] == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="check">Featured post?</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
