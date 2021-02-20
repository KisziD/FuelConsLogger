<?php

    class DatabaseManager
    {
        public function Connect()
        {
            // PHP Data Objects(PDO) Sample Code:
            try {
                $conn = new PDO("sqlsrv:server = tcp:projmain.database.windows.net,1433; Database = MainDB", "kiszi", "ProjectMainLoginPass21");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                print("Error connecting to SQL Server.");
                die(print_r($e));
            }
        }
    }
?>