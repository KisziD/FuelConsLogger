<?php

    if(isset($_GET["type"])){
        require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP/DatabaseConn.php";
        $con = new DatabaseConn();

        $query = "INSERT INTO `cars` (`rendszam`, `owner`, `type`, `fuel`,`model_year`,`mot`,`odometer`) VALUES ('" . $_GET["nplate"] . "', '" . $_SESSION["uid"] . "', '" . $_GET["type"] . "','" . $_GET["ftype"] . "','" . $_GET["year"] . "','" . $_GET["mot"] . "', '0')";
        echo $con->execute($query);
        $query = "UPDATE `users` SET `num_cars` = `".($_SESSION["cars"]+1)."` WHERE `id` =`".$_SESSION["uid"]."`";
        echo $con->execute($query);
    }

?>