<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complainee</title>
    <link rel="stylesheet" href="u_login.css" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .welcome h1{
            text-decoration: underline;
            padding: 20px;
            background: rgb(59, 153, 179);
    }
    .pdetails
    {
        width: 340px;
        border: 2px solid black;
        color: rgb(192, 187, 187);
        margin: 20px;
        padding: 10px;
    }
    .pdetails h3{
            padding: 10px;
            margin-left: 10px;
            color: black;
    }
    .pdetails h3 i{
            margin-right: 5px;
            margin-left: 10px;
            color: rgb(40, 174, 211);
    }
    .pdetails h2{
        padding: 10px;
        text-decoration: underline;
        color: rgb(76, 157, 160);
    }
    section{
        display: flex;
    }
    .dashboard{
        margin-top: 10px;
    }
    .fillc{
        margin-top: 15px;
        text-align: center;
        color: rgb(76, 157, 160);
        padding: 20px;
    }
    button {
    width: 25%;
    background: dodgerblue;
    color: #fff;
    border: #fff;
    font-size: 25px;
    position: relative;
    /* margin-left: 25%; */
    margin-top: 20px;
    height: 50px;
    }
    button:hover{
    background: linear-gradient(45deg, rgb(156, 230, 228), dodgerblue,rgb(16, 31, 143));
    }
    .Extra{
        margin-top: 50px;
    }
    .others li a{
            color: white;
        }
        .logout li a {
            text-decoration: none;
            color: white;
        }
    .card:hover{
        background-color: #93d0f5;
    }
    </style>
</head>
<body>
    <div class="header">
        <div class="side_left">
            <img id="logo" src="Logo/logo.png" alt=" hello" usemap="#image-map_logo">
            <map name="image-map_logo">
                <area target="" alt="" title="" href="user_login.html" coords=",172,172,188" shape="circle">
            </map>
            <div class="desc">
                <h1>Cyber Crime Complain Portal </h1>
                <h3>Apni Suraksha Apne Haath </h3>
            </div>
        </div>
        <div class="side_right">
            <img src="Logo/Azadi.png" alt="hello" usemap="#image-map">
            <map name="image-map">
                <area target="_blank" alt="Azadi ka Amrit Mahaotsav" title="Azadi ka Amrit Mahaotsav" href="https://amritmahotsav.nic.in/" coords="1199,650,0,1" shape="rect">
            </map>
        </div>
    </div>
    <nav class="nav-links" id="nav-links">
        <ul>
        <i class="fa fa-times" onclick="hideMenu()"></i>
            <div class="others">
                <li><a href="user_login.php">Home</a></li>
                <li><a href="complain_file.php">Report Complain</a></li>
                <li><a href="TrackComplaint.php">Track Complaint</a></li>
                <li><a href="complainthistory.php">ComplaintHistory</a></li>
                <li><a href="UCupdate.php">Case Update</a></li>
                <li><a href="Helpline.php">Helpline</a></li>
                <li><a href="user_update.php">Update Details</a></li>
                <li><a href="feedback.php">FeedBack</a></li>
            </div>
            <div class="logout">
                <li id="logout"><a href="logout.php">LogOut</a></li>
            </div>
        </ul>
    </nav>
    <i class="fa fa-bars" onclick="showMenu()"></i>
    <section class="Hide">
        <?php
        session_start();
        if(isset($_SESSION['username']))
        {
            ?>
            <div class="details">
            <?php
            //echo "<div class='welcome'><h1>Welcome ".$_SESSION['username']."</h1></div>";
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $userid = $_SESSION['userid'];
            $sql = "SELECT * FROM `user_info` WHERE `U_id`='$userid';";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            if($count==1)
            {
                while($row = mysqli_fetch_array($result))
                {
                    echo "<div class='pdetails'>"."
                    <h2> Account Details </h2>
                    <h3><i class='fa fa-user'></i>".$_SESSION['username']."</h3>
                    <h3><i class='fa fa-calendar'></i> " . $row['U_dob'] . "</h3>
                    <h3><i class='fa fa-heartbeat'></i>" . $row['Gender'] . "</h3>
                    <h3><i class='fa fa-address-card-o'></i>" . $row['Aadhar_no'] . "</h3>
                    <h3><i class='fa fa-location-arrow'></i>" . $row['U_state'] . "</h3>
                    <h2> Contact Details </h2>
                    <h3> <i class='fa fa-envelope'></i>   " . $row['Uemail'] . "</h3>
                    <h3><i class='fa fa-map-marker'></i>" . $row['U_address'] . "</h3>
                    <h3><i class='fa fa-phone-square'></i>" . $row['U_mob'] . "</h3>
                     </div>";
                }
            }
            ?>
            </div>
            <?php
        }
        else
        {
            echo "<script> location.href='form.php'</script>";
        }
        ?>
    <div class="Extra">
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
                            $sql = "SELECT * FROM `complaint_info` where `U_id`='$userid';";
                            $result = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($result);
                            echo $count;
                            ?>
                        </div>
                        <div class="card-name">Updates</div>
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
        <div class="fillc">
            <h2>Have any complain then don't worry. We are avalible 24 &#215; 7</h2>
            <h2>With full Transparency you can track previous complain, Updates regarding current case, Get contact deatils of officier incharge etc and etc </h2>
            <a href="complain_file.php"><button name="Search">file Now</button></a>
        </div>
    </section>
    <footer id="end">
        <a href="#">FAQ</a>
        <a href="#">Feedback</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Disclaimer</a>
        <a href="#">&copy; 2022 | Govt</a>
    </footer>
        <script src="media.js"></script>
</body>
</html>
