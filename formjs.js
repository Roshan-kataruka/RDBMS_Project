const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

function validate()
{
let logemail = document.getElementById('logemail').value;
let logpass = document.getElementById('logpass').value;
let logemail_reg = /^[a-z0-9]{1,}[\._\-]*[a-z0-9]*[@]{1}[a-z]{3,}[\.]{1}[a-z]{2,}$/
let logpass_reg = /^(?=.*[0-9])(?=.*[!@#$%^_.:;{}\[\]<>\/"'=|&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/

if(logemail_reg.test(logemail))
{
	document.getElementById('logemail').style.background="#eee"
}
else
{
	document.getElementById('logemail').style.background="red";
	alert("Hello");
	swal({
		title: "Invalid Email",
		text: "You have Enetered wrong email!",
		icon: "error",
		button: "ohh noo!",
	  });
	return false;
}
if(logpass_reg.test(logpass))
{
	document.getElementById('logpass').style.background="#eee";
}
else
{
	document.getElementById('logpass').style.background="red";
	swal({
		title: "Invalid Password",
		text: "You have Entered wrong password sequence all small caps with special characters, numbers and 7 to 15 length!",
		icon: "error",
		button: "OOh NOO!",
	  });
	return false;
}
// document.getElementById('form_login').reset();
return true;
}
function check(){
	// const form1 = document.getElementById('sign_up_form');
	let uname = document.getElementById('nuname').value;
	let uemail = document.getElementById('nuemail').value;
	let upass = document.getElementById('nupass').value;
	let umob = document.getElementById('numob').value;
	let Aadhar_no = document.getElementById('nAadhar_no').value;
	let uemail_reg = /^[A-Za-z0-9]{1,}[\._\-]*[A-Za-z0-9]*[@]{1}[a-z]{3,}[\.]{1}[a-z]{2,}$/
	let upass_reg = /^(?=.*[0-9])(?=.*[!@#$%^_.:;{}\[\]<>\/"'=|&*])[a-z0-9!@#$%^&*]{7,15}$/
	let umob_reg = /^[0]?[\+91]?[6-9]{1}[0-9]{9,11}$/
	let Aadhar_no_reg = /^[0-9]{12}$/
	if(uname.trim()=="")
    {
        document.getElementById("nuname").style.background='red';
        return false;
    }
	if(uemail_reg.test(uemail))
	{
		document.getElementById('nuemail').style.background="#eee";
	}
	else
	{
		document.getElementById('nuemail').style.background="red";
		swal({
			title: "Invalid Email",
			text: "You have Entered wrong email!",
			icon: "error",
			button: "OOh NOO!",
		  });
		return false;
	}
	if(upass_reg.test(upass))
	{
		document.getElementById('nupass').style.background="#eee";
	}
	else
	{
		document.getElementById('nupass').style.background="red";
		swal({
			title: "Invalid Password",
			text: "You have Entered wrong password sequence all small caps with special characters, numbers and 7 to 15 length",
			icon: "error",
			button: "OOh NOO!",
		  });
		return false;
	}
	if(umob_reg.test(umob))
	{
		document.getElementById('numob').style.background="#eee";
	}
	else
	{
		document.getElementById('numob').style.background="red";
		swal({
			title: "Invalid mobile number",
			text: "You have Entered wrong mobile number!",
			icon: "error",
			button: "OOh NOO!",
		  });
		return false;
	}
	if(Aadhar_no_reg.test(Aadhar_no))
	{
		document.getElementById('nAadhar_no').style.background="#eee";
	}
	else
	{
		document.getElementById('nAadhar_no').style.background="red";
		swal({
			title: "Invalid Aadhar card number",
			text: "You have Entered wrong Aadhar card number!",
			icon: "error",
			button: "OOh NOO!",
		  });
		return false;	
	}
	return true;
}
function knum(event)
{
    let code = event.which;
    if(code>47 && code<58)
    {
        swal({
			title: "Invalid key press",
			text: "You cannot enter numbers!",
			icon: "error",
			button: "OOh NOO!",
		  });
        return false
    }
    return true;
}

