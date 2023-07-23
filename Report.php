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
   <link rel="stylesheet" href="complaintform.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css"></link>  
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Admin panel</title>
    <style>
        .center{
            width: 50%;
        }
    </style>
    <style>
        #myTable,#myTable1{
    padding: 5px;
    border-collapse: collapse;
    margin: 5px;
    background-color: rgb(234, 238, 240);
    position: relative;
    margin: auto;
    width: 80%
}
#myTable th, #myTable td ,#myTable1 th, #myTable1 td {
    padding: 5px;
    text-align: left;
    border: 2px solid rgb(7, 7, 7);
  }
#myTable th,#myTable1 th{
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
        #chist{
            visibility: hidden;
        }
    </style>
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
        <section class="my_form">
        <div class="center">
                <h1>Search Date Wise</h1>
                <form action="<?php echo $_SERVER["PHP_SELF"]?>"  method="post" onsubmit="return check()">
                    <input type="date" name="start_date" id="start_date" title="Start Date"><br>
                    <input type="date" name="end_date" id="end_date" title="End Date"><br>
                    <button name="Search">Search</button>
                    <button onclick="tableToCSV();">Download</button>
                </form>
        </div>
        <section id="chist">
        <h1>Here are the list of Required cases</h1>
    <table id="myTable">
        <thead>
            <tr class='_1'>
                <th >Complainee ID</th>
                <th>Complainee Name</th>
                <th >Complainee Email</th>
                <th>Complainee State</th>
                <th >Complainee Gender</th>
                <th>Complaint ID</th>
                <th >Complaint Type</th>
                <th>Complaint State</th>
                <th >Complaint Status</th>
                <th>Police Station ID</th>
                <th >Police Station Name</th>
                <th>Officer ID</th>
                <th >Officer Name</th>
                <th >Officer Gender</th>
            </tr>
        </thead>
        <tbody>
        <?php
                if(isset($_POST['Search']))
                {
                    $start_d = $_POST['start_date'];
                    $end_d = $_POST['end_date'];
                    // echo $start_d;
                    // echo $end_d;
                    $sql_date = "select `case_details`.`U_id`,`user_info`.`Uname`,`user_info`.`Uemail`,`user_info`.`U_state`,`user_info`.`Gender`,`case_details`.`C_id`,`complaint_info`.`C_type`,`complaint_info`.`C_state`,`complaint_info`.`Status`,`policestation`.`PS_id`,`policestation`.`PS_name`,`officier_info`.`P_id`,`officier_info`.`P_name`,`officier_info`.`P_gender` from `complaint_info` Left JOIN `case_details` on `complaint_info`.`C_id`=`case_details`.`C_id` left join `policestation` on `case_details`.`PS_id`=`policestation`.`PS_id` left JOIN `officier_info` on `officier_info`.`P_id`=`case_details`.`P_id` left JOIN `user_info` on `user_info`.`U_id`=`case_details`.`U_id` WHERE `complaint_info`.`complaint_date` BETWEEN '$start_d' AND '$end_d';";
                    $result_date = mysqli_query($conn,$sql_date);
                    if(!$result_date)
                    {
                        echo "Error";
                    }
                    while($row = mysqli_fetch_array($result_date))   
                    {
                        $psid=$row['PS_id'];
                        if($psid==NULL)
                        {
                            $psid= 'NULL';
                        }
                        $psname = $row['PS_name'];
                        if($psname==NULL)
                        {
                            $psname= 'NULL';
                        }
                        $pid=$row['P_id'];
                        if($pid==NULL)
                        {
                            $pid= 'NULL';
                        }
                        $pname = $row['P_name'];
                        if($pname==NULL)
                        {
                            $pname= 'NULL';
                        }
                        $pgender= $row['P_gender'];
                        if($pgender==NULL)
                        {
                            $pgender= 'NULL';
                        }
                        echo "<tr class='_1'>
                        <td>" . $row['U_id'] . "</td>
                        <td>" . $row['Uname'] . "</td>
                        <td>" . $row['Uemail'] . "</td>
                        <td>" . $row['U_state'] . "</td>
                        <td>" . $row['Gender'] . "</td>
                        <td>" . $row['C_id'] . "</td>
                        <td>" . $row['C_type'] . "</td>
                        <td>" . $row['C_state'] . "</td>
                        <td>" . $row['Status'] . "</td>
                        <td>" . $psid . "</td>
                        <td>" . $psname . "</td>
                        <td>" . $pid . "</td>
                        <td>" . $pname . "</td>
                        <td>" . $pgender . "</td>
                         </tr>";
                         
                        // echo '<script>alert("alert");</script>';
                    }
                    echo "<script> 
                            swal({
                                title: 'Please Click download to see the report',
                                icon: 'success',
                                button: 'Okk!',
                            });
                            </script>";
                }
            ?>
        </tbody>
    </table>
    </section>  
        </div>
    </div>
    <script>
        var check_var=0;
        function check()
        {
            let sd = document.getElementById('start_date').value;
            let ed = document.getElementById('end_date').value;
            if(sd>ed)
            {
                swal({
                    title: "Incorrect",
                    text: "start date cannot exceed end date",
                    icon: "error",
                    button: "ohh noo!",
                });
                return false;
            }
            // tableToCSV();
            chech_var=1;
            return true;
        }
        // let table = new DataTable('#myTable');
        function tableToCSV() {
            // Variable to store the final csv data
            var csv_data = [];

            // Get each row data
            var rows = document.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {

                // Get each column data
                var cols = rows[i].querySelectorAll('td,th');

                // Stores each csv row data
                var csvrow = [];
                for (var j = 0; j < cols.length; j++) {

                    // Get the text data of each cell of
                    // a row and push it to csvrow
                    csvrow.push(cols[j].innerHTML);
                }

                // Combine each column value with comma
                csv_data.push(csvrow.join(","));
            }
            // combine each row data with new line character
            csv_data = csv_data.join('\n');
            downloadCSVFile(csv_data);

            /* We will use this function later to download
            the data in a csv file downloadCSVFile(csv_data);
            */
            }

            function downloadCSVFile(csv_data) {

            // Create CSV file object and feed our
            // csv_data into it
            CSVFile = new Blob([csv_data], { type: "text/csv" });

            // Create to temporary link to initiate
            // download process
            var temp_link = document.createElement('a');

            // Download csv file
            temp_link.download = "CyberComplaintReport.csv";
            var url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;

            // This link should not be displayed
            temp_link.style.display = "none";
            document.body.appendChild(temp_link);

            // Automatically click the link to trigger download
            temp_link.click();
            document.body.removeChild(temp_link);
            }
    </script>
</body>

</html>