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
  <link rel="stylesheet" href="/CSS/main.css">
  <link rel="stylesheet" href="/CSS/dash.css">
</head>

<body>
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
             <?php
                $num = $_SESSION["cars"];
                for($i=0; $i< $num; $i++)
                echo  '<li> <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fas fa-car"></i></span>Car#'. $i+1 . '</a></li>';
                
             ?>
            <li>
               <a href="/newcar"><span class="fa-stack fa-lg pull-left"><i class="fas fa-plus-circle"></i></span>Add new car</a>
            </li>
         </ul>
      </div>

      <div id="page-content-wrapper">
         <div class="container-fluid xyz">

            
           
         </div>
      </div>
   </div>

<script src="/Javascript/dash.js"></script>

  <div id= >
  
  </div>
  
</div>


</body>

</html>