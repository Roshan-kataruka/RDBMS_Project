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
    <link rel="stylesheet" href="HVFORM_css.css">
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
        <h1>Here are the list Officiers working under our portal</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>Officier ID</th>
                <th>Officier Name</th>
                <th>Officier Spec</th>
                <th>Officier Rank</th>
                <th>Officier Phone No.</th>
                <th>Officier Addhar No.</th>
                <th>Officier Gender</th>
                <th>Officier Station ID</th>
                <th>Officier Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `officier_info` WHERE `PS_id`='$stationid';";
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
                        <td>" . $row['P_mob'] . "</td>
                        <td>" . $row['P_aadhar'] . "</td>
                        <td>" . $row['P_gender'] . "</td>
                        <td>" . $row['PS_id'] . "</td>
                        <td>" . $row['P_email'] . "</td>
                        <td>" ."<button class = 'edit'> Edit</button>". "</td>
                         </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    </section>
    <div class="center">
    <h1>Edit Details</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="edit_details" method="post">
            <input type="hidden" name="oid" id="oid">
			<input type="text" placeholder="Officier Name" id="oname" name="oname" required >
			<input type="email" placeholder="Email" id="oemail" name="oemail" required>
            <input type="tel" placeholder="mobile number" id="omob" name="omob" required>
			<input type="text" placeholder="Aadhar Number" id="oAadhar" name="oAadhar" required>
			<input type="text" name="officier_gender" id="officier_gender">
			<br>
			<button name="Update_details" type="submit" id="Edit_form">Edit</button>
            </form>
            <?php
    if(isset($_REQUEST['Update_details']))
            {
                $off_id1 = $_POST['oid'];
                // echo $off_id1;
                $off_name = $_POST['oname'];
                $off_email = $_POST['oemail'];
                $off_mob = $_POST['omob'];
                $off_addhar = $_POST['oAadhar'];
                $off_gender = $_POST['officier_gender']; 
                $sql = "UPDATE `officier_info` SET `P_name`='$off_name',`P_email`='$off_email',`P_mob`='$off_mob',`P_aadhar`='$off_addhar',`P_gender`='$off_gender' WHERE `P_ID`='$off_id1';";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "ERROR";
                }
                else{
                    echo "<script> location.href='PSofficier.php'</script>";
                }
            }
            ?>
    </div>
    
        </div>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        var edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click",(e)=>{
                console.log("edit");
                let tr = e.target.parentNode.parentNode;
                let id = tr.getElementsByTagName("td")[8].innerText;
                console.log(id);
                let off_id = tr.getElementsByTagName("td")[0].innerText;
                let off_name = tr.getElementsByTagName("td")[1].innerText;
                let off_mob = tr.getElementsByTagName("td")[4].innerText;
                let off_aadhar = tr.getElementsByTagName("td")[5].innerText;
                let off_gender = tr.getElementsByTagName("td")[6].innerText;
                let off_email = tr.getElementsByTagName("td")[8].innerText;
                document.getElementsByClassName('center')[0].style.display = 'block';
                document.getElementsByClassName('center')[0].style.margin = 'auto';
                var element = document.getElementsByClassName("center")[0];
                element.scrollIntoView({ behavior: "smooth" });
                oname.value = off_name;
                oemail.value= off_email;
                omob.value = off_mob;
                oAadhar.value = off_aadhar;
                // male.checked = true;
                oid.value = off_id;
                officier_gender.value = off_gender;
            })
        })
        </script>
</body>

</html>