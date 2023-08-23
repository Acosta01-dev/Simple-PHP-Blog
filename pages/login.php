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
    <form enctype="multipart/form-data" action="../php/validate_user" method="post">
     
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="text" name="user" class="form-control" id="user" placeholder="Name" required>
        <label for="user">Name</label>
      </div>

      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="Password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>

      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
      <a href="../" class="mt-1 btn w-100 py-2">Go Back</a>
      <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
    </form>
  </main>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
