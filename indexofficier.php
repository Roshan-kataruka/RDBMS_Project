<?php
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
    <title>Officer panel</title>
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
                    <a href="indexofficier.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="OVstation.php">
                        <i class="fa fa-map-marker"></i>
                        <div>Station Details</div>
                    </a>
                </li>
                <li>
                    <a href="OVofficier.php">
                        <i class="fas fa-users"></i>
                        <div>Officier Details</div>
                    </a>
                </li>
                <li>
                    <a href="OVcomplain.php">
                        <i class="fas fa-users"></i>
                        <div>View Complaint</div>
                    </a>
                </li>
                <li>
                    <a href="OCupdate.php">
                        <i class="fa fa-commenting-o"></i>
                        <div>Case Update</div>
                    </a>
                </li>
                <li>
                    <a href="OVuser.php">
                        <i class="fa fa-book"></i>
                        <div>Complainee details</div>
                    </a>
                </li>
                <li>
                    <a href="OVhelpline.php">
                        <i class="fa fa-question"></i>
                        <div>Helpline</div>
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
                                $sql = "SELECT * FROM `complaint_info` WHERE `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid') AND `Status`='Complete';";
                                $result = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($result);
                                echo $count;
                                ?>
                            </div>
                            <div class="card-name">Cases Completed</div>
                        </div>
                        <div class="icon-box">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <div class="number">
                            <?php
                                $sql = "SELECT * FROM `complaint_info` WHERE `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `P_id`='$pid') AND `Status`='Pending';";
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
    <script src="chart_officier.php"></script>
    <script src="chart2.php"></script>
</body>

</html>