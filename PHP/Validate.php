<?php
    require_once $_SERVER['DOCUMENT_ROOT'] ."/PHP/DatabaseConn.php";
    $con= new DatabaseConn();

    if (isset($_GET["email"])&&!isset($_GET["password"])) {
        $query = "SELECT Email FROM Users WHERE Email='". $_GET["email"]."'";
        $result = $con->execute($query);

        if($result->num_rows > 0){
            echo "1";
        }else{
            echo "0";
        }
    }

    if(isset($_GET["password"])&&isset($_GET["email"])){
        $query = "SELECT Password FROM Users WHERE Email='". $_GET["email"]."'";
        $result = $con->execute($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["Password"] == $_GET["password"]) {
                   echo "1";
                }else{
                    echo "0";
                }
            }
        }

    }
?>