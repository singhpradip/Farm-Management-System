<?php
        // Assuming you have a database connection
        $rootservername = "localhost";
        $rootusername = "root";
        $rootpassword = "";
        $dbname = "fms";

        $conn = new mysqli($rootservername, $rootusername, $rootpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            // echo"Connected";
        }