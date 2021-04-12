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
        $query = "SELECT password FROM users WHERE email='". $_GET["email"]."'";
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
            $query  = "SELECT * FROM users WHERE email='".$_SESSION["email"]."';";
            $result = $con->execute($query);
            if($result->num_rows>0){
                while ($row=$result->fetch_assoc()) {
                    echo $row["full_name"];
                    $_SESSION["cars"] = $row["num_cars"];
                    $_SESSION["uid"] = $row["id"];
                }
            }
            $_SESSION["types"] = array();
            $_SESSION["nplates"] = array();
            $query  = "SELECT type, rendszam FROM cars WHERE owner='".$_SESSION["uid"]."';";
            $result = $con->execute($query);
            if($result->num_rows>0){
                while ($row=$result->fetch_assoc()) {
                   array_push($_SESSION["types"], $row["type"]);
                   array_push($_SESSION["nplates"], $row["rendszam"]);
                }
            }
        }else{
            echo "false";
        }
    }

    if (isset($_GET["nplate"])) {
        $query = "SELECT rendszam FROM cars WHERE rendszam='". $_GET["nplate"]."'";
        $result = $con->execute($query);

        if($result->num_rows > 0){
            echo "1";
        }else{
            echo "0";
        }
    }

    if(isset($_GET["checkplate"])){
        $query = "SELECT concat(rendszam,'|',type,'|',fuel,'|',model_year,'|',mot,'|',odometer) as data from cars where rendszam like '".$_GET["checkplate"]."'";
        $result = $con->execute($query);
        echo $result->fetch_assoc()["data"];
    }

    if(isset($_GET["checkodo"])){
        $query  ="SELECT odometer from cars where rendszam like '".$_GET["checkodo"]."'";
        $result = $con->execute($query);

        echo $result->fetch_assoc()["odometer"];
    }

    if(isset($_GET["newlog"])){
        $query = "INSERT INTO logged_refuels (`rendszam`,`fuel`,`litres`,`priceperlitre`,`paid`,`odometer`,`log_date`) values ('".$_GET["newlog"]."', '".$_GET["ftype"]."', cast('".$_GET["litres"]."' as real), cast('".$_GET["ppl"]."' as real), cast('".$_GET["paid"]."' as real), cast('".$_GET["odo"]."' as int), getdate())";
        echo $con->execute($query);
        $query = "UPDATE cars odometer='".$_GET["odo"]."' WHERE rendszam like '".$_GET["newlog"]."'";
        echo $con->execute($query);
    }
?>