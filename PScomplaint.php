<?php
        session_start();
        if(isset($_SESSION['stationname']))
        {
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $stationid =  $_SESSION['stationid'];
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
    <link rel="stylesheet" href="complaintform.css" type="text/css">
    <style>
        #myTable{
    padding: 5px;
    border-collapse: collapse;
    margin: 5px;
    background-color: rgb(234, 238, 240);
    position: relative;
    margin: auto;
    width: 95%;
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
        <h1>Here are the list complaint filled till date</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>Complainee ID</th>
                <th>Complain ID</th>
                <th>Complain State</th>
                <th>Complain type</th>
                <th>Complain Date</th>
                <th>Complain Description</th>
                <th>Officier ID</th>
                <th>Complain Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT `complaint_info`.`U_id`,`complaint_info`.`C_id`,`complaint_info`.`C_state`,`complaint_info`.`C_type`,`complaint_info`.`C_doc`,`complaint_info`.`C_desc`,`case_details`.`P_id`,`complaint_info`.`Status` FROM `complaint_info` INNER JOIN `case_details` on `complaint_info`.`C_id` = `case_details`.`C_id` AND `case_details`.`PS_id`='$stationid';";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $p=$row['P_id'];
                        if($row['P_id']==NULL)
                        {
                            $p="Not Assigned";
                        }
                        echo "<tr>
                        <th>" . $row['U_id'] . "</th>
                        <th>" . $row['C_id'] . "</th>
                        <th>" . $row['C_state'] . "</th>
                        <th>" . $row['C_type'] . "</th>
                        <th>" . $row['C_doc'] . "</th>
                        <th>" . $row['C_desc'] . "</th>
                        <th>" . $p. "</th>
                        <th>" . $row['Status'] . "</th>
                         </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    </section>
    <section class="my_form">
		<div class="center">
        <h1>Case Update Form</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
            <select name="cid" id="cid" required class='Drops'>
                <option value="">Select Case</option>
                <?php
                    $sql = "SELECT `complaint_info`.`C_id` FROM `complaint_info` WHERE `C_id` IN (SELECT `C_id` FROM `case_details` WHERE `PS_id`='$stationid') AND `complaint_info`.`Status`!='Complete';";
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
            <select name="pid" id="pid" required class='Drops' >
                <option value="">Select Officier</option>
                <?php
                    $sql = "SELECT `P_id`,`P_name` FROM `officier_info` WHERE `PS_id`='$stationid';";
                     $result = mysqli_query($conn,$sql);
                     if(!$result)
                    {
                        echo " error";
                    }
                    else
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<option value='".$row['P_id']."'>".$row['P_name']."</option>";
                         }
                    }
                ?>
            </select>
            <br>
            <button name="submitassign">Assign</button>
        </form>
        </div>
        <?php
        if(isset($_REQUEST['submitassign']))
        {
            $CUID = $_POST['cid'];
            $officierid = $_POST['pid'];
            $check;
            $sql3= "SELECT `P_id` FROM `case_details` WHERE `C_id`='$CUID';";
            $result3 = mysqli_query($conn,$sql3);
            if(!$result3)
            {
                echo " error";
            }
            while($row = mysqli_fetch_array($result3))
            {
                $check=$row['P_id'];
            }
            if($check==$officierid)
            {
                echo "Error";
            }
            else
            {
                $sql= "UPDATE `case_details` SET `P_id`='$officierid' WHERE `C_id`='$CUID';";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo " error";
                }
                else
                {
                    $sql1= "SELECT `U_id` FROM `complaint_info` WHERE `C_id`='$CUID';";
                    $result1 = mysqli_query($conn,$sql1);
                    if(!$result1)
                    {
                        echo " error";
                    }
                    while($row = mysqli_fetch_array($result1))
                            {
                                $uid=$row['U_id'];
                                if($check==NULL)
                                $sql2 = "INSERT INTO `case_update` (`C_id`,`U_id`,`CU_desc`) VALUES ('$CUID','$uid','Police Assigned');";
                                else
                                $sql2 = "INSERT INTO `case_update` (`C_id`,`U_id`,`CU_desc`) VALUES ('$CUID','$uid','Assigned Police Changed');";
                                $result2 = mysqli_query($conn,$sql2);
                                if(!$result2)
                                {
                                    echo " error";
                                }
                            }
                    echo "<script> location.href='PScomplaint.php'</script>";
                }
            }
        }
    ?>
	</section>
    </div>
    </div>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>