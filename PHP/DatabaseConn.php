<?php

$connfile = fopen($_SERVER['DOCUMENT_ROOT'] . "/PHP/pass.txt", "r") or die("Cannot read database data");
$conndata = fread($connfile, filesize($_SERVER['DOCUMENT_ROOT'] . "/PHP/pass.txt"));
$connsplit = explode("|", $conndata);
$Server = $connsplit[0];
$User = $connsplit[1];
$Pass = $connsplit[2];
$Database = $connsplit[3];
$con = new mysqli($Server, $User, $Pass, $Database);

if ($con->connect_error) {
    echo "hiba";
    die("connection failed: " . $con->connect_error);
} else {
    echo "done";
}

if (isset($_GET["Uname"])) {
    $sql = "INSERT INTO users (Username, Password) VALUES ('" . $_GET["Uname"] . "', '" . $_GET["Pass"] . "')";
    $con->query($sql);
}
