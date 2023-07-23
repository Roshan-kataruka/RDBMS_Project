<?php
        session_start();
        if(isset($_SESSION['hname']))
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
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="HVFORM_css.css">
    <!-- Sweet alert -->
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
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
        .my_form{
            visibility:hidden;
        }
        /* .center1
{
  position: relative;
  padding: 50px 50px;
  background: url(Logo/com_bg.jpg);
  border-radius: 10px;
  background-repeat: no-repeat;
  width: 50%;
}
.center1 h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #fdfdfd;
  letter-spacing: 5px;
  margin-bottom: 30px;
  font-weight: bold; 
  padding-left: 10px;

} */
    </style>
    <title>Admin panel</title>
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
        <section id="chist">
        <h1>Here are the list Officiers working under our portal</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>Officier ID</th>
                <th>Officier Name</th>
                <th>Officier Spec</th>
                <th>Officier Rank</th>
                <th>Officier Password</th>
                <th>Officier Phone No.</th>
                <th>Officier Aadhar No.</th>
                <th>Officier Gender</th>
                <th>Officier Station ID</th>
                <th>Officier Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $sql = "SELECT * FROM `officier_info`;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>
                        <td>" . $row['P_id'] . "</td>
                        <td>" . $row['P_name'] . "</td>
                        <td>" . $row['P_spec'] . "</td>
                        <td>" . $row['P_rank'] . "</td>
                        <td>" . $row['P_password'] . "</td>
                        <td>" . $row['P_mob'] . "</td>
                        <td>" . $row['P_aadhar'] . "</td>
                        <td>" . $row['P_gender'] . "</td>
                        <td>" . $row['PS_id'] . "</td>
                        <td>" . $row['P_email'] . "</td>
                        <td>" ."<button class = 'edit'> Edit</button> <button class = 'del'> Delete</button>". "</td>
                         </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    </section>
    <div class="center">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="edit_details" method="post">
                 <input type="hidden" name="cell_off_id" id="cell_off_id">
                 <input type="text" name="offname" id="offname" required placeholder="NAME"><br>
                <input type="text" name="offspec" id="offspec" required placeholder="SPCIALIZATION"><br>
                <input type="text" name="offrank" id="offrank" required placeholder="RANK"><br>
                <input type="text" name="offpass" id="offpass" required placeholder="PASSWORD"><br>
                <input type="text" name="offaadhar" id="offaadhar" required placeholder="AADHAR"><br>
                <input type="text" name="offmob" id="offmob" required placeholder="MOBILE"><br>
                <input type="text" name="offgender" id="offgender" required placeholder="GENDER"><br>
                <input type="text" name="offemail" id="offemail" required placeholder="EMAIL"><br>
                <select name="offpsid" id="offpsid" required class="Drops">
                    <option value="">Select Station</option>
                    <?php
                        $sql = "SELECT `PS_id`,`PS_name` FROM `policestation`;";
                        $result = mysqli_query($conn,$sql);
                        if(!$result)
                        {
                            echo "error";
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<option value='".$row['PS_id']."'>".$row['PS_name']."</option>";
                            }
                        }
                    ?>
                </select><br>
			    <button name="Update_details" type="submit" id="Edit_form">Edit</button>
            </form>
            </div> 
    <?php
            if(isset($_REQUEST['Update_details']))
            {
                $offid = $_REQUEST['cell_off_id'];
                $offname = $_REQUEST['offname'];
                $offspec = $_REQUEST['offspec'];
                $offrank = $_REQUEST['offrank'];
                $offpass = $_REQUEST['offpass'];
                $offaadhar = $_REQUEST['offaadhar'];
                $offmob = $_REQUEST['offmob'];
                $offgender = $_REQUEST['offgender'];
                $offemail = $_REQUEST['offemail'];
                $offpsid = $_REQUEST['offpsid'];
                $sql = "UPDATE `officier_info` SET `P_name`='$offname',`P_spec`='$offspec',`P_rank`='$offrank',`P_password`='$offpass',`P_mob`='$offmob',`P_aadhar`='$offaadhar',`P_gender`='$offgender',`PS_id`='$offpsid',`P_email`='$offemail' WHERE `P_id`='$offid';";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo " error";
                }
                else{
                    echo "<script> location.href='HVofficier.php'</script>";
                }
            }
            ?>
    <div class="addofficier">
        <button id="addofficier" onclick="hello()">ADD Officier</button>
    </div>
    </section>
    <section class="my_form">
		<div class="center1">
        <h1>Officier Details</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" onsubmit="return validate()">
                <input type="text" name="pname" id="pname" required placeholder="NAME"><br>
                <input type="text" name="pspec" id="pspec" required placeholder="SPCIALIZATION"><br>
                <input type="text" name="prank" id="prank" required placeholder="RANK"><br>
                <input type="password" name="ppass" id="ppass" required placeholder="PASSWORD"><br>
                <input type="text" name="paadhar" id="paadhar" required placeholder="AADHAR"><br>
                <input type="text" name="pmob" id="pmob" required placeholder="MOBILE"><br>
                <input type="text" name="pgender" id="pgender" required placeholder="GENDER"><br>
                <input type="text" name="pemail" id="pemail" required placeholder="EMAIL"><br>
                <select name="psid" id="psid" required class="Drops">
                    <option value="">Select Station</option>
                    <?php
                        $sql = "SELECT `PS_id`,`PS_name` FROM `policestation`;";
                        $result = mysqli_query($conn,$sql);
                        if(!$result)
                        {
                            echo "error";
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<option value='".$row['PS_id']."'>".$row['PS_name']."</option>";
                            }
                        }
                    ?>
                </select><br>
                <button id="Addofficier" name="Addofficier"> Add</button> 
        </form>
        </div>
	</section>
    </div>
    </div>
    <?php
            if(isset($_REQUEST['Addofficier']))
            {
                $pname = $_REQUEST['pname'];
                $pspec = $_REQUEST['pspec'];
                $prank = $_REQUEST['prank'];
                $ppass = $_REQUEST['ppass'];
                $paadhar = $_REQUEST['paadhar'];
                $pmob = $_REQUEST['pmob'];
                $pgender = $_REQUEST['pgender'];
                $pemail = $_REQUEST['pemail'];
                $psid = $_REQUEST['psid'];
                $sql_email = "SELECT * FROM `officier_info` WHERE `P_email`='$pemail';";
                $result_email = mysqli_query($conn,$sql_email);
                $count_email = mysqli_num_rows($result_email);
                if(!$result_email)
                {
                    echo " error";
                }
                else if($count_email!=1)
                {
                $sql = "INSERT INTO `officier_info` (`P_id`, `P_name`, `P_spec`, `P_rank`, `P_password`, `P_mob`, `P_aadhar`, `P_gender`, `PS_id`, `P_email`) VALUES (NULL, '$pname', '$pspec', '$prank', '$ppass', '$pmob', '$paadhar', '$pgender', '$psid', '$pemail');";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo " error";
                }
                else{
                echo "<script> location.href='HVofficier.php'</script>";
                }
            }
            else if($count_email==1){
                echo "<script> 
                swal({
                    title: 'Email already exits',
                    icon: 'error',
                    button: 'Okk!',
                });
                </script>"; 
            }
            else{
                echo "<script> location.href='HVofficier.php'</script>";
                }
            }
        ?>
    <script>
        let table = new DataTable('#myTable');
        function hello(){
            if(document.getElementById('addofficier').innerHTML=="ADD Officier"){
                document.getElementsByClassName('my_form')[0].style.visibility="visible";
                document.getElementById('addofficier').innerHTML="Close";
            }
            else
            {
                document.getElementsByClassName('my_form')[0].style.visibility="hidden";
                document.getElementById('addofficier').innerHTML="ADD Officier";
            }
        }
        function validate()
        {
            let pname = document.getElementById('pname').value;
            let pspec = document.getElementById('pspec').value;
            let prank = document.getElementById('prank').value;
            let ppass = document.getElementById('ppass').value;
            let paadhar = document.getElementById('paadhar').value;
            let pmob = document.getElementById('pmob').value;
            let pgender = document.getElementById('pgender').value;
            let pemail = document.getElementById('pemail').value;
            let pemail_reg = /^[A-Za-z0-9]{1,}[\._\-]*[A-Za-z0-9]*[@]{1}[a-z]{3,}[\.]{1}[a-z]{2,}$/
            let ppass_reg = /^(?=.*[0-9])(?=.*[!@#$%^_.:;{}\[\]<>\/"'=|&*])[a-z0-9!@#$%^&*]{7,15}$/
            let pmob_reg = /^[0]?[\+91]?[6-9]{1}[0-9]{9,11}$/
            let Aadhar_no_reg = /^[0-9]{12,}$/
            if(pname.trim()=="")
            {
                document.getElementById("pname").style.background='red';
                swal({
                    title: "Invalid Fieldvalue",
                    text: "You have Entered wrong value!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            else{
                document.getElementById("pname").style.background='';
            }
            if(pspec.trim()=="")
            {
                document.getElementById("pspec").style.background='red';
                swal({
                    title: "Invalid Fieldvalue",
                    text: "You have Entered wrong value!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            else{
                document.getElementById("pspec").style.background='';
            }
            if(prank.trim()=="")
            {
                document.getElementById("prank").style.background='red';
                swal({
                    title: "Invalid Fieldvalue",
                    text: "You have Entered wrong value!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            else{
                document.getElementById("prank").style.background='';
            }
            if(pgender.trim()=="")
            {
                document.getElementById("pgender").style.background='red';
                swal({
                    title: "Invalid Fieldvalue",
                    text: "You have Entered wrong value!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            else{
                document.getElementById("pgender").style.background='';
            }
            if(pemail_reg.test(pemail))
            {
                document.getElementById('pemail').style.background='';
            }
            else
            {
                document.getElementById('pemail').style.background="red";
                swal({
                    title: "Invalid Email",
                    text: "You have Entered wrong email!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            if(ppass_reg.test(ppass))
            {
                document.getElementById('ppass').style.background='';
            }
            else
            {
                document.getElementById('ppass').style.background="red";
                swal({
                    title: "Invalid Password",
                    text: "You have Entered wrong password sequence!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            if(pmob_reg.test(pmob))
            {
                document.getElementById('pmob').style.background='';
            }
            else
            {
                document.getElementById('pmob').style.background="red";
                swal({
                    title: "Invalid mobile number",
                    text: "You have Entered wrong mobile number!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            if(Aadhar_no_reg.test(paadhar))
            {
                document.getElementById('paadhar').style.background='';
            }
            else
            {
                document.getElementById('paadhar').style.background="red";
                swal({
                    title: "Invalid Aadhar card number",
                    text: "You have Entered wrong Aadhar card number!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;	
            }
            return true;
        }
    </script>
    <form id="delete_form" method="post">
            <input type="hidden" name="del_id" id="del_id">
    </form>
    <?php
        if(isset($_POST['del_id']))
        {
            $id_1 = $_POST['del_id'];
            $sql_id = "DELETE FROM `officier_info` WHERE `P_id`='$id_1';";
            $result_id = mysqli_query($conn,$sql_id);
            if(!$result_id){
                echo "Error";
            }
            else{
                echo "<script> location.href='HVofficier.php'</script>";
            }
        }
    ?>
    <script>
        var edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit");
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName("td")[6].innerText;
                console.log(id);
                let OFFICER_id = tr.getElementsByTagName("td")[0].innerText;
                let OFFICER_name = tr.getElementsByTagName("td")[1].innerText;
                let OFFICER_spec = tr.getElementsByTagName("td")[2].innerText;
                let OFFICER_rank = tr.getElementsByTagName("td")[3].innerText;
                let OFFICER_pass = tr.getElementsByTagName("td")[4].innerText;
                let OFFICER_aadhar = tr.getElementsByTagName("td")[6].innerText;
                let OFFICER_mob = tr.getElementsByTagName("td")[5].innerText;
                let OFFICER_gender = tr.getElementsByTagName("td")[7].innerText;
                let OFFICER_email = tr.getElementsByTagName("td")[9].innerText;
                let OFFICER_psid = tr.getElementsByTagName("td")[8].innerText;
                document.getElementsByClassName('center')[0].style.display = 'block';
                document.getElementsByClassName('center')[0].style.margin = 'auto';
                var element = document.getElementsByClassName("center")[0];
                element.scrollIntoView({ behavior: "smooth" });
                offname.value = OFFICER_name;
                offspec.value = OFFICER_spec;
                offrank.value = OFFICER_rank;
                offpass.value = OFFICER_pass;
                offaadhar.value = OFFICER_aadhar;
                offmob.value = OFFICER_mob;
                offgender.value = OFFICER_gender;
                offemail.value = OFFICER_email;
                offpsid.value = OFFICER_psid;
                cell_off_id.value=OFFICER_id;
                // console.log(cell_off_id.value);
            })
        })
        var dels = document.getElementsByClassName('del');
        Array.from(dels).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName("td")[0].innerText;
                console.log(id);
                if(confirm("Do You want to Delete the data")==true)
                {
                    del_id.value = id;
                    document.getElementById('delete_form').submit();
                    
                }
            })
        })
        </script>
</body>

</html>