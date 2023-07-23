
<?php 
use PHPMailer\PHPMailer\PHPMailer;
$servername = 'localhost:3307';
$username = 'root';
$password = '';
$database_name = 'cybercrimeportal';
$conn = mysqli_connect($servername,$username,$password,$database_name);
if(isset($_POST['signup_nu']))
{
    $new_user_name = $_POST['nuname'];
    $new_user_gender = $_POST['nugender'];
    $new_user_nupass = $_POST['nupass'];
    $new_user_numob = $_POST['numob'];
    $new_user_nAadhar_no = $_POST['nAadhar_no'];
    $new_user_nustate = $_POST['nustate'];
    $new_user_email = $_POST['nuemail'];
    $new_user_dob = $_POST['nuDOB'];
    $new_user_add = $_POST['nuaddress'];
    $sql_email = "SELECT * FROM `user_info` WHERE `Uemail`='$new_user_email';";
    $result_email = mysqli_query($conn,$sql_email);
    $count_email = mysqli_num_rows($result_email);
    if(!$result_email)
    {
        echo " error";
    }
    $sql_aadhar = "SELECT * FROM `user_info` WHERE `Aadhar_no`='$new_user_nAadhar_no';";
    $result_aadhar = mysqli_query($conn,$sql_aadhar);
    $count_aadhar = mysqli_num_rows($result_aadhar);
    if(!$result_aadhar)
    {
        echo " error";
    }$sql_mob = "SELECT * FROM `user_info` WHERE `U_mob`='$new_user_numob   ';";
    $result_mob = mysqli_query($conn,$sql_mob);
    $count_mob = mysqli_num_rows($result_mob);
    if(!$result_mob)
    {
        echo " error";
    }
    else if($count_email!=1 && $count_aadhar!=1 && $count_mob!=1){
        $sql = "INSERT INTO `user_info` (`U_id`, `Uname`,`Uemail`, `Upassword`, `U_address`, `U_state`, `Aadhar_no`,`Gender`,`U_mob`, `U_dob`) VALUES (NULL, '$new_user_name','$new_user_email' ,'$new_user_nupass', '$new_user_add', '$new_user_nustate', '$new_user_nAadhar_no','$new_user_gender','$new_user_numob', '$new_user_dob');";
        $result = mysqli_query($conn,$sql);
        if(!$result)
        {
            echo " error";
        }
        echo "<script> 
        swal({
            title: 'Successfully Registered',
            icon: 'success',
            button: 'Yess!',
        });
        </script>";
        // echo "Successfully Registered";
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
                        $mail->addAddress($new_user_email);     //Add a recipient

                        //Attachments
                    //Optional name

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Registration Successful';
                        $mail->Body    = 'Hope You are doing Great <b>Your Apna Cyber Dost!</b><br> Thankyou for choosing our portal <br><br><br>Thanks<br>Cyber Crime Cell<br>#Cyber Dost';
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        if($mail->send()) {
                        } else {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                            
                        }
       
        // echo "<script> location.href='form.php'</script>";
    }
    else if($count_email==1){
        echo "<script> 
        swal({
            title: 'Email already exits',
            icon: 'error',
            button: 'Okk!',
        });
        </script>"; 
    }
    else if($count_aadhar==1){
        echo "<script> 
        swal({
            title: 'Aadhar number already exits',
            icon: 'error',
            button: 'Okk!',
        });
        </script>"; 
    }
    else if($count_mob==1){
        echo "<script> 
        swal({
            title: 'Mobile number already exits',
            icon: 'error',
            button: 'Okk!',
        });
        </script>"; 
    }
 }
?>