<?php
include "new_user_registration.php";
require "login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registration form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="formscss.css">
	<!-- Sweet alert -->
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" defer></script>
</head>
<body>
    <h1 class="heading">Cyber Crime Complain Portal</h1>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return check()" id="sign_up_form">
			<h1>Create Account</h1>
			<input type="text" placeholder="Name" id="nuname" name="nuname" required onkeypress="return knum(event)">
			<input type="email" placeholder="Email" id="nuemail" name="nuemail" required>
			<input type="password" placeholder="Password" id="nupass" name="nupass" required>
            <input type="tel" placeholder="mobile number" id="numob" name="numob" required>
			<input type="text" placeholder="Aadhar Number" id="nAadhar_no" name="nAadhar_no" required>
			<select id="nustate" name="nustate" required class="Drops">
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
			<fieldset >
				<legend>Gender</legend>
				<p id="radio_type">
					Male <input type ="radio" name="nugender" value="male" id="nugender" > Female<input type ="radio" name="nugender" value="Female"  id="nugender"> Others<input type ="radio" name="nugender" id="nugender" value="others" >
				</p>
			</fieldset>
			<input type="date"  id="nuDOB" name="nuDOB" placeholder="DOB" title="Date of Birth" required>
			<textarea name="nuaddress" id="nuaddress" cols="30" rows="10" placeholder="Address" required></textarea>
			<button name="signup_nu" type="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validate()" method="post" id="form_login">
			<h1>Sign in</h1>
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fa fa-facebook"></i></a>
				<a href="#" class="social"><i class="fa fa-instagram"></i></a>
				<a href="#" class="social"><i class="fa fa-linkedin"></i></a>
			</div> -->
			<input type="email" placeholder="Email" id="logemail" name="logemail" required>
			<input type="password" placeholder="Password" id="logpass" name="logpass" required	 title="minimum 7 with upper case, lower case, special character and numbers">
			<select name="type" id="type" required >
				<option value="">Select type of user</option>
				<option value="Normal User">Complainee Login</option>
				<option value="SHO">SHO Login</option>
				<option value="officier">Officier Login</option>
				<option value="Headquarter">Headquarter Login</option>
			</select>
			<!-- <a href="#" class="fyp">Forgot your password?</a> -->
			<button name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>Have any complaint and don't have account then please login in and file it as soon as possible</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Have any complaint and don't have an account then please register and file it as soon as possible</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


<!-- script for the form   -->
<script src="formjs.js"></script>
</body>
</html>
