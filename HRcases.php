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
        <h1>Here are the list of Rejected Cases</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>Complaint ID</th>
                <th>Complainee ID</th>
                <th>Rejection Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $sql = "SELECT * FROM `rejected_cases`;";
                $result = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                {
                    while($row = mysqli_fetch_array($result))   
                    {
                        echo "<tr>
                        <td>" . $row['C_id'] . "</td>
                        <td>" . $row['U_id'] . "</td>
                        <td>" . $row['Rejec_desc'] . "</td>
                        <td>" ."<button class = 'edit'> Edit</button>". "</td>
                         </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    </section>
    <div class="center">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" id="edit_details" method="post">
                 <input type="hidden" name="case_id" id="case_id">
                 <input type="text" name="desc" id="desc" required placeholder="Rejection description"><br>
			    <button name="Update_details" type="submit" id="Edit_form">Edit</button>
            </form>
            </div> 
    <?php
            if(isset($_REQUEST['Update_details']))
            {
                $caseid = $_REQUEST['case_id'];
                $reject_desc = $_REQUEST['desc'];
                $sql = "UPDATE `rejected_cases` SET `Rejec_desc`='$reject_desc' WHERE `C_id`='$caseid';";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo " error";
                }
                else{
                    echo "<script> location.href='HRcases.php'</script>";
                }
            }
            ?>
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
                let id = tr.getElementsByTagName("td")[2].innerText;
                // console.log(id);
                let case_id_1 = tr.getElementsByTagName("td")[0].innerText;
                let rejection_desc = tr.getElementsByTagName("td")[2].innerText;
                document.getElementsByClassName('center')[0].style.display = 'block';
                document.getElementsByClassName('center')[0].style.margin = 'auto';
                case_id.value=case_id_1;
                desc.value = rejection_desc;
            })
        })
    </script>
</body>

</html>