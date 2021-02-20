<?php

    class DatabaseManager
    {
        public function Connect()
        {
            $User = 'epiz_27977918';
            $Pass = 'LNowMo1V8zp9fih';
            $Database = 'epiz_27977918_MainDB';
            $Server = 'sql111.epizy.com';
        
            $conn = new mysqli($Server, $User, $Pass, $Database);
        
            if ($conn->connect_error) {
                echo "hiba";
                die("connection failed: ".$conn->connect_error);
            }else{
                echo "done";
            }
        }
    }
?>