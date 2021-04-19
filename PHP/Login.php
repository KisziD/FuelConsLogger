<?php
if (isset($_SESSION)) {
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        include $_SERVER['DOCUMENT_ROOT'] . "/index.php";
    }
} else {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
  <script src="/Javascript/Register.js"></script>
  <script src="/Javascript/Login.js"></script>
  <link rel="stylesheet" href="/CSS/login.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-background">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navtoggler"
        aria-controls="navtoggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/home">FCL</a>
      <div class="collapse navbar-collapse" id="navtoggler">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="login-reg-panel">
    <div class="login-info-box">
      <h2>Have an account?</h2>
      <p>Log in!</p>
      <label id="label-register" for="log-reg-show">Login</label>
      <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
    </div>

    <div class="register-info-box">
      <h2>Don't have an account?</h2>
      <p>Create one <b>Now</b>!</p>
      <label id="label-login" for="log-login-show">Register</label>
      <input type="radio" name="active-log-panel" id="log-login-show">
    </div>

    <div class="white-panel">
      <div class="login-show">
        <h2>LOGIN</h2>
        <form action="" class="needs-validation" novalidate>
          <span>
          <input type="text" placeholder="Email" id="loginemail" class="form-control" onkeyup="lemailValidate()">
          <div class="invalid-feedback">Invalid email!</div>
        </span>
        <span>
          <input type="password" placeholder="Password" id="loginpassword" class="form-control" onkeypress="loginByTextbox(event)">
          <div class="invalid-feedback">Wrong password!</div>
        </span>
          <input type="button" value="Login" onclick="login()">
        </form>
        <a href="">Forgot password?</a>
      </div>
      <div class="register-show">
        <h2>REGISTER</h2>
        <form action="" class="needs-validation" novalidate>
          <input type="text" placeholder="Name" id="name" class="form-control" onkeyup="nameValidate()">
          <span>
            <input type="text" placeholder="Email" id="email" class="form-control" onkeyup="emailValidate()">
            <div class="invalid-feedback">The Email is either in use or incorrect</div>
          </span>
          <span>
            <input type="password" placeholder="Password" id="password" class="form-control"
              onkeyup="passwordValidate()">
            <div class="invalid-feedback">The password must contain a capital letter and a number!</div>
          </span>
          <span>
            <input type="password" placeholder="Confirm Password" id="passwordconfirm" class="form-control"
              onkeyup="passwordConfirmationValidate()">
            <div class="invalid-feedback">The passwords must match!</div>
          </span>
          <input type="button" value="Register" onclick="register()">
        </form>
      </div>
    </div>
  </div>
  <script src="/Javascript/MainScript.js"></script>
</body>

</html>
