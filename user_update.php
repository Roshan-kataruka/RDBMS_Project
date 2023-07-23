<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Update</title>
    <link rel="stylesheet" href="u_login.css" type="text/css">
    <link rel="stylesheet" href="complaintform.css" type="text/css">
    <!-- sweetAlert -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
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
    <section>
        <?php
        session_start();
        if(isset($_SESSION['username']))
        {
            // echo "welcome ".$_SESSION['username'];
            ?>
            <section class="my_form">
                <div class="center">
                <h1>Update form</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return update1()">
                    <select name="utype" id="utype" required class="Drops" >
                        
                        <option value="">Select the field you want to update</option>
                        <option value="address">Address</option>
                        <option value="dob">Date Of Birth</option>
                        <option value="email">Email</option>
                        <option value="mob">Mobile Number</option>
                        <option value="password">Password</option>
                        <option value="gender">Gender</option>
                        <option value="state">State</option>
                        <option value="name">User name</option>
                        <option value="aadhar">Aadhar card Number</option>

                    </select>
                    <br>
                    <textarea name="updatelabel" id="updatelabel" name="updatelabel" cols="30" rows="10" placeholder="Fill the respective details" required></textarea>
                    <br>
                    <button name="UPDATE">UPDATE</button>
                    </form>
                </div>
	        </section>
        <?php
        }
        else
        {
            echo "<script> location.href='form.php'</script>";
        }
        ?>
        
    </section>
    <footer id="end">
        <a href="#">FAQ</a>
        <a href="#">Feedback</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Disclaimer</a>
        <a href="#">&copy; 2022 | Govt</a>
    </footer>
    <script>
        function update1()
        {
            let ufiled = document.getElementById('utype').value;
            let uvalue = document.getElementById('updatelabel').value.trim();
            let dob_reg = /[0-9]{4}[\/]+[0-1]+[0-9]+[\/]+[0-3]+[0-9]+/
            let uemail_reg = /^[A-Za-z0-9]{1,}[\._\-]*[A-Za-z0-9]*[@]{1}[a-z]{3,}[\.]{1}[a-z]{2,}$/
            let upass_reg = /^(?=.*[0-9])(?=.*[!@#$%^_.:;{}\[\]<>\/"'=|&*])[a-z0-9!@#$%^&*]{7,15}$/
            let umob_reg = /^[0]?[\+91]?[6-9]{1}[0-9]{9,11}$/
            let Aadhar_no_reg = /^[0-9]{12,}$/
            let gender_reg = /[A-za-z]{4,}/
            if(uvalue == "")
            {
                document.getElementById('updatelabel').style.background="red";
                swal({
                    title: "Field is Empty",
                    text: "You have not entered data in the field!",
                    icon: "error",
                    button: "OOh NOO!",
                });
                return false;
            }
            else if(ufiled == "dob" ){
                if(dob_reg.test(uvalue) == false)
                {
                    document.getElementById('updatelabel').style.background="red";
                    swal({
                        title: "Field is not in proper order",
                        text: "The Date Of Birth Order is YYYY/MM/DD!",
                        icon: "error",
                        button: "OOh NOO!",
                    });
                    return false;
                }
            }
            else if(ufiled == "email" ){
                if(uemail_reg.test(uvalue) == false)
                {
                    document.getElementById('updatelabel').style.background="red";
                    swal({
                        title: "Field is not in proper order",
                        text: "Please fill a proper email id!",
                        icon: "error",
                        button: "OOh NOO!",
                    });
                    return false;
                }
            }
            else if(ufiled == "mob" ){
                if(umob_reg.test(uvalue) == false)
                {
                    document.getElementById('updatelabel').style.background="red";
                    swal({
                        title: "Field is not in proper order",
                        text: "Please fill a proper mobile number",
                        icon: "error",
                        button: "OOh NOO!",
                    });
                    return false;
                }
            }
            else if(ufiled == "password" ){
                if(upass_reg.test(uvalue) == false)
                {
                    document.getElementById('updatelabel').style.background="red";
                    swal({
                        title: "Field is not in proper order",
                        text: "Please fill a proper password with upper case, lower case, numbers, special characters, length between 7 to 14",
                        icon: "error",
                        button: "OOh NOO!",
                    });
                    return false;
                }
            }
            else if(ufiled == "aadhar" ){
                if(Aadhar_no_reg.test(uvalue) == false)
                {
                    document.getElementById('updatelabel').style.background="red";
                    swal({
                        title: "Field is not in proper order",
                        text: "Please fill a proper 12 digit only",
                        icon: "error",
                        button: "OOh NOO!",
                    });
                    return false;
                }
            }
            else if(ufiled == "gender" ){
                if(gender_reg.test(uvalue) == false)
                {
                    document.getElementById('updatelabel').style.background="red";
                    swal({
                        title: "Field is not in proper order",
                        text: "Please fill a proper 12 digit only",
                        icon: "error",
                        button: "OOh NOO!",
                    });
                    return false;
                }
            }
            return true;
        }
    </script>
    <script src="media.js"></script>
</body>
</html>
<?php
            if(isset($_REQUEST['UPDATE']))
            {
                $servername = 'localhost:3307';
                $username = 'root';
                $password = '';
                $database_name = 'cybercrimeportal';
                $conn = mysqli_connect($servername,$username,$password,$database_name);
                $user_type = $_REQUEST['utype'];
                $user_update = $_REQUEST['updatelabel'];
                $userid = $_SESSION['userid'];
                if($user_type == 'address')
                {
                    $sql = "UPDATE `user_info` SET `U_address`= '$user_update' WHERE `U_id` = '$userid';";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 1)
                    {
                        ?>
                        <script>
                        swal({
                            title: "Success",
                            text: "Filed is updated",
                            icon: "success",
                            button: "yess!",
                        });
                        </script>
                        <?php
                    }
                    else{
                        echo '
                        swal({
                            title: "Error",
                            text: "Filed not updated",
                            icon: "error",
                            button: "ooh noo!",
                        });
                        ';
                    }
                }
                else if($user_type == 'dob')
                {
                    $sql = "UPDATE `user_info` SET `U_dob`= '$user_update' WHERE `U_id` = '$userid';";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 1)
                    {
                        ?>
                        <script>
                        swal({
                            title: "Success",
                            text: "Filed is updated",
                            icon: "success",
                            button: "yess!",
                        });
                        </script>
                        <?php
                    }
                    else{
                        echo '
                        swal({
                            title: "Error",
                            text: "Filed not updated",
                            icon: "error",
                            button: "ooh noo!",
                        });
                        ';
                    }
                }
                else if($user_type == 'email')
                {
                    $sql = "UPDATE `user_info` SET `Uemail`= '$user_update' WHERE `U_id` = '$userid';";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 1)
                    {
                        ?>
                        <script>
                        swal({
                            title: "Success",
                            text: "Filed is updated",
                            icon: "success",
                            button: "yess!",
                        });
                        </script>
                        <?php
                    }
                    else{
                        echo '
                        swal({
                            title: "Error",
                            text: "Filed not updated",
                            icon: "error",
                            button: "ooh noo!",
                        });
                        ';
                    }
                }
                else if($user_type == 'mob')
                {
                    $sql = "UPDATE `user_info` SET `U_mob`= '$user_update' WHERE `U_id` = '$userid';";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 1)
                    {
                        ?>
                        <script>
                        swal({
                            title: "Success",
                            text: "Filed is updated",
                            icon: "success",
                            button: "yess!",
                        });
                        </script>
                        <?php
                    }
                    else{
                        echo '
                        swal({
                            title: "Error",
                            text: "Filed not updated",
                            icon: "error",
                            button: "ooh noo!",
                        });
                        ';
                    }
                }
                else if($user_type == 'password')
                {
                    $sql = "UPDATE `user_info` SET `Upassword`= '$user_update' WHERE `U_id` = '$userid';";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 1)
                    {
                        ?>
                        <script>
                        swal({
                            title: "Success",
                            text: "Filed is updated",
                            icon: "success",
                            button: "yess!",
                        });
                        </script>
                        <?php
                    }
                    else{
                        echo '
                        swal({
                            title: "Error",
                            text: "Filed not updated",
                            icon: "error",
                            button: "ooh noo!",
                        });
                        ';
                    }
                }
                else if($user_type == 'gender')
                {
                    $sql = "UPDATE `user_info` SET `Gender`= '$user_update' WHERE `U_id` = '$userid';";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 1)
                    {
                        ?>
                        <script>
                        swal({
                            title: "Success",
                            text: "Filed is updated",
                            icon: "success",
                            button: "yess!",
                        });
                        </script>
                        <?php
                    }
                    else{
                        echo '
                        swal({
                            title: "Error",
                            text: "Filed not updated",
                            icon: "error",
                            button: "ooh noo!",
                        });
                        ';
                    }
                }
                else if($user_type == 'state')
                {
                    $sql = "UPDATE `user_info` SET `U_state`= '$user_update' WHERE `U_id` = '$userid';";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 1)
                    {
                        ?>
                        <script>
                        swal({
                            title: "Success",
                            text: "Filed is updated",
                            icon: "success",
                            button: "yess!",
                        });
                        </script>
                        <?php
                    }
                    else{
                        echo '
                        swal({
                            title: "Error",
                            text: "Filed not updated",
                            icon: "error",
                            button: "ooh noo!",
                        });
                        ';
                    }
                }
                else if($user_type == 'name')
                {
                    $sql = "UPDATE `user_info` SET `Uname`= '$user_update' WHERE `U_id` = '$userid';";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 1)
                    {
                        ?>
                        <script>
                        swal({
                            title: "Success",
                            text: "Filed is updated",
                            icon: "success",
                            button: "yess!",
                        });
                        </script>
                        <?php
                    }
                    else{
                        echo '
                        swal({
                            title: "Error",
                            text: "Filed not updated",
                            icon: "error",
                            button: "ooh noo!",
                        });
                        ';
                    }
                }
                else if($user_type == 'aadhar')
                {
                    $sql = "UPDATE `user_info` SET `Aadhar_no`= '$user_update' WHERE `U_id` = '$userid';";
                    $result = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($result);
                    if($count == 1)
                    {
                        ?>
                        <script>
                        swal({
                            title: "Success",
                            text: "Filed is updated",
                            icon: "success",
                            button: "yess!",
                        });
                        </script>
                        <?php
                    }
                    else{
                        echo '
                        swal({
                            title: "Error",
                            text: "Filed not updated",
                            icon: "error",
                            button: "ooh noo!",
                        });
                        ';
                    }
                }

            }
        ?>