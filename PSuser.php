<?php
        session_start();
        if(isset($_SESSION['stationname']))
        {
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $stationid=$_SESSION['stationid'];
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
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <style>
        #myTable{
            padding: 5px;
            border-collapse: collapse;
            margin: 5px;
            background-color: rgb(234, 238, 240);
            position: relative;
            margin: auto;
            width: 98%
        }
        #myTable th, #myTable td {
            padding: 5px;
            text-align: left;
            border: 2px solid rgb(7, 7, 7);
        }
        #myTable th{
            font-size:medium;
        }
        #chist
        {
            position: relative;
            margin: auto;
            margin-top: 20px;
        }
        #chist h1{
            padding: 15px;
            font-family: 'Times New Roman', Times, serif;
            text-decoration: underline;
            position: relative;
            text-align: center;
            font-size: 44px;
            margin-bottom: 10px;
        }
    </style>
    <title>Station panel</title>
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
                    <a href="indexstation.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="PSstation.php">
                        <i class="fa fa-map-marker"></i>
                        <div>Station Details</div>
                    </a>
                </li>
                <li>
                    <a href="PSofficier.php">
                        <i class="fas fa-users"></i>
                        <div>Officier Details</div>
                    </a>
                </li>
                <li>
                    <a href="PScomplaint.php">
                        <i class="fas fa-users"></i>
                        <div>View Complaint</div>
                    </a>
                </li>
                <li>
                    <a href="PSCupdate.php">
                        <i class="fa fa-commenting-o"></i>
                        <div>Case Update</div>
                    </a>
                </li>
                <li>
                    <a href="PSuser.php">
                        <i class="fa fa-book"></i>
                        <div>Complainee details</div>
                    </a>
                </li>
                <li>
                    <a href="PShelpline.php">
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
        <section id="chist">
        <h1>Here are the list user details</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>Complainee ID</th>
                <th>Complainee name</th>
                <th>Complainee Email</th>
                <th>Complainee Address</th>
                <th>Complainee State</th>
                <th>Complainee Aadhar </th>
                <th>Complainee Gender</th>
                <th>Complainee Mobile Number</th>
                <th>Complainee DOB</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `user_info` WHERE `U_id` IN (SELECT `case_details`.`U_id` FROM `case_details` WHERE `PS_id`='$stationid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>
                        <th>" . $row['U_id'] . "</th>
                        <th>" . $row['Uname'] . "</th>
                        <th>" . $row['Uemail'] . "</th>
                        <th>" . $row['U_address'] . "</th>
                        <th>" . $row['U_state'] . "</th>
                        <th>" . $row['Aadhar_no'] . "</th>
                        <th>" . $row['Gender'] . "</th>
                        <th>" . $row['U_mob'] . "</th>
                        <th>" . $row['U_dob'] . "</th>
                        </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    </section>
    </div>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>