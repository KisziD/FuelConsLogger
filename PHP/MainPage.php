<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FCL</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
  <script src="/Javascript/UserManagement.js"></script>
  <link rel="stylesheet" href="/CSS/main.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navtoggler"
        aria-controls="navtoggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="">FCL</a>
      <div class="collapse navbar-collapse" id="navtoggler">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="/logout">Logout</a></li>';
            } else {
                echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="/login">Login</a></li>';
            }
            ?>

          <li class="nav-item">
            <a class="nav-link" href="#">something</a>
          </li>
        </ul>
        <?php
          if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '<ul class="navbar-nav ml-auto"> <li><span class="navbar-text" id="username" onload="loadUsername()">Uname</span></li></ul>';
          }
          ?>
      </div>
    </div>
  </nav>

</body>

</html>