<!DOCTYPE html>
<html>
<?php
session_start();
if(($_SESSION['auth2']=="true")||($_SESSION['auth3']=="true") )
{
   
     if((time() -$_SESSION['last_login_timestamp'])>900)
   {
    header('location:logout.php');
   }
   else{
    $_SESSION['last_login_timestamp']=time();
   }
}
else {
  header('Location:main1.php');
 }
 if($_POST)
 {
require "dbconfig.php";
 $conn=mysqli_connect($host,$user,$pass,$db) or die("we couldn't connect");
$uname=$_POST['username'];
$oldpwd=$_POST['password_3'];
$newpwd=$_POST['password_1'];
$newpwd2=password_hash($newpwd,PASSWORD_BCRYPT);
$tday=new DateTime(date("d-m-Y"));
    $tday2=new DateTime(date("d-m-Y",strtotime("+45 day")));
    $ttday=$tday->format('d-m-Y');
    $ttday2=$tday2->format('d-m-Y');
$querry1="SELECT * FROM police WHERE username='$uname'";
$result1=mysqli_query($conn,$querry1);
if(mysqli_num_rows($result1)>0)
{
while($row=mysqli_fetch_array($result1))
{
  $pass=$row['password'];
  if($oldpwd==$pass){
    $q="UPDATE police SET password='$newpwd2',strdat='$ttday',enddat='$ttday2'WHERE username='$uname'";
    $update=mysqli_query($conn,$q);
  }

  else if(password_verify($oldpwd,$pass))
  {
    $q="UPDATE police SET password='$newpwd2',strdat='$ttday',enddat='$ttday2'WHERE username='$uname'";
    $update=mysqli_query($conn,$q);
  }
  else{
  echo'<script>alert("old password entered does not match!")</script>';
  $q="false";
}
}
}
else{
  echo'<script>alert("wrong username")</script>';
  $q="false";
}
if ($conn->query($q) === TRUE) {
    $conn->close();
  session_destroy();?>
    <script>
      alert("password reset successfully");
    window.location.href='main1.php';
  </script>
 <?php
} 
$conn->close();
 } 
 ?>

<head>
	<title>Password Reset system</title>
	<style>
	* { margin: 0px; padding: 0px; }
body {
	font-size: 120%;
	 background-image:url("web1.jpg");
     background-size: cover;
    background-attachment: fixed;
}
.header {
	width: 25%;
	margin: 50px auto 0px;
	color: white;
	background: brown;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
form, .content {
	width: 25%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
  opacity:.8;
}
.input-group {
	margin: 10px 5px 10px 5px;
}
.input-group label {
	display: block;
	text-align: center;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.abc button{
  padding: 10px;
  font-size: 15px;
  height:50px;
  width:80px;
  color: white;
  background: brown;
  border: none;
  border-radius: 5px;  
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: brown;
	border: none;
	border-radius: 5px;
}
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 5px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "T";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "F";
}
</style>
</head>
<body>
 <div class="abc" align="left">
    <button onclick="direct()">Back</button>
  </div>
<div class="header">
	<h2>Reset Password</h2>
</div>
<form method="POST" action="">
  <div class="input-group">
    <label>Username</label>
    <input type="text" name="username" required>
  </div>
	<div class="input-group">
		<label>Old Password</label>
		<input type="password" id="password_3" name="password_3" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$*^!#&]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter and a special character, and at least 8 or more characters" required>
	</div>
	
	<div class="input-group">
		<label> New Password</label>
		<input type="password" id="password_1" name="password_1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$*^!#&]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter and a special character, and at least 8 or more characters" required>
	</div>

	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" id="password_2" name="password_2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$*^!#&]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter and a special character, and at least 8 or more characters" required>
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn" onclick="return Validate()" >Reset</button>
	</div>
  <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
   <p id="characters" class="invalid">A <b>special characters</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
</form>
<center><a href="logout.php"><font color="white">Logout</font></a></center>


<script>
var abc='<?php echo $_SESSION['auth2']; ?>';
var myInput = document.getElementById("password_1");
var myInput2 = document.getElementById("password_2");
var myInput3 = document.getElementById("password_3");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var characters=document.getElementById("characters");
var length = document.getElementById("length");
function direct()
{
  if(abc=="true")
  {
    window.location.href="index1.php";
  }
   if(abc2=="true")
  {
    window.location.href="index2.php";
  }

}
myInput3.onfocus = function() {
  document.getElementById("message").style.display = "block";
  
}

// When the user clicks outside of the password field, hide the message box
myInput3.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput3.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput3.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput3.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput3.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
   var cs= /[@$*^!#&]/g;
  if(myInput3.value.match(cs)) {  
    characters.classList.remove("invalid");
    characters.classList.add("valid");
  } else {
    characters.classList.remove("valid");
    characters.classList.add("invalid");
  }
  
  // Validate length
  if(myInput3.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
 
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
  letter.classList.remove("valid");
    letter.classList.add("invalid");
capital.classList.remove("valid");
    capital.classList.add("invalid");
 number.classList.remove("valid");
    number.classList.add("invalid");
characters.classList.remove("valid");
    characters.classList.add("invalid");
  length.classList.remove("valid");
    length.classList.add("invalid");
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
   var cs= /[@$*^!#&]/g;
  if(myInput.value.match(cs)) {  
    characters.classList.remove("invalid");
    characters.classList.add("valid");
  } else {
    characters.classList.remove("valid");
    characters.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
// When the user clicks on the password field, show the message box
myInput2.onfocus = function() {
  document.getElementById("message").style.display = "block";
  letter.classList.remove("valid");
    letter.classList.add("invalid");
capital.classList.remove("valid");
    capital.classList.add("invalid");
 number.classList.remove("valid");
    number.classList.add("invalid");
characters.classList.remove("valid");
    characters.classList.add("invalid");
  length.classList.remove("valid");
    length.classList.add("invalid");
}

// When the user clicks outside of the password field, hide the message box
myInput2.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput2.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput2.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput2.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput2.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
   var cs= /[@$*^!#&]/g;
  if(myInput2.value.match(cs)) {  
    characters.classList.remove("invalid");
    characters.classList.add("valid");
  } else {
    characters.classList.remove("valid");
    characters.classList.add("invalid");
  }
  
  // Validate length
  if(myInput2.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
function Validate() {
        var password = document.getElementById("password_1").value;
        var confirmPassword = document.getElementById("password_2").value;
        var oldpass= document.getElementById("password_3").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        if (password == oldpass) {
            alert("Cannot use same password");
            return false;
        }

        return true;
    }
</script>
</body>
</html>