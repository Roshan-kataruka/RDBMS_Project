<?php
    $servername = 'localhost:3307';
    $username = 'root';
    $password = '';
    $database_name = 'cybercrimeportal';
    $conn = mysqli_connect($servername,$username,$password,$database_name);
?>
var ctx2 = document.getElementById('doughnut').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Victim', 'Station', 'Officier'],

        datasets: [{
            label: 'WorkForce',
            data: [<?php
                $sql = "SELECT * FROM `complaint_info`;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
             ?>
             ,
             <?php
              $sql = "SELECT * FROM `policestation`;";
              $result = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($result);
              echo $count;
              ?>
              ,
              <?php
                $sql = "SELECT * FROM `officier_info`;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                echo $count;
               ?>],
            backgroundColor: [
                'rgba(41, 155, 99, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(120, 46, 139,1)'

            ],
            borderColor: [
                'rgba(41, 155, 99, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(120, 46, 139,1)'

            ],
            borderWidth: 1
        }]

    },
    options: {
        responsive: true
    }
});