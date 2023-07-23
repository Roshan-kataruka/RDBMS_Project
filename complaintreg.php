<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// session_start();
if($_SESSION['userid'])
    {
    if(isset($_REQUEST['Complaint']))
    {
        $cstate = $_REQUEST['cstate'];
        $ctype = $_REQUEST['ctype'];
        $cdate = $_REQUEST['cdate'];
        $cdesc = $_REQUEST['cdesc'];
        $userid = $_SESSION['userid'];
        
        $servername = 'localhost:3307';
        $username = 'root';
        $password = '';
        $database_name = 'cybercrimeportal';
        $conn = mysqli_connect($servername,$username,$password,$database_name);
        $sql = "INSERT INTO `complaint_info` (`C_id`, `U_id`, `C_state`, `C_type`, `C_doc`, `C_desc`) VALUES (NULL, '$userid', '$cstate', '$ctype', '$cdate', '$cdesc');";
        $result = mysqli_query($conn,$sql);
        if(!$result)
        {
            echo " error";
        }
        else{
        $sql1= "SELECT `complaint_info`.`C_id` FROM `complaint_info` WHERE `C_id` NOT IN (SELECT `C_id` FROM `case_details` WHERE `U_id`='$userid') AND `U_id`='$userid';";
        $result1 = mysqli_query($conn,$sql1);
        $count = mysqli_num_rows($result1);
        echo $count;
        if($count>0)
                {
                    while($row = mysqli_fetch_array($result1))
                    {
                        $cid=$row['C_id'];



                        //Import PHPMailer classes into the global namespace
                        //These must be at the top of your script, not inside a function
                        

                        //Load Composer's autoloader
                        require 'vendor/autoload.php';

                    //     //Create an instance; passing `true` enables exceptions
                        $mail = new PHPMailer(true);


                    //         //Server settings
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'hiralalhero94@gmail.com';                     //SMTP username
                        $mail->Password   = 'mglprxmxdzympzvx';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('hiralalhero94@gmail.com', 'Mailer');
                        $sql_email = "select `Uemail` FROM `user_info` WHERE `U_id`=' $userid'";
                        $result_email = mysqli_query($conn,$sql_email);
                        $row_email= mysqli_fetch_assoc($result_email);
                        $mail->addAddress($row_email['Uemail']);     //Add a recipient

                        //Attachments
                    //Optional name

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Thanks for filling Complaint';
                        $mail->Body    = 'Hope You are doing Great <b>Your Apna Cyber Dost!</b><br>Here is you complaint id '.$cid.' Please note it and track it in our website<br><br><br>Thanks<br>Cyber Crime Cell<br>#Cyber Dost';
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        if($mail->send()) {
                        } else {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                            
                        }

                        $sql2= "INSERT INTO `case_details` (`CD_id`,`C_id`,`U_id`) VALUES(NULL,'$cid','$userid');";
                        $result2 = mysqli_query($conn,$sql2);
                        if(!$result2)
                        {
                            echo "error";
                        }
                        $sql3= "INSERT INTO `case_update` (`C_id`,`U_id`,`CU_desc`) VALUES ('$cid','$userid','Complaint Filled');";
                        $result3 = mysqli_query($conn,$sql3);
                        if(!$result3)
                        {
                            echo " error";
                        }

                    }
                    echo "<script> 
                swal({
                    title: 'Complaint Successfully Filled',
                    text: 'Your details is being escalated to the higher officials',
                    icon: 'success',
                    button: 'okk!',
                });
                </script>";
                }
    }
}
}
else
{
    echo "<script> location.href='form.html'</script>";
}
?>