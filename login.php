<?php
if(isset($_REQUEST['login']))
{
    $user_type = $_REQUEST['type'];
    $user_mail = $_REQUEST['logemail'];
    $user_pass = $_REQUEST['logpass'];

    if($user_type=="Normal User"){
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $sql = "SELECT `Uname`,`U_id` FROM `user_info` where `Uemail`='$user_mail' AND `Upassword`= '$user_pass' AND `Status`='Active';";
            $sql_status = "SELECT `Uname`,`U_id` FROM `user_info` where `Uemail`='$user_mail' AND `Upassword`= '$user_pass';";
            $result_status = mysqli_query($conn,$sql_status);
            $count_status = mysqli_num_rows($result_status);
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            if($count==1)
            {

                echo "found";
                while($row = mysqli_fetch_array($result))
                {
                    $user_name = $row['Uname'];
                    $user_id = $row['U_id'];
                }
                session_start();
                $_SESSION['username']= $user_name;
                $_SESSION['userid']= $user_id;
                $_SESSION['NORMALuseremail']=$user_mail;
                $sql_log = "INSERT INTO `log` (`User_id`,`User_email`,`User_type`) VALUES ('$user_id','$user_mail','$user_type');";
                $result_log = mysqli_query($conn,$sql_log);
                if(!$result_log)
                {
                    echo "error";
                }
                echo "<script> location.href='user_login.php'</script>";
            }
            else if($count_status==1 && $count==0)
            {
                echo "<script> 
                swal({
                    title: 'Profile Locked',
                    text: 'Your Profile is locked due to misleading info',
                    icon: 'error',
                    button: 'ohh noo!',
                });
                </script>";
            }
            else{
                // echo "Password or username incorrect";
                echo "<script> 
                swal({
                    title: 'Invalid Username or Password',
                    text: 'You have not entered Incorrect details',
                    icon: 'error',
                    button: 'ohh noo!',
                });
                </script>";
                
                }
    }
    else if($user_type=="Headquarter"){
            $servername = 'localhost:3307';
            $username = 'root';
            $password = '';
            $database_name = 'cybercrimeportal';
            $conn = mysqli_connect($servername,$username,$password,$database_name);
            $sql = "SELECT `H_uemail`,`H_id` FROM `headquarter` where `H_uemail`='$user_mail' AND `H_password` = '$user_pass';";
            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            if($count==1)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $user_name = $row['H_uemail'];
                    $headquarter_id = $row['H_id'];
                }
                session_start();
                $_SESSION['hname']= $user_name;
                $_SESSION['hid']= $headquarter_id;
                $sql_log = "INSERT INTO `log` (`User_id`,`User_email`,`User_type`) VALUES ('$headquarter_id','$user_mail','$user_type');";
                $result_log = mysqli_query($conn,$sql_log);
                if(!$result_log)
                {
                    echo "error";
                }
                echo "<script> location.href='admin.php'</script>";
            }
            else{
                echo "<script> 
                swal({
                    title: 'Invalid Username or Password',
                    text: 'You have not entered Incorrect details',
                    icon: 'error',
                    button: 'ohh noo!',
                });
                </script>";
                
            }
    }
    else if($user_type=="officier"){

        $servername = 'localhost:3307';
        $username = 'root';
        $password = '';
        $database_name = 'cybercrimeportal';
        $conn = mysqli_connect($servername,$username,$password,$database_name);
        $sql = "SELECT `P_name`,`P_id` FROM `officier_info` where `P_email`='$user_mail' AND `P_password` = '$user_pass';";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count==1)
        {

            echo "found";
            while($row = mysqli_fetch_array($result))
            {
                $user_name = $row['P_name'];
                $officier_id = $row['P_id'];
            }
            session_start();
            $_SESSION['pname']= $user_name;
            $_SESSION['pid']= $officier_id;
            $sql_log = "INSERT INTO `log` (`User_id`,`User_email`,`User_type`) VALUES ('$officier_id','$user_mail','$user_type');";
            $result_log = mysqli_query($conn,$sql_log);
            if(!$result_log)
            {
                echo "error";
            }
            echo "<script> location.href='indexofficier.php'</script>";
        }
        else{
            echo "<script> 
                swal({
                    title: 'Invalid Username or Password',
                    text: 'You have not entered Incorrect details',
                    icon: 'error',
                    button: 'ohh noo!',
                });
                </script>";
            
        }
    }
    else if($user_type=="SHO"){

        $servername = 'localhost:3307';
        $username = 'root';
        $password = '';
        $database_name = 'cybercrimeportal';
        $conn = mysqli_connect($servername,$username,$password,$database_name);
        $sql = "SELECT `PS_name`,`PS_id` FROM `policestation` where `PS_email`='$user_mail' AND `PS_password` = '$user_pass';";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count==1)
        {

            echo "found";
            while($row = mysqli_fetch_array($result))
            {
                $station_name = $row['PS_name'];
                $station_id = $row['PS_id'];
            }
            session_start();
            $_SESSION['stationname']= $station_name;
            $_SESSION['stationid']= $station_id;
            $sql_log = "INSERT INTO `log` (`User_id`,`User_email`,`User_type`) VALUES ('$station_id','$user_mail','$user_type');";
            $result_log = mysqli_query($conn,$sql_log);
            if(!$result_log)
            {
                echo "error";
            }
            echo "<script> location.href='indexstation.php'</script>";
        }
        else{
            echo "<script> 
            swal({
                title: 'Invalid Username or Password',
                text: 'You have not entered Incorrect details',
                icon: 'error',
                button: 'ohh noo!',
            });
            </script>";
            
        }
    }
    
 
    else{
         echo "<script> location.href='form.php'</script>"; 
    }
}
?>