<?php
    $servername = 'localhost:3307';
    $username = 'root';
    $password = '';
    $database_name = 'cybercrimeportal';
    $conn = mysqli_connect($servername,$username,$password,$database_name);
?>
var ctx = document.getElementById('lineChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Cases ',
            data: [<?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=1;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
             ,
             <?php
              $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=2;";
              $result = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($result);
              echo $count;
              ?>
              ,
              <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=3;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
               ?>,
               <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=4;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
             ,
             <?php
              $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=5;";
              $result = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($result);
              echo $count;
              ?>
              ,
              <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=6;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
               ?>,
               <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=7;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
             ,
             <?php
              $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=8;";
              $result = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($result);
              echo $count;
              ?>
              ,
              <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=9;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
               ?>,
               <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=10;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
             ,
             <?php
              $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=11;";
              $result = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($result);
              echo $count;
              ?>
              ,
              <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=12;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
               ?>
            ],
            borderColor: 'rgb(41, 155, 99)',

            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});
