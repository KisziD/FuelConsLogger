<?php

class DatabaseManager
{
    private $conn;

    public function __construct()
    {
        $connfile = fopen("pass.txt", "r") or die("Cannot read database data");
        $conndata = fread($connfile, filesize("pass.txt"));
        $connsplit = explode("|", $conndata);
        $Server = $connsplit[0];
        $User = $connsplit[1];
        $Pass= $connsplit[2];
        $Database = $connsplit[3];
        $conn = new mysqli($Server, $User, $Pass, $Database);

        if ($conn->connect_error) {
            echo "hiba";
            die("connection failed: " . $conn->connect_error);
        }else{
            echo "done";
        }
    }

    public function ExecuteQuery($query)
    {
        $username = "test";
        $conn->query("CREATE TABLE epiz_27977918_MainDB." . $username . " ( Type VARCHAR(10) NOT NULL , Value INT NOT NULL , timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = MyISAM;");
        echo "edone";
    }

}
