<?php
include $_SERVER['DOCUMENT_ROOT'] . "/PHP/DatabaseConn.php";

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: http://www.fuelconslogger.infinityfreeapp.com/login');
exit;
