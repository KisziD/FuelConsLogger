<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP/DatabaseConn.php";
$con = new DatabaseConn();

$query = "INSERT INTO `Users` (`Name`, `Email`, `Password`, `NumberofCars`) VALUES ('" . $_GET["name"] . "', '" . $_GET["email"] . "', '" . $_GET["password"] . "', '0')";
echo $con->execute($query);

$_SESSION["loggedin"] = true;
$_SESSION["email"] = $_GET["email"];

include $_SERVER['DOCUMENT_ROOT'] . "/index.php";

?>