<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP/Route.php";


Route::get("home", function () {
    include $_SERVER['DOCUMENT_ROOT'] . "/PHP/MainPage.php";
});

Route::get("register", function () {
    include $_SERVER['DOCUMENT_ROOT'] . "/HTML/Register.html";
});

Route::get("login", function () {
    include $_SERVER['DOCUMENT_ROOT'] . "/PHP/Login.php";
});
Route::get("logout", function () {
    include $_SERVER['DOCUMENT_ROOT'] . "/PHP/Logout.php";
});

Route::get("dashboard", function () {
    include $_SERVER['DOCUMENT_ROOT'] . "/PHP/Dashboard.php";
});
Route::get("newcar", function () {
    include $_SERVER['DOCUMENT_ROOT'] . "/PHP/Addcar.php";
});