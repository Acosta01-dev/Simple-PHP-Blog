<?php
require_once "../php/db_connect.php";

if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];

    // Consulta para obtener la información del post
    $sqlPost = 'SELECT * FROM post WHERE post_id = :postId';
    $stmtPost = $connection->prepare($sqlPost);
    $stmtPost->bindParam(':postId', $postId);
    $stmtPost->execute();

    $post = $stmtPost->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        // Consulta para obtener el nombre del autor desde la tabla user
        $sqlAuthor = 'SELECT name FROM user WHERE user_id = :authorId';
        $stmtAuthor = $connection->prepare($sqlAuthor);
        $stmtAuthor->bindParam(':authorId', $post['user_id']);
        $stmtAuthor->execute();

        $author = $stmtAuthor->fetch(PDO::FETCH_ASSOC);

        $connection = null;
    } else {
        echo "El ID del post no es válido.";
    }
} else {
    echo "No se ha proporcionado ningún ID de post.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="../assets/css/styles.css" rel="stylesheet" />

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

    <!-- Blog Post Content -->
    <div class="container min-vh-100">
        <div class="row">
            <div class="">
                <?php
                try {
                    // Verifica si se encontró el post antes de imprimir el contenido
                    if ($post) { ?>
                        <div class="blog-post">
                            <div class="d-flex justify-content-center">
                                <img class="p-5 img-fluid " style="height: 25rem;"src="../assets/images/uploads/<?= $post['image']; ?>" alt="Blog post image">
                            </div>
                            <hr class="my-3">
                            <div class="blog-post-content">
                                <h2 class="blog-post-title text-center">
                                    <?= $post['title'] ?>
                                </h2>
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <p class="mb-0">
                                        Author:
                                        <?php echo $author['name']; ?>
                                    </p>
                                    <i class="mb-0 blog-post-date">
                                        Posted on
                                        <?= $post['date'] ?>
                                    </i>
                                </div>
                                <p class="blog-post-text mb-5" style="word-wrap: break-word;">
                                    <?= $post['content'] ?>
                                </p>
                            </div>
                            <?php if ($post['featured'] == '1') { ?>
                                <div class="blog-post-footer d-flex justify-content-end">
                                    <span class="badge text-bg-primary mb-5">Featured</span>
                                </div>
                            <?php } ?>
                        </div>

                        <?php
                    } else {
                        echo "<h1>Post not found</h1>";
                    }
                } catch (PDOException $e) {
                    die('Error: ' . $e->getMessage());
                }
                ?>
            </div>
        </div>
    </div>




    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="./assets/js/scripts.js"></script>
</body>

</html>