<?php
$servername = 'localhost:3307';
$username = 'root';
$password = '';
$database_name = 'cybercrimeportal';
$conn = mysqli_connect($servername,$username,$password,$database_name);
session_start();
if(isset($_SESSION['username']))
{
    $user_id=$_SESSION['userid'];
    $NORMALUSEREMAIL = $_SESSION['NORMALuseremail'];
    $sql_log = "UPDATE `log` SET `logout_time`=now() WHERE `User_id`='$user_id' AND `User_email`='$NORMALUSEREMAIL' AND `User_type`='Normal User';";
    $result_log = mysqli_query($conn,$sql_log);
    if(!$result_log)
    {
        echo "error";
    }
    session_unset();
    session_destroy();
    echo "<script> location.href='form.php'</script>";
}
else if(isset($_SESSION['hname']))
{
    $h_id=$_SESSION['hid'];
    $sql_log = "UPDATE `log` SET `logout_time`=now() WHERE `User_id`='$h_id';";
    $result_log = mysqli_query($conn,$sql_log);
    if(!$result_log)
    {
        echo "error";
    }
    session_unset();
    session_destroy();
    echo "<script> location.href='form.php'</script>";
}
else if(isset($_SESSION['pname']))
{
    $station_o_id=$_SESSION['pid'];
    $sql_log = "UPDATE `log` SET `logout_time`=now() WHERE `User_id`='$station_o_id';";
    $result_log = mysqli_query($conn,$sql_log);
    if(!$result_log)
    {
        echo "error";
    }
    session_unset();
    session_destroy();
    echo "<script> location.href='form.php'</script>";
}
else if(isset($_SESSION['stationname']))
{
    $station_id=$_SESSION['stationid'];
    $sql_log = "UPDATE `log` SET `logout_time`=now() WHERE `User_id`='$station_id';";
    $result_log = mysqli_query($conn,$sql_log);
    if(!$result_log)
    {
        echo "error";
    }
    session_unset();
    session_destroy();
    echo "<script> location.href='form.php'</script>";
}
else{
echo "<script> location.href='form.php'</script>";
}
?>
