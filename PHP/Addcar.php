<?php
/*if (!isset($_SESSION) || !$_SESSION["loggedin"]) {
    include "index.php";
}*/
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
  <script src="/Javascript/newcar.js"></script>
  <link rel="stylesheet" href="/CSS/main.css">
  <link rel="stylesheet" href="/CSS/login.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navtoggler"
        aria-controls="navtoggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="home">FCL</a>
      <div class="collapse navbar-collapse" id="navtoggler">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="/logout">Logout</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>';
            } else {
                echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="/login">Login</a></li>';
            }
            ?>          
        </ul>
        <?php
          if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '<ul class="navbar-nav ml-auto"> <li><span class="navbar-text" id="username">Uname</span></li></ul>';
          }
          ?>
      </div>
    </div>
  </nav>

  <div class="login-reg-panel">
    <div class="login-info-box">
      <h2>Add a new car!</h2>
      <p>Please enter all the information needed to add a new car!</p>
      <input type="radio" name="active-log-panel" id="log-login-show" checked="checked">
    </div>

    <div class="white-panel right-log">
      <div class="register-show show-log-panel">
        <h2>NEW CAR</h2>
        <form action="" class="needs-validation" novalidate>
          <input type="text" placeholder="Make and Model" id="type" class="form-control" onkeyup="typeValidate()">
          <span>
            <input type="text" placeholder="Number Plate" id="nplate" class="form-control" onkeyup="numplateValidate()">
            <div class="invalid-feedback">The Number plate is either in use or incorrect!</div>
          </span>
          <span>
            <input type="text" placeholder="Fuel type" id="ftype" class="form-control" onkeyup="fuelValidate()">
            <div class="invalid-feedback">Fuel type must be <b>Petrol, Diesel</b> or <b>Gas</b>!</div>
          </span>
          <span>
            <input type="text" placeholder="Model Year" id="myear" class="form-control" onkeyup="yearValidate()">
            <div class="invalid-feedback">The Model Year must be a valid year!</div>
          </span>
          <span>
            <input type="date" placeholder="MOT expiration date" id="mot" class="form-control" onchange="motValidate()">
            <div class="invalid-feedback">The Model Year must be a valid year!</div>
          </span>
          <input type="button" value="Add" onclick="add()">
        </form>
      </div>
    </div>
  </div>
  <script src="/Javascript/MainScript.js"></script>
  

</body>

</html>

<?php

    if(isset($_GET["type"])){
        require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP/DatabaseConn.php";
        $con = new DatabaseConn();

        $query = "INSERT INTO `cars` (`rendszam`, `owner`, `type`, `fuel`,`model_year`,`mot`,`odometer`) VALUES ('" . $_GET["nplate"] . "', '" . $_SESSION["uid"] . "', '" . $_GET["type"] . "','" . $_GET["ftype"] . "','" . $_GET["myear"] . "','" . $_GET["mot"] . "', '0')";
        $con->execute($query);
        $_SESSION["cars"]=$_SESSION["cars"]+1;
        $query = "UPDATE `users` SET `num_cars` = ".$_SESSION["cars"]." WHERE `id` =".$_SESSION["uid"];
        echo $con->execute($query);
    }

?>