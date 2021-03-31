<?php
session_start();    
    require_once $_SERVER['DOCUMENT_ROOT'] ."/PHP/DatabaseConn.php";
    $con= new DatabaseConn();

    if (isset($_GET["email"])&&!isset($_GET["password"])) {
        $query = "SELECT email FROM users WHERE email='". $_GET["email"]."'";
        $result = $con->execute($query);

        if($result->num_rows > 0){
            echo "1";
        }else{
            echo "0";
        }
    }

    if(isset($_GET["password"])&&isset($_GET["email"])){
        $query = "SELECT Password FROM users WHERE email='". $_GET["email"]."'";
        $result = $con->execute($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["password"] == $_GET["password"]) {
                   echo "1";
                    $_SESSION["loggedin"]=true;
                    $_SESSION["email"]=$_GET["email"];
                }else{
                    echo "0";
                }
            }
        }

    }



    if (isset($_GET["loggedin"])) {
        if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true){
            $query  = "SELECT Name FROM users WHERE email='".$_SESSION["email"]."';";
            $result = $con->execute($query);
            if($result->num_rows>0){
                while ($row=$result->fetch_assoc()) {
                    echo $row["full_name"];
                }
            }
        }else{
            echo "false";
        }
    }
?>