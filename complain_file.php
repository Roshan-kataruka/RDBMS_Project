<?php
session_start();
if(isset($_SESSION['username']))
{
}
else
        {
            echo "<script> location.href='form.html'</script>";
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File complaint portal</title>
    <link rel="stylesheet" href="u_login.css" type="text/css">
	<link rel="stylesheet" href="complaintform.css" type="text/css">
    <!-- Sweet alert -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css"></link>  
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
	<section class="my_form">

		<div class="center">
        <h1>Complaint form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validate()">
            <select required id="cstate" name="cstate" class="Drops">
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

            <br>
            <select name="ctype" id="ctype" required class="Drops" >
                <option value="">Select type of crime</option>
                <option value="Stolen credit card information">Stolen credit card information</option>
                <option value="Loss of control and access to content">Loss of control and access to content</option>
                <option value="Phishing">Phishing</option>
                <option value="Identity Theft">Identity Theft</option>
                <option value="Social Engineering">Social Engineering</option>
                <option value="Denial of Service">Denial of Service</option>
                <option value="Ransomware">Ransomware</option>
                <option value="Malware Attacks">Malware Attacks</option>
                <option value="Cyberstalking">Cyberstalking</option>
                <option value="Prohibited Content">Prohibited Content</option>
                <option value="others">Others</option>
            </select>
            <br>
            <input type="date" class="disableFuturedate" required id="cdate" name="cdate" title="Date of Crime" placeholder="Date of Crime">
            <br>
            <textarea name="cdesc" id="cdesc" name="cdesc" cols="30" rows="10" placeholder="Detailed description of Complaint in 30 words"></textarea>
            <br>
            <button name="Complaint">Submit</button>
        </form>
        </div>

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
    // $(document).ready(function () {
    //     var currentDate = new Date();
    //     $(".disableFuturedate").datepicker({
    //     format: "dd/mm/yyyy",
    //     autoclose:true,
    //     endDate: "currentDate",
    //     maxDate: currentDate
    //     }).on("changeDate", function (ev) {
    //        $(this).datepicker("hide");
    //     });
    //     $(".disableFuturedate").keyup(function () {
    //        if (this.value.match(/[^0-9]/g)) {
    //           this.value = this.value.replace(/[^0-9^-]/g, "");
    //        }
    //     });
    //  });
        function validate()
        {
            let state = document.getElementById("cstate").value;
            let desc = document.getElementById("cdesc").value;
            let date = document.getElementById("cdate").value;
            if(state.trim()!="")
            {
                
            }
            else{
                swal({
                    title: "Invalid State Name",
                    text: "You have not entered Incorrect details",
                    icon: "error",
                    button: "ohh noo!",
                });
                return false;
            }
            if(desc!="")
            {
    
            }
            else{
                swal({
                    title: "Invalid Descrption",
                    text: "You have not entered Incorrect details",
                    icon: "error",
                    button: "ohh noo!",
                });
                return false;
            }
            return true;
        }
     </script>
     <script src="media.js"></script>
</body>
</html>
<?php
include "complaintreg.php";
?>
