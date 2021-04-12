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
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 
  <script src="/Javascript/UserManagement.js"></script>
  <script src="/Javascript/carloader.js"></script>
  <script src="/Javascript/logger.js"></script>
  <link rel="stylesheet" href="/CSS/main.css">
  <link rel="stylesheet" href="/CSS/dash.css">
</head>

<body onload="loadcar('<?php echo $_SESSION['nplates'][0]; ?>')">
<div>
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
   <div id="wrapper" class="toggled-2">
      <div id="sidebar-wrapper">
         <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
           <li> <a href="" class="sidebar-toggler"><span class="fa-stack fa-lg pull-left"><i class="fas fa-bars"></i></span></a></li>
             <?php
                foreach($_SESSION["types"] as $key => &$type)
                echo  '<li> <a href="#" onclick="loadcar(\''.$_SESSION["nplates"][$key].'\')"><span class="fa-stack fa-lg pull-left"><i class="fas fa-car"></i></span> '. $type . ' </a></li>';
                
             ?>
            <li>
               <a href="/newcar"><span class="fa-stack fa-lg pull-left"><i class="fas fa-plus-circle"></i></span>Add new car</a>
            </li>
         </ul>
      </div>

      <div id="page-content-wrapper">
         <div class="container-fluid xyz">
            <div id="carinfo">
              <div id="cartype"></div>    <div id="caryear"></div>   <div id="carnplate"></div>   <div id="carfuel"></div>   <div id="carmot"></div>   <div id="carodo"></div>           
            </div>
            <div id="addrefuel">

              
              <form action="" class="needs-validation" novalidate>
          <input type="number" name="liter" id="liter" placeholder="Litres" class="form-control" onchange="litresValidate()" onkeyup="litresValidate()" min="0">
          <span>
            <input type="number" name="ppl" id="ppl" placeholder="HUF/Litre" class="form-control" onkeyup="pplValidate()" min="0">
            <div class="invalid-feedback">The Number plate is either in use or incorrect!</div>
          </span>
          <span>
            <input type="number" name="paid" id="paid" placeholder="Paid" class="form-control" onkeyup="paidValidate()" min="0">
            <div class="invalid-feedback">The Number plate is either in use or incorrect!</div>
          </span>
          <span>
            <input type="number" name="odo" id="odo" placeholder="Odometer" class="form-control" onkeyup="odoValidate()">
            <div class="invalid-feedback">Fuel type must be <b>Petrol, Diesel</b> or <b>Gas</b>!</div>
          </span>
          <input type="button" value="Add" onclick="addlog()">
        </form>
            </div>           
         </div>
      </div>
   </div>

<script src="/Javascript/dash.js"></script>

</body>

</html>