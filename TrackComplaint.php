<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complainee</title>
    <link rel="stylesheet" href="trackcomplaint.css">
    <link rel="stylesheet" href="Complain_history.css" type="text/css">
    <link rel="stylesheet" href="u_login.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="complaintform.css">
    <style>
        table{
            padding: 5px;
            border-collapse: collapse;
            margin: 5px;
            background-color: rgb(222, 242, 244);
            margin-bottom: 50px;
            /* display: none; */
        }
        th, td {
            padding: 5px;
            text-align: left;
            border: 2px solid rgb(7, 7, 7);
        }
        th{
            font-size:medium;
        }
        .others li a{
            color: white;
        }
        .logout li a {
            text-decoration: none;
            color: white;
        }
        /* table + h1{
            display: none;
        }
        .first_heading{
            visibility: hidden;
        } */
    </style>
</head>
<body>
    <div class="header">
        <div class="side_left">
            <img id="logo" src="Logo/logo.png" alt="" usemap="#image-map_logo">
            <map name="image-map_logo">
                <area target="" alt="" title="" href="user_login.html" coords=",172,172,188" shape="circle">
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
    <section id="tablesection">
        <?php
        session_start();
        if(isset($_SESSION['username']))
        {
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $userid = $_SESSION['userid'];
            // $sql = "SELECT * FROM `complaint_info` where `U_id`='$userid'";
            // $result = mysqli_query($conn,$sql);
            // $count = mysqli_num_rows($result);
            $Cid=NULL;
            // if($count>0)
            // {
            // }
            // else{
            //     echo "<br>" . "You have not filed any Complain";
            // }
        }
        else
        {
            echo "<script> location.href='form.php'</scrip>";
        }
        ?>
        <section class="my_form">
        <div class="center">
                <h1>Complaint Tracking</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <select name="cid" id="cid" required class='Drops'>
                    <option value="">Select Case</option>
                    <?php
                        $sql = "SELECT `complaint_info`.`C_id` FROM `complaint_info` WHERE `U_id`='$userid';";
                        $result = mysqli_query($conn,$sql);
                        if(!$result)
                        {
                            echo " error";
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<option value='".$row['C_id']."'>".$row['C_id']."</option>";
                            }
                        }
                    ?>
                </select>
                    <br>
                    <button name="Search">Search</button>
                </form>
        </div>
        </section>
    <table id="myTable">
    <h1 class="first_heading">Complaint Details</h1>
        <thead>
            <tr>
                <th>Complain State</th>
                <th>Complain type</th>
                <th>Complain Date</th>
                <th>Complain Description</th>
                <th>Complain Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_REQUEST['Search'])){
                $GLOBALS['Cid'] = $_REQUEST['cid'];
                $sql = "SELECT * FROM `complaint_info` WHERE `U_id` = '$userid' AND `C_id`='$Cid';";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "
                        <tr>
                        <th>" . $row['C_state'] . "</th>
                        <th>" . $row['C_type'] . "</th>
                        <th>" . $row['C_doc'] . "</th>
                        <th>" . $row['C_desc'] . "</th>
                        <th>" . $row['Status'] . "</th>
                        </tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>
    <table id="myTable1">
        <h1>Case Update</h1>
        <thead>
            <tr>
                <th>Update Date</th>
                <th>Update Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `case_update` where `U_id`='$userid' AND `C_id`='$Cid';";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>
                        <th>" . $row['D_O_CU'] . "</th>
                        <th>" . $row['CU_desc'] . "</th>
                         </tr>";
                    }
                }
            ?>
        </tbody>
            </table>
            <table id="myTable2">
        <h1>Assigned Officier Details</h1>
        <thead>
            <tr>
                <th>Officier Name</th>
                <th>Officier Mobile Number</th>
                <th>Officier Gender</th>
                <th>Officier Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `officier_info` WHERE `P_id` IN (SELECT `P_id` FROM `case_details` where `U_id`='$userid' AND `C_id`='$Cid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>
                        <th>" . $row['P_name'] . "</th>
                        <th>" . $row['P_mob'] . "</th>
                        <th>" . $row['P_gender'] . "</th>
                        <th>" . $row['P_email'] . "</th>
                         </tr>";
                    }
                }
            ?>
        </tbody>
            </table>
            <table id="myTable3">
        <h1>Assigned Police Station Details</h1>
        <thead>
            <tr>
                <th>Station Name</th>
                <th>Station Address</th>
                <th>Station Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `policestation` WHERE `PS_id` IN (SELECT `PS_id` FROM `case_details` where `U_id`='$userid' AND `C_id`='$Cid');";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>
                        <th>" . $row['PS_name'] . "</th>
                        <th>" . $row['PS_address'] . "</th>
                        <th>" . $row['PS_email'] . "</th>
                         </tr>";
                    }
                }
            ?>
        </tbody>
            </table>
            <table id="myTable4">
        <h1>Rejected Case Details</h1>
        <thead>
            <tr>
                <th>Rejection Cause</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `rejected_cases` WHERE `U_id`='$userid' AND `C_id`='$Cid';";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>
                        <th>" . $row['Rejec_desc'] . "</th>
                         </tr>";
                    }
                }
            ?>
        </tbody>
            </table>
    </section>
    <footer id="end">
        <a href="#">FAQ</a>
        <a href="#">Feedback</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Disclaimer</a>
        <a href="#">&copy; 2022 | Govt</a>
    </footer>
    <script>
         
            let table = new DataTable('#myTable');
            let table1 = new DataTable('#myTable1');
            let table2 = new DataTable('#myTable2');
            let table3 = new DataTable('#myTable3');
            let table4 = new DataTable('#myTable4'); 
    </script>
    <script src="media.js"></script>
    </body>
</html>
