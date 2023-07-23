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
        <!-- <link rel="stylesheet" href="complaintform.css"> -->
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
        
        .center {
  position: relative;
  padding: 50px 50px;
  background: url(Logo/com_bg.jpg);
  border-radius: 10px;
  background-repeat: no-repeat;
  width: 50%;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #fdfdfd;
  letter-spacing: 5px;
  margin-bottom: 30px;
  font-weight: bold; 
  padding-left: 10px;
  /* display: flex;
  justify-items: center; */
}

input[type="text"],input[type="email"],input[type="tel"],input[type="password"],input[type="number"],input[type="date"],textarea,fieldset{
  width: 80%;
  border: 2px solid #fefcfc;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
  margin-bottom: 15px;
  color: #fdfdfd;
  /* background-color: #dadada; */
}

.del,.edit
{
    color: white;
    padding: 5px;
    border-radius: 3px;
    background-color: rgb(23, 95, 115);
}
#Edit_form {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
  font-size: 25px;
  position: relative;
  /* margin-left: 25%; */
  margin-top: 20px;
}
#Edit_form:hover{
  background: linear-gradient(45deg, rgb(156, 230, 228), dodgerblue,rgb(16, 31, 143));
}
form{
    display: none;
    margin: 25px;
    padding: 0;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    /* background: url(Logo/bg5.jpeg); */
    font-family: "Sansita Swashed", cursive;
    overflow: hidden;
}
.center{
    display: none;
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
        <h1>Here are the list users under the portal</h1>
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
                <th>Complainee Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `user_info`;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>
                        <td>" . $row['U_id'] . "</td>
                        <td>" . $row['Uname'] . "</td>
                        <td>" . $row['Uemail'] . "</td>
                        <td>" . $row['U_address'] . "</td>
                        <td>" . $row['U_state'] . "</td>
                        <td>" . $row['Aadhar_no'] . "</td>
                        <td>" . $row['Gender'] . "</td>
                        <td>" . $row['U_mob'] . "</td>
                        <td>" . $row['U_dob'] . "</td>
                        <td>" . $row['Status'] . "</td>
                        <td>" ."<button class = 'edit'> Edit</button><button class = 'del'> Delete</button>". "</td>
                        </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    </section>
    <form id="delete_form" method="post">
            <input type="hidden" name="del_id" id="del_id">
        </form>
    <?php
        if(isset($_POST['del_id']))
        {
            $id = $_POST['del_id'];
            $sql_id = "DELETE FROM `user_info` WHERE `U_id`='$id';";
            $result_id = mysqli_query($conn,$sql_id);
            if(!$result_id){
                echo "Error";
            }
            else{
                echo "<script> location.href='HVuser.php'</script>";
            }
        }
    ?>
    <div class="center">
    <h1>Edit Details</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="edit_details" method="post">
            <input type="hidden" name="vid" id="vid">
			<input type="text" placeholder="Name" id="uname" name="uname" required >
			<input type="email" placeholder="Email" id="uemail" name="uemail" required>
            <input type="tel" placeholder="mobile number" id="umob" name="umob" required>
			<input type="text" placeholder="Aadhar Number" id="Aadhar_no" name="Aadhar_no" required>
			<input type="text" placeholder="State" id="ustate" name="ustate" required>
			<input type="text" name="user_gender" id="user_gender" placeholder="Gender">
			<input type="date"  id="uDOB" name="uDOB" placeholder="DOB" title="Date of Birth" required>
			<textarea name="Uadd" id="Uadd" cols="30" rows="10" placeholder="Address"></textarea>
            <input type="text" name="user_status" id="user_status" placeholder="Status">
            <br>
			<button name="Update_details" type="submit" id="Edit_form">Edit</button>
            </form>
           
    </div>
    <?php
            if(isset($_REQUEST['Update_details']))
            {
                $complainee_id = $_POST['vid'];
                $complainee_name = $_POST['uname'];
                $complainee_email = $_POST['uemail'];
                $complainee_mob = $_POST['umob'];
                $complainee_addhar = $_POST['Aadhar_no'];
                $complainee_state = $_POST['ustate'];
                $complainee_gender = $_POST['gender'];
                $complainee_dob = $_POST['uDOB'];
                $complainee_add  = $_POST['Uadd'];  
                $complainee_status = $_POST['user_status'];
                $complainee_gender = $_POST['user_gender'];
                $sql = "UPDATE `user_info` SET `Uname`='$complainee_name',`Uemail`='$complainee_email',`U_address`='$complainee_add',`U_state`='$complainee_state',`Aadhar_no`='$complainee_addhar',`Gender`='$complainee_gender',`U_mob`='$complainee_mob',`U_dob`='$complainee_dob',`Status` = '$complainee_status' WHERE `U_id`='$complainee_id';";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "ERROR";
                }
                else{
                    echo "<script> location.href='HVuser.php'</script>";
                }
            }
            ?>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        var edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit");
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName("td")[0].innerText;
                let Name_e = tr.getElementsByTagName("td")[1].innerText;
                let Email = tr.getElementsByTagName("td")[2].innerText;
                let mob = tr.getElementsByTagName("td")[7].innerText;
                let aadhar = tr.getElementsByTagName("td")[5].innerText;
                let state = tr.getElementsByTagName("td")[4].innerText;
                let gender_1 = tr.getElementsByTagName("td")[6].innerText;
                let dob = tr.getElementsByTagName("td")[8].innerText;
                let u_status = tr.getElementsByTagName("td")[9].innerText;
                console.log(dob);
                let add_1 = tr.getElementsByTagName("td")[3].innerText;
                console.log(id);
                document.getElementsByClassName('center')[0].style.display = 'block';
                document.getElementsByClassName('center')[0].style.margin = 'auto';
                var element = document.getElementsByClassName("center")[0];
                element.scrollIntoView({ behavior: "smooth" });
                uname.value = Name_e;
                uemail.value =Email;
                uDOB.value = dob;
                Uadd.value=add_1;
                umob.value = mob;
                Aadhar_no.value = aadhar;
                ustate.value = state;
                vid.value = id;
                user_status.value = u_status;
                user_gender.value = gender_1;
            })
        })
        var dels = document.getElementsByClassName('del');
        Array.from(dels).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("delete");
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


