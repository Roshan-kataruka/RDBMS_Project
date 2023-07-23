<?php
        session_start();
        if(isset($_SESSION['pname']))
        {
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $pid = $_SESSION['pid'];
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
    <!-- Sweet alert -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css"></link>  
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
    <link rel="stylesheet" href="HVFORM_css.css">
    <!-- <link rel="stylesheet" href="complaintform.css" type="text/css"> -->
    <style>
        #myTable{
    padding: 5px;
    border-collapse: collapse;
    margin: 5px;
    background-color: rgb(234, 238, 240);
    position: relative;
    margin: auto;
    width: 80%
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
    <title>offficier panel</title>
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
        <section id="chist">
        <h1>Here are the list user details</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>Case update id</th>
                <th>Complain ID</th>
                <th>Complainee ID</th>
                <th>Date of Update</th>
                <th>Update Details</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `case_update` WHERE `C_id` IN (SELECT `C_id` FROM `complaint_info` WHERE `C_id` IN (SELECT `case_details`.`C_id` FROM `case_details` INNER JOIN `officier_info` ON `case_details`.`P_id` = `officier_info`.`P_id` AND `case_details`.`P_id`='$pid'));";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo " error";
                }
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>
                        <td>" . $row['cu_id'] . "</td>
                        <td>" . $row['C_id'] . "</td>
                        <td>" . $row['U_id'] . "</td>
                        <td>" . $row['D_O_CU'] . "</td>
                        <td>" . $row['CU_desc'] . "</td>
                        <td>" ."<button class = 'edit'> Edit</button>". "</td>
                        </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    </section>
    <section class="my_form">
		<div class="center1">
        <h1>Case Update Form</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" onsubmit="return validate()">
        <select name="cid" id="cid" required class="Drops" >
                <option value="">Select User</option>
                <?php
                     $sql = "SELECT `C_id`,`U_id` FROM `complaint_info` WHERE `C_id` IN (SELECT `case_details`.`C_id` FROM `case_details` INNER JOIN `officier_info` ON `case_details`.`P_id` = `officier_info`.`P_id` AND `case_details`.`P_id`='$pid') AND `Status`='Pending';";
                     $result = mysqli_query($conn,$sql);
                     if(!$result)
                    {
                        echo " error";
                    }
                     $count = mysqli_num_rows($result);
                     if($count>0)
                     {
                        while($row = mysqli_fetch_array($result))
                        {
                            $uid=$row['U_id'];
                            echo "<option value='".$row['C_id']." ".$uid."'>".$row['C_id']."</option>";
                        }
                     }
                ?>
            </select>
            <br>
            <input type="text" required id="cupdate" name="cupdate" placeholder="Enter the details">
            <br>
            <button name="submitupdate" id="submitupdate">Submit</button>
        </form>
        </div>
        <?php
        if(isset($_REQUEST['submitupdate']))
        {
            $CUID = $_POST['cid'];
            $array_id = explode(" ", $CUID );
            $cid1= $array_id[0];
            $uid1 = $array_id[1];
            $cupdate =$_POST['cupdate'];
            $sql= "INSERT INTO `case_update` (`C_id`,`U_id`,`CU_desc`) VALUES ('$cid1','$uid1','$cupdate');";
            $result = mysqli_query($conn,$sql);
            if(!$result)
            {
                echo " error";
            }
            else{
                echo "<script> location.href='OCupdate.php'</script>";
            }
        }
    ?>
	</section>
    <div class="center">
    <h1>Value Update Form</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="edit_details" method="post">
                 <input type="hidden" name="case_update_id" id="case_update_id">
                 <input type="text" name="desc" id="desc" required placeholder="Update description"><br>
			    <button name="Update_details" type="submit" id="Edit_form">Edit</button>
            </form>
            </div> 
    <?php
            if(isset($_REQUEST['Update_details']))
            {
                $caseupdateid = $_REQUEST['case_update_id'];
                $update_desc = $_REQUEST['desc'];
                $sql = "UPDATE `case_update` SET `CU_desc`='$update_desc' WHERE `cu_id`='$caseupdateid';";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo " error";
                }
            }
            ?>
    </div>
    </div>

    <script>
        let table = new DataTable('#myTable');
        function validate()
        {
            let cu = document.getElementById('cupdate').value.trim();
            if(cu==''){
                swal({
                    title: "Invalid Update description",
                    text: "You have not entered Incorrect details",
                    icon: "error",
                    button: "ohh noo!",
                });
                return false;
            }
            return true;
        }
    </script>
    <script>
        var edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit");
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName("td")[0].innerText;
                // console.log(id);
                let case_update_id_1 = tr.getElementsByTagName("td")[0].innerText;
                let update_desc = tr.getElementsByTagName("td")[4].innerText;
                document.getElementsByClassName('center')[0].style.display = 'block';
                document.getElementsByClassName('center')[0].style.margin = 'auto';
                var element = document.getElementsByClassName("center")[0];
                element.scrollIntoView({ behavior: "smooth" });
                case_update_id.value=case_update_id_1;
                desc.value = update_desc;
            })
        })
    </script>
</body>

</html>
