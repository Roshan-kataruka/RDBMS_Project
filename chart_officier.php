<?php
    $servername = 'localhost:3307';
    $username = 'root';
    $password = '';
    $database_name = 'cybercrimeportal';
    $conn = mysqli_connect($servername,$username,$password,$database_name);
    session_start();
        if(isset($_SESSION['pname']))
        {
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $pid=$_SESSION['pid'];
        }
        else{
            echo "<script> location.href='form.html'</script>";
        }
?>
var ctx = document.getElementById('lineChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Cases ',
            data: [<?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=1 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
             ,
             <?php
              $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=2 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
              $result = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($result);
              echo $count;
              ?>
              ,
              <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=3 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
               ?>,
               <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=4 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
             ,
             <?php
              $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=5 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
              $result = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($result);
              echo $count;
              ?>
              ,
              <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=6 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
               ?>,
               <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=7 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
             ,
             <?php
              $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=8 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
              $result = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($result);
              echo $count;
              ?>
              ,
              <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=9 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
               ?>,
               <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=10 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
             ,
             <?php
              $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=11 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
              $result = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($result);
              echo $count;
              ?>
              ,
              <?php
                $sql = "SELECT * FROM `complaint_info` WHERE MONTH(`C_doc`)=12 AND `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid');";
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
