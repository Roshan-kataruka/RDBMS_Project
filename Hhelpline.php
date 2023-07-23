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
        .my_form{
            visibility: hidden;
        }
        .Drops{
            width: 100%;
            border: 2px solid #fefcfc;
            outline: none;
            background: none;
            padding: 10px;
            border-radius: 10px;
            font-size: 1.2em;
            margin-bottom: 15px;
            color: #fdfdfd;
            background: #171749;
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
        <h1>Here are the list of Helpline Numbers</h1>
    <table id="myTable">
        <thead>
            <tr>
            <th>S.No</th>
                <th>State/UT</th>
                <th>Name</th>
                <th>Rank</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $sql = "SELECT * FROM `helpline`;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))   
                    {
                        echo "<tr>
                        <td>" . $row['S_no'] . "</td>
                        <td>" . $row['State/UT'] . "</td>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['Rank'] . "</td>
                        <td>" . $row['Email'] . "</td>
                        <td>" . $row['Contact'] . "</td>
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
                 <input type="hidden" name="sno_id" id="sno_id">
                 <input type="text" name="help_state_name" id="help_state_name" required placeholder="State/UT"><br>
                <input type="text" name="help_name" id="help_name" required placeholder="Name"><br>
                <input type="text" name="help_rank" id="help_rank" required placeholder="RANK"><br>
                <input type="email" name="help_email" id="help_email" required placeholder="Email"><br>
                <input type="text" name="help_cont" id="help_cont" required placeholder="Contact"><br>
			    <button name="Update_details" type="submit" id="Edit_form">Edit</button>
            </form>
            </div>
            <?php
            if(isset($_REQUEST['Update_details']))
            {
                $sno = $_POST['sno_id'];
                $state_h = $_POST['help_state_name'];
                $name_h = $_POST['help_name'];
                $rank_h = $_POST['help_rank'];
                $email_h = $_POST['help_email'];
                $mob = $_POST['help_cont'];
                $sql_up = "UPDATE `helpline` SET `State/UT` = '$state_h',`Name` = '$name_h',`Rank` = '$rank_h',`Email` = '$email_h',`Contact`= '$mob' WHERE `S_no`='$sno';";
                $result_up = mysqli_query($conn,$sql_up);
                if(!$result_up)
                {
                    echo " error";
                }
                else{
                    echo "<script> location.href='Hhelpline.php'</script>";
                }
            }
            ?>
            <div class="addofficier">
        <button id="addofficier" onclick="hello()">ADD Helpline Number</button>
        <section class="my_form">
		<div class="center1">
        <h1>Helpline Details</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" onsubmit="return authenticate()">
        <!-- name="hl_state_name" id="hl_state_name" required -->
        <select name="hl_state_name" id="hl_state_name" required class="Drops">
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
                </select>
                <input type="text" name="hl_name" id="hl_name" required placeholder="Name"><br>
                <input type="text" name="hl_rank" id="hl_rank" required placeholder="RANK"><br>
                <input type="email" name="hl_email" id="hl_email" required placeholder="Email"><br>
                <input type="text" name="hl_cont" id="hl_cont" required placeholder="Contact"><br>
                <button id="Addnumber" name="Addnumber"> Add</button> 
        </form>
        </div>
	</section>
    <?php
     if(isset($_REQUEST['Addnumber']))
     {
        $state_hl = $_POST['hl_state_name'];
        $name_hl = $_POST['hl_name'];
        $rank_hl = $_POST['hl_rank'];
        $email_hl = $_POST['hl_email'];
        $cont_hl = $_POST['hl_cont'];
        // echo $state_hl;
        $sql_insert = "INSERT INTO `helpline` (`S_no`, `State/UT`, `Name`, `Rank`, `Email`, `Contact`) VALUES (NULL, '$state_hl', '$name_hl', '$rank_hl', '$email_hl', '$cont_hl');";
        $result_insert = mysqli_query($conn,$sql_insert);
        if(!$result_insert)
        {
            echo "Error";
        }
        else{
            echo "<script> location.href='Hhelpline.php'</script>";
        }
     }
    ?>
    </div>
    </div>
    <form id="delete_form" method="post">
            <input type="hidden" name="del_id" id="del_id">
    </form>
    
    <?php
        if(isset($_POST['del_id']))
        {
            $id_1 = $_POST['del_id'];
            $sql_id = "DELETE FROM `helpline` WHERE `S_no`='$id_1';";
            $result_id = mysqli_query($conn,$sql_id);
            if(!$result_id){
                echo "Error";
            }
            else{
                echo "<script> location.href='Hhelpline.php'</script>";
            }
        }
    ?>
    <script>
        let table = new DataTable('#myTable');
        function hello(){
            if(document.getElementById('addofficier').innerHTML=="ADD Helpline Number"){
                document.getElementsByClassName('my_form')[0].style.visibility="visible";
                document.getElementById('addofficier').innerHTML="Close";
            }
            else
            {
                document.getElementsByClassName('my_form')[0].style.visibility="hidden";
                document.getElementById('addofficier').innerHTML="ADD Helpline Number";
            }
        }
        function authenticate(){
            let _state = document.getElementById('hl_state_name').value;
            let _name = document.getElementById('hl_name').value;
            let _rank = document.getElementById('hl_rank').value;
            let _email = document.getElementById('hl_email').value;
            let _cont = document.getElementById('hl_cont').value;
            if(_state.trim()=='')
            {
                return false;
            }
            if(_name.trim()=='')
            {
                return false;
            }
            if(_cont.trim()=='')
            {
                return false;
            }
            if(_rank.trim()=='')
            {
                return false;
            }
            if(_email.trim()=='')
            {
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
                let sno = tr.getElementsByTagName("td")[0].innerText;
                let helpstate = tr.getElementsByTagName("td")[1].innerText;
                let helpname = tr.getElementsByTagName("td")[2].innerText;
                let helprank = tr.getElementsByTagName("td")[3].innerText;
                let helpemail = tr.getElementsByTagName("td")[4].innerText;
                let helpcont = tr.getElementsByTagName("td")[5].innerText;
                console.log(id);
                document.getElementsByClassName('center')[0].style.display = 'block';
                document.getElementsByClassName('center')[0].style.margin = 'auto';
                var element = document.getElementsByClassName("center")[0];
                element.scrollIntoView({ behavior: "smooth" });
                help_state_name.value = helpstate;
                sno_id.value = sno;
                help_name.value = helpname;
                help_rank.value = helprank;
                help_email.value =helpemail;
                help_cont.value = helpcont;
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