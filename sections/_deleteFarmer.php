<?php
            include '../_connect.php';
            if(isset($_GET['deleteid'])){
                $id = $_GET['deleteid'];
                $sql= "DELETE FROM `farmer_login` WHERE `farmer_login`.`id` = $id";
                $result=mysqli_query($conn, $sql);
                if($result){
                    header('location: farmerMgmt.php');
                }
                else{
                    die("<br>Database Connection failed: " . $conn->connect_error);
                }
            }
            