<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/PHP/Route.php";


Route::get("home", function () {
    include $_SERVER['DOCUMENT_ROOT'] . "/HTML/MainPage.html";
});

Route::get("register", function () {
    include $_SERVER['DOCUMENT_ROOT'] . "/HTML/Register.html";
});

Route::get("login", function () {
    include $_SERVER['DOCUMENT_ROOT'] . "/HTML/Login.html";
});