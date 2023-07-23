<?php
$hello = 1;
echo $hello;

$servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $sql = "CREATE TABLE `log1` (`bouh` INT(50) NOT NULL );";
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                echo "success";
            }
            else{
                echo "error";
            }

?>