<?php
        session_start();
        $hname11=$_SESSION['hname'];
        if(isset($hname11))
        {
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
        }
        else{
            echo "<script> location.href='form.php'</script>";
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Admin panel</title>
    <style>
        .card:hover {
    background-color:rgb(185, 236, 241);
}
    </style>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="topbar_left">
                <img id="logo" src="Logo/logo.png" alt=" hello" usemap="#image-map_logo">
                <map name="image-map_logo">
                    <area target="" alt="" title="" href="user_login.html" coords=",172,172,188" shape="circle">
                </map>
                <div class="desc">
                    <h1>Cyber Crime Complain Portal </h1>
                    <h3>Apni Suraksha Apne Haath </h3>
                </div>
            </div>
            <div class="topbar_right">
                <img src="Logo/Azadi.png" alt="hello" usemap="#image-map">
                <map name="image-map">
                    <area target="_blank" alt="Azadi ka Amrit Mahaotsav" title="Azadi ka Amrit Mahaotsav"
                        href="https://amritmahotsav.nic.in/" coords="1199,650,0,1" shape="rect">
                </map>
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="admin.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="HVstation.php">
                        <i class="fa fa-map-marker"></i>
                        <div>Station Details</div>
                    </a>
                </li>
                <li>
                    <a href="HVofficier.php">
                        <i class="fas fa-users"></i>
                        <div>Officier Details</div>
                    </a>
                </li>
                <li>
                    <a href="HVuser.php">
                        <i class="fa fa-user"></i>
                        <div>Complainee Details</div>
                    </a>
                </li>
                <li>
                    <a href="HComplaint.php">
                        <i class="fas fa-users"></i>
                        <div>View Complaint</div>
                    </a>
                </li>
                <li>
                    <a href="Hfeedback.php">
                        <i class="fa fa-commenting-o"></i>
                        <div>View Feedback</div>
                    </a>
                </li>
                <li>
                    <a href="HCdetails.php">
                        <i class="fa fa-book"></i>
                        <div>View Case Info</div>
                    </a>
                </li>
                <li>
                    <a href="Hhelpline.php">
                        <i class="fa fa-question"></i>
                        <div>Helpline</div>
                    </a>
                </li>
                <li>
                    <a href="HRcases.php">
                        <i class="fa fa-ban"></i>
                        <div>Rejected Cases</div>
                    </a>
                </li>
                <li>
                    <a href="LOG.php">
                        <i class="fa fa-database"></i>
                        <div>Log</div>
                    </a>
                </li>
                <li>
                    <a href="Report.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Report</div>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i>
                        <div>Logout</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
                <div class="cards">
                    <div class="card">
                        <div class="card-content">
                            <div class="number">
                                <?php
                                $sql = "SELECT * FROM `complaint_info`;";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);
                                echo $count;
                                ?>
                            </div>
                            <div class="card-name">Cases Recieved</div>
                        </div>
                        <div class="icon-box">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="number">
                            <?php
                                $sql = "SELECT * FROM `case_details` WHERE `PS_id` IS NOT NULL;";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);
                                echo $count;
                                ?>
                            </div>
                            <div class="card-name">Assigned Case</div>
                        </div>
                        <div class="icon-box">
                            <i class="fa fa-check-square-o"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="number">
                            <?php
                                $sql = "SELECT * FROM `officier_info`;";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);
                                echo $count;
                                ?>
                            </div>
                            <div class="card-name">Officiers</div>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="number">
                            <?php
                                $sql = "SELECT * FROM `policestation`;";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);
                                echo $count;
                                ?>
                            </div>
                            <div class="card-name">Stations</div>
                        </div>
                        <div class="icon-box">
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="number">
                            <?php
                                $sql = "SELECT * FROM `feedback`;";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);
                                echo $count;
                                ?>
                            </div>
                            <div class="card-name">Feedbacks</div>
                        </div>
                        <div class="icon-box">
                            <i class="fa fa-commenting-o"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="number">
                            <?php
                                $sql = "SELECT * FROM `user_info`;";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);
                                echo $count;
                                ?>
                            </div>
                            <div class="card-name">Users</div>
                        </div>
                        <div class="icon-box">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
            </div>
            <div class="charts">
                <div class="chart">
                    <h2>Cases Recieved (past 12 months)</h2>
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="chart doughnut-chart">
                    <h2>WorkForce</h2>
                    <div>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="chart1.php"></script>
    <script src="chart2.php"></script>
</body>

</html>