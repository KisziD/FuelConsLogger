<?php

class User
{
    private $username;
    private $password;
    private $car;

    public function __construct($username)
    {
        $query = "CREATE TABLE `epiz_27977918_MainDB`.`".$username."` ( `Type` VARCHAR(10) NOT NULL , `Value` INT NOT NULL , `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = MyISAM;"
    }
}




?>