<?php
require_once "./php/db_connect.php";

try {
    // Define the number of results per page
    define('RESULTS_PER_PAGE', 4);

    // Get the current page number from the URL
    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Calculate the offset for the query
    $offset = ($current_page - 1) * RESULTS_PER_PAGE;

    // Main query to get all results without filtering
    $sql = 'SELECT * FROM post';

    if (isset($_GET['category'])) {
        $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);

        // Specific query for the selected category
        $sql = 'SELECT * FROM post WHERE category = :category';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();

        $blogPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else if (isset($_POST['search_term'])) {
        $search_term = $_POST['search_term'];
        $escaped_search_term = '%' . $search_term . '%'; // No need to use $connection->quote() here

        // Specific query for the performed search
        $sql = "SELECT * FROM post WHERE title LIKE :search_term OR description LIKE :search_term";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':search_term', $escaped_search_term, PDO::PARAM_STR);
        $stmt->execute();

        $blogPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Main query to get all results without filtering
        $stmt = $connection->prepare($sql);
        $stmt->execute();

        $blogPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($blogPosts) === 0) {
            echo 'No blog entries found.';
        }
    }

    $total_results = count($blogPosts);

    // Calculate the total number of pages
    $total_pages = ceil($total_results / RESULTS_PER_PAGE);

    // Apply pagination to the result of the main query
    $blogPosts = array_slice($blogPosts, $offset, RESULTS_PER_PAGE);

} catch (PDOException $e) {
    error_log('PDOException: ' . $e->getMessage());

    die('Sorry, an error occurred on the page. Please try again later.');
}

$connection = null;

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
    <link href="./assets/css/styles.css" rel="stylesheet" />

</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="./index">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="./pages/login">Log In</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!"></a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <?php
                // Check if there is a featured post
                $featuredPost = null;
                foreach ($blogPosts as $post) {
                    if ($post['featured'] == true) {
                        $featuredPost = $post;
                        break;
                    }
                }
                // If there is a featured post, display it
                if ($featuredPost) {
                    ?>
                    <div class="card mb-4">
                        <a href="./pages/open_post?post_id=<?= $featuredPost['post_id']; ?> "  style="height: 17rem;">
                            <div class="aspect-ratio-container">
                                <img class="aspect-ratio-content"
                                    src="./assets/images/uploads/<?= $featuredPost['image']; ?>"
                                    alt="<?= $featuredPost['image']; ?>"  style="height: 17rem;" />
                            </div>
                        </a>

                        <div class="card-body">
                            <div class="small text-muted">
                                <?= $featuredPost['date']; ?> •
                                <?= $featuredPost['category']; ?>

                            </div>
                            <h2 class="card-title">
                                <?= $featuredPost['title']; ?>
                            </h2>
                            <p class="card-text">
                                <?= $featuredPost['description']; ?>
                            </p>
                            <a class="btn btn-primary"
                                href="../pages/open_post?post_id=<?= $featuredPost['post_id']; ?>">Read more
                                →</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <!-- Blog posts -->
                <div class="row">
                    <?php
                    // Iterate through blog posts and create divs with class "col-lg-6" using index $i to avoid using foreach ($blogPosts as $blogPost) 
                    $cantidad = count($blogPosts);
                    if ($cantidad > 4) {
                        $cantidad = 4;
                    }
                    for ($i = 0; $i < $cantidad; $i++) {
                        // If the index is divisible by 2, create a new div col-lg-6
                        if ($i % 2 === 0) {
                            ?>
                            <div class="col-lg-6">
                                <?php
                        }
                        // Print the content of the post
                        ?>
                            <div class="card mb-4">
                                <div class="card-image-container">
                                    <a href="#!">
                                        <!-- The image within the card -->
                                        <div class="aspect-ratio-container">
                                            <img class="aspect-ratio-content"
                                                src="./assets/images/uploads/<?= $blogPosts[$i]['image']; ?>"
                                                alt="<?= $blogPosts[$i]['image']; ?>" />
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="small text-muted">
                                        <?= $blogPosts[$i]['date']; ?> •
                                        <?= $blogPosts[$i]['category']; ?>
                                    </div>
                                    <h2 class="card-title h4">
                                        <?= $blogPosts[$i]['title']; ?>
                                    </h2>
                                    <p class="card-text">
                                        <?= $blogPosts[$i]['description']; ?>
                                    </p>
                                    <a class="btn btn-primary"
                                        href="./pages/open_post?post_id=<?= $blogPosts[$i]['post_id'] ?>">Read more
                                        →</a>
                                </div>
                            </div>

                            <?php
                            // If the index is divisible by 2 or if it's the last post, close the div col-lg-6
                            if ($i % 2 === 1 || $i === count($blogPosts) - 1) {
                                ?>
                            </div>
                            <?php
                            }
                    }
                    ?>
                </div>
                <!-- Pagination-->
                <nav aria-label="Pagination">
                    <hr class="my-0" />
                    <ul class="pagination justify-content-center my-4">
                        <?php if ($current_page > 1): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $current_page - 1; ?>"
                                    tabindex="-1">&laquo; Prev</a></li>
                        <?php else: ?>
                            <li class="page-item disabled"><span class="page-link">&laquo; Prev</span></li>
                        <?php endif; ?>

                        <?php for ($p = 1; $p <= $total_pages; $p++): ?>
                            <?php if ($current_page == $p): ?>
                                <li class="page-item active" aria-current="page"><span class="page-link">
                                        <?= $p; ?>
                                    </span></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $p; ?>"><?= $p; ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($current_page < $total_pages): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $current_page + 1; ?>">Next
                                    &raquo;</a></li>
                        <?php else: ?>
                            <li class="page-item disabled"><span class="page-link">Next &raquo;</span></li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <form action="./index" method="POST">
                            <input class="form-control" type="text" name="search_term"
                                placeholder="Enter search term..." aria-label="Enter search term..."
                                aria-describedby="button-search" />
                            <button class="btn btn-primary mt-2" type="submit">Go!</button>
                        </form>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="./index?category=Web Design">Web Design</a></li>
                                    <li><a href="./index?category=HTML">HTML</a></li>
                                    <li><a href="./index?category=Freebies">Freebies</a></li>

                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="./index?category=JavaScript">JavaScript</a></li>
                                    <li><a href="./index?category=CSS">CSS</a></li>
                                    <li><a href="./index?category=Tutorials">Tutorials</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                        use, and feature the Bootstrap 5 card component!</div>
                </div>
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