<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  require_once '../php/db_connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT COUNT(*) FROM user WHERE name = :username";
  $stmt = $connection->prepare($sql);
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->execute();
  $userCount = $stmt->fetchColumn();

  if ($userCount > 0) {
   
    header('location: ../pages/register?error');

  } else {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $insertSql = "INSERT INTO user (name, password) VALUES (:username, :password)";
    $insertStmt = $connection->prepare($insertSql);
    $insertStmt->bindValue(':username', $username, PDO::PARAM_STR);
    $insertStmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
    $insertStmt->execute();

    header('location: ../pages/register?sucess');
  }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.112.5">
  <title>Signin Template · Bootstrap v5.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="../assets/css/styles.css" rel="stylesheet" />
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">


  <main class="form-signin w-100 m-auto">
    <?php
    if (isset($_GET['sucess'])) {
      ?>
      <div class="alert alert-success" role="alert">
        User registered successfully.
      </div>

      <?php
    }
    if (isset($_GET['error'])) {
      ?>
      <div class="alert alert-warning" role="alert">
        Username is already in use. Please choose another.
      </div>
      <?php
    }
    ?>
    <form enctype="multipart/form-data" action="../pages/register" method="post">
      <img class="container d-flex align-items-center justify-content-center" src="../assets/images/logo.png" alt=""
        width="" height="" style="width: 130px;">
      <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

      <div class="form-floating">
        <input type="text" name="username" class="form-control" id="user" placeholder="Name" required>
        <label for="user">Name</label>
      </div>

      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="Password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
      <a href="../" class="mt-1 btn w-100 py-2">Go Back</a>
      <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
    </form>
  </main>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>