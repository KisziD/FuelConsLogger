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
  <meta name="viewport" content="width=1024, initial-scale=0.3">
  <title>FCL</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"> 
  </script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <script src="/Javascript/UserManagement.js"></script>
  <script src="/Javascript/MainPageCalculator.js"></script>
  <link rel="stylesheet" href="/CSS/main.css">
  <link rel="stylesheet" href="/CSS/login.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-background">
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
      <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
    </div>

    <div class="register-info-box">
      <h2>Result <br>
      <i class="fas fa-tint" id="avgconsumption" onclick="setChartToCons()">  -.- L/100Km</i><br>
      <i class="fas fa-dollar-sign" id="ftkm" onclick="setChartToPPKM()">  -.- Ft/Km</i>
      </h2>
    </div>

    <div class="white-panel">
      <div class="login-show">
        <h2>Calculate</h2>
        <form action="" class="needs-validation" novalidate>

          <input type="text" name="liter" id="liter" class="form-control" placeholder="Litres Bought">

          <input type="text" name="km" id="km" class="form-control" placeholder="Km Travelled">

          <input type="text" name="ppl" id="ppl" class="form-control" placeholder="Price Per Litre">

          <input type="button" value="Calculate" id="calcbutton" >
        </form>
      </div>
    </div>
  </div>
  <script src="/Javascript/MainScript.js"></script>


</body>

</html>