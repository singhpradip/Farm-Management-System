<?php
            include '../_connect.php';
            if(isset($_GET['deleteid'])){
                $id = $_GET['deleteid'];
                $sql= "DELETE FROM `users_table` WHERE `users_table`.`user_id` = $id";
                $result=mysqli_query($conn, $sql);
                if($result){
                    header('location: adminPanel.php');
                }
                else{
                    die("<br>Database Connection failed: " . $conn->connect_error);
                }
            }
            