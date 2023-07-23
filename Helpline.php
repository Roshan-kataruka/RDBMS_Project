<?php
        session_start();
        if(isset($_SESSION['username']))
        {
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
        }
        else
        {
            echo "<script> location.href='form.php'</script>";
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpline</title>
    <link rel="stylesheet" href="Complain_history.css" type="text/css">
    <link rel="stylesheet" href="u_login.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .others li a{
        color: white;
    }
    .logout li a {
        text-decoration: none;
        color: white;
    }
    #myTable{
        width: 80%;
        margin: auto;
    }
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
    <div class="helpline">
        <div class="info">
            <h3>Helpline Numbers</h3>
            <p>
            If you are a victim of cyber crime or witness any suspicious online activity, it is essential to report it immediately to the cyber crime complaint portal. The portal serves as a centralized platform for individuals and organizations to report cyber crimes such as phishing, hacking, cyberbullying, online fraud, and more. To file a complaint, you can visit the portals website and fill out the complaint form with the necessary details. Additionally, the portal provides a helpline number that you can call for assistance with reporting cyber crimes. The helpline number is available 24/7, and the trained professionals will guide you through the complaint process and provide you with the necessary support. Remember, timely reporting of cyber crimes is crucial to prevent further damage and protect yourself and others from becoming victims.
            </p>
        <button class="learn_more"> <a href="https://www.india.gov.in/" target="_blank">Learn More</a></button>
        </div>
        <hr>
        <hr>
        </div>
    <table id="myTable">
        <thead>
            <tr>
                <th>S.No</th>
                <th>State/UT</th>
                <th>Name</th>
                <th>Rank</th>
                <th>Email</th>
                <th>Contact</th>
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
                         </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    <footer id="end">
        <a href="#">FAQ</a>
        <a href="#">Feedback</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Disclaimer</a>
        <a href="#">&copy; 2022 | Govt</a>
    </footer>
    <script>
        let table = new DataTable("#myTable");
    </script>
    <script src="media.js"></script>
</body>
</html>





