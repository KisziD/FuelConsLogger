<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/PHP/DatabaseConn.php";
$con= new DatabaseConn();

$query="INSERT INTO `Users` (`Name`, `Email`, `Password`, `NumberofCars`) VALUES ('".$_GET["name"]."', '".$_GET["email"]."', '".$_GET["password"]."', '0')";

echo $con->execute($query);

?>