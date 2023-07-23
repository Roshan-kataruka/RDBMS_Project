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
            width: 95%
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
        .center1
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

}
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
        <h1>Here are the list Cyber Cells working under our portal</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>Station ID</th>
                <th>Station Name</th>
                <th>Station Email</th>
                <th>Station Locality</th>
                <th>Station Address</th>
                <th>Station Password</th>
                <th>Station State</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `policestation`;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>
                        <td>" . $row['PS_id'] . "</td>
                        <td>" . $row['PS_name'] . "</td>
                        <td>" . $row['PS_email'] . "</td>
                        <td>" . $row['PS_locality'] . "</td>
                        <td>" . $row['PS_address'] . "</td>
                        <td>" . $row['PS_password'] . "</td>
                        <td>" . $row['PS_State'] . "</td>
                        <td>" ."<button class = 'edit'> Edit</button> <button class = 'del'> Delete</button>". "</td>
                         </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    <div class="center">
    <h1>Edit Details</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="edit_details" method="post">
                 <input type="hidden" name="police_station_id" id="police_station_id">
                <input type="text" name="sname" id="sname" required placeholder="NAME"><br>
                <input type="text" name="semail" id="semail" required placeholder="EMAIL"><br>
                <input type="text" name="slocality" id="slocality" required placeholder="LOCALITY"><br>
                <input type="text" name="saddress" id="saddress" required placeholder="ADDRESS"><br>
                <input type="text" name="spass" id="spass" required placeholder="PASSWORD"><br>
                <input type="text" name="sstate" id="sstate" required placeholder="STATE"><br>
			<button name="Update_details" type="submit" id="Edit_form">Edit</button>
            </form>
           
    </div>
    <?php
            if(isset($_REQUEST['Update_details']))
            {
                $STATION_id =$_POST['police_station_id'];
                $STATION_name = $_REQUEST['sname'];
                $STATION_email = $_REQUEST['semail'];
                $STATION_localiy = $_REQUEST['slocality'];
                $STATION_address = $_REQUEST['saddress'];
                $STATION_pass = $_REQUEST['spass'];
                $STATION_state = $_REQUEST['sstate'];
                $sql = "UPDATE `policestation` SET `PS_name`='$STATION_name',`PS_email`='$STATION_email',`PS_locality`='$STATION_localiy',`PS_address`='$STATION_address',`PS_password`='$STATION_pass',`PS_state`='$STATION_state' WHERE `PS_id`='$STATION_id';";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "ERROR";
                }
                else{
                    echo "<script> location.href='HVstation.php'</script>";
                }
            }
            ?>
    <div class="addstation">
        <button id="addstation" onclick="hello()">ADD STATION</button>
    </div>
    </section>
    <section class="my_form">
		<div class="center1">
        <h1>Station Details</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" onsubmit="return validate()">
                <input type="text" name="psname" id="psname" required placeholder="NAME"><br>
                <input type="text" name="psemail" id="psemail" required placeholder="EMAIL"><br>
                <input type="text" name="pslocality" id="pslocality" required placeholder="LOCALITY"><br>
                <input type="text" name="psaddress" id="psaddress" required placeholder="ADDRESS"><br>
                <input type="password" name="pspass" id="pspass" required placeholder="PASSWORD"><br>
                <select name="psstate" id="psstate" required>
                <option value="">--Select State/UT--</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Ladakh">Ladakh</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
                </select><br>
                <button id="Addstation" name="Addstation"> Add</button> 
        </form>
        </div>
	</section>
        </div>
        <?php
            if(isset($_REQUEST['Addstation']))
            {
                $psname = $_REQUEST['psname'];
                $psemail = $_REQUEST['psemail'];
                $pslocaliy = $_REQUEST['pslocality'];
                $psaddress = $_REQUEST['psaddress'];
                $pspass = $_REQUEST['pspass'];
                $psstate = $_REQUEST['psstate'];
                $sql_email = "SELECT * FROM `policestation` WHERE `PS_email`='$psemail';";
                $result_email = mysqli_query($conn,$sql_email);
                $count_email = mysqli_num_rows($result_email);
                if(!$result_email)
                {
                    echo " error";
                }
                else if($count_email!=1)
                {
                $sql = "INSERT INTO `policestation` (`PS_id`,`PS_name`,`PS_email`,`PS_locality`,`PS_address`,`PS_password`,`PS_State`) VALUES (NULL, '$psname', '$psemail', '$pslocaliy', '$psaddress', '$pspass', '$psstate');";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo " error";
                }
                else{
                echo "<script> location.href='HVstation.php'</script>";
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
                echo "<script> location.href='HVstation.php'</script>";
                }
            }
        ?>
    </div>
    <form id="delete_form" method="post">
            <input type="hidden" name="del_id" id="del_id">
    </form>
    <?php
        if(isset($_POST['del_id']))
        {
            $id_1 = $_POST['del_id'];
            $sql_id = "DELETE FROM `policestation` WHERE `PS_id`='$id_1';";
            $result_id = mysqli_query($conn,$sql_id);
            if(!$result_id){
                echo "Error";
            }
            else{
                echo "<script> location.href='HVstation.php'</script>";
            }
        }
    ?>
    <script>
        let table = new DataTable('#myTable');
        function validate()
        {
            let psname = document.getElementById('psname').value;
            let psemail = document.getElementById('psemail').value;
            let pspass = document.getElementById('pspass').value;
            let psaddress = document.getElementById('psaddress').value;
            let pslocality = document.getElementById('pslocality').value;
            let psemail_reg = /^[A-Za-z0-9]{1,}[\._\-]*[A-Za-z0-9]*[@]{1}[a-z]{3,}[\.]{1}[a-z]{2,}$/
            let pspass_reg = /^(?=.*[0-9])(?=.*[!@#$%^_.:;{}\[\]<>\/"'=|&*])[a-z0-9!@#$%^&*]{7,15}$/
            if(psname.trim()=="")
            {
                document.getElementById("psname").style.background='red';
                return false;
            }
            else{
                document.getElementById("psname").style.background='';
            }
            if(psaddress.trim()=="")
            {
                document.getElementById("psaddress").style.background='red';
                return false;
            }
            else{
                document.getElementById("psaddress").style.background='';
            }
            if(pslocality.trim()=="")
            {
                document.getElementById("pslocality").style.background='red';
                return false;
            }
            else{
                document.getElementById("pslocality").style.background='';
            }
            if(psemail_reg.test(psemail))
            {
                document.getElementById('psemail').style.background='';
            }
            else
            {
                document.getElementById('psemail').style.background="red";
                swal({
                    title: "Invalid Email",
                    text: "You have Entered wrong email!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            if(pspass_reg.test(pspass))
            {
                document.getElementById('pspass').style.background='';
            }
            else
            {
                document.getElementById('pspass').style.background="red";
                swal({
                    title: "Invalid Password",
                    text: "You have Entered wrong password sequence!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            return true;
        }
        function hello(){
            if(document.getElementById('addstation').innerHTML=="ADD STATION"){
                document.getElementsByClassName('my_form')[0].style.visibility="visible";
                document.getElementById('addstation').innerHTML="Close";
            }
            else
            {
                document.getElementsByClassName('my_form')[0].style.visibility="hidden";
                document.getElementById('addstation').innerHTML="ADD STATION";
            }
        }
    </script>
    <script>
         var edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit");
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName("td")[6].innerText;
                console.log(id);
                $cells_id = tr.getElementsByTagName("td")[0].innerText;
                $cells_name = tr.getElementsByTagName("td")[1].innerText;
                $cells_email = tr.getElementsByTagName("td")[2].innerText;
                $cells_locality = tr.getElementsByTagName("td")[3].innerText;
                $cells_address = tr.getElementsByTagName("td")[4].innerText;
                $cells_pass = tr.getElementsByTagName("td")[5].innerText;
                $cells_state = tr.getElementsByTagName("td")[6].innerText;
                document.getElementsByClassName('center')[0].style.display = 'block';
                document.getElementsByClassName('center')[0].style.margin = 'auto';
                var element = document.getElementsByClassName("center")[0];
                element.scrollIntoView({ behavior: "smooth" });
                police_station_id.value=$cells_id;
                sname.value = $cells_name;
                semail.value = $cells_email;
                slocality.value = $cells_locality;
                saddress.value = $cells_address;
                spass.value = $cells_pass;
                sstate.value = $cells_state;
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
