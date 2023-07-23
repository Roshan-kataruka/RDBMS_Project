<?php
        session_start();
        if(isset($_SESSION['pname']))
        {
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $oid=$_SESSION['pid'];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complainee</title>
    <link rel="stylesheet" href="u_login.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .pdetails
    {
        width: 300px;
        border: 2px solid black;
        color: rgb(192, 187, 187);
        margin: 20px;
        padding: 8px;
    }
    .pdetails h3{
            padding: 8px;
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
        color: rgb(226, 153, 153);
    }
    .Officiermain{
        display: flex;

    }
    .box1{
        background-color:rgb(67, 144, 245);
        width: 180px;
        height: 100px;
        margin: 10px;
        padding: 8px;
        border-radius: 8px;
        text-align: center;
    }
    .a_nav{
        position:fixed;
    }
   .officierinfo{
    margin-left: 180px;
    margin-top: 15px;
   }
    </style>
</head>
<body>
    <div class="header">
        <div class="side_left">
            <img id="logo" src="Logo/logo.png" alt="" usemap="#image-map_logo">
            <map name="image-map_logo">
                <area target="" alt="" title="" href="Admin.html" coords=",172,172,188" shape="circle">
            </map>
            <div class="desc">
                <h1>Cyber Crime Complain Portal </h1>
                <h3>Apni Suraksha Apne Haath </h3>
            </div>
        </div>
        <div class="side_right">
            <img src="Logo/Azadi.png" alt="" usemap="#image-map">
            <map name="image-map">
                <area target="_blank" alt="Azadi ka Amrit Mahaotsav" title="Azadi ka Amrit Mahaotsav" href="https://amritmahotsav.nic.in/" coords="1199,650,0,1" shape="rect">
            </map>
        </div>
    </div>
    <div class="collab">
    <nav class="a_nav">
        <ul class="a_option">
                <a href="Admin.php">DashBoard</a>
                <hr>
                <a href="#">Police Station Details</a>
                <hr>
                <a href="#">Officier Details</a>
                <hr>
                <a href="HComplaint.php">View Complaint</a>
                <hr>
                <a href="#">Case Update</a>
                <hr>
                <a href="Helpline.php">View Case Details</a>
                <hr>
                <a href="#">Helpline</a>
                <hr>
                <a href="logout.php">Logout</a>
        </ul>
    </nav>
    <div class="Officiermain">
        <div class="dashboard">
        <div class="officierinfo">
        <?php
            //echo "<div class='welcome'><h1>Welcome ".$_SESSION['username']."</h1></div>";
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $userid = $_SESSION['pid'];
            $sql = "SELECT * FROM `officier_info` WHERE `P_id`='$userid';";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            if($count==1)
            {
                while($row = mysqli_fetch_array($result))
                {
                    echo "<div class='pdetails'>"."
                    <h2> Account Details </h2>
                    <h3><i class='fa fa-user'></i>".$_SESSION['pname']."</h3>
                    <h3><i class='fa fa-calendar'></i> " . $row['P_name'] . "</h3>
                    <h3><i class='fa fa-heartbeat'></i>" . $row['P_name'] . "</h3>
                    <h3><i class='fa fa-address-card-o'></i>" . $row['P_name'] . "</h3>
                    <h3><i class='fa fa-location-arrow'></i>" . $row['P_name'] . "</h3>
                    <h2> Contact Details </h2>
                    <h3> <i class='fa fa-envelope'></i>   " . $row['P_name'] . "</h3>
                    <h3><i class='fa fa-map-marker'></i>" . $row['P_name'] . "</h3>
                    <h3><i class='fa fa-phone-square'></i>" . $row['P_name'] . "</h3>
                     </div>";
                }
            }
            ?>
        </div>
            <div class="case box1">
                    <h4>Complaint Recieved</h4>
                    <hr>
                    <h1>
                        <?php
                        $sql = "SELECT * FROM `complaint_info`;";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                        ?>
                    </h1>
            </div>
            <div class="officier box1">
                <h4>Total Officier</h4>
                <hr>
                <h1>
                <?php
                        $sql = "SELECT * FROM `officier_info`;";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                        ?>
                </h1>
            </div>
            <div class="police box1">
                <h4>Total Police Station</h4>
                <hr>
                <h1>
                <?php
                        $sql = "SELECT * FROM `policestation`;";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                        ?>
                </h1>
            </div>
            <div class="Feedback box1">
                <h4>Total Feedback</h4>
                <hr>
                <h1>
                <?php
                        $sql = "SELECT * FROM `feedback`;";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                        ?>
                </h1>
            </div>
            <div class="User box1">
                <h4>Total users</h4>
                <hr>
                <h1>
                <?php
                        $sql = "SELECT * FROM `user_info`;";
                        $result = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($result);
                        echo $count;
                        ?>
                </h1>
            </div>
        </div>
        </div>
    </div>

    <section>
        <?php
            echo "welcome ".$_SESSION['pname'];
        ?>

    </section>

    <footer id="end">
        <a href="#">FAQ</a>
        <a href="#">Feedback</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Disclaimer</a>
        <a href="#">&copy; 2022 | Govt</a>
    </footer>
</body>
</html>
