<!DOCTYPE html>
<html>
  <?php
  if($_POST)
  {
    require "dbconfig.php";
    $username=$_POST['usrname'];
    $password=$_POST['psw'];

    $conn=mysqli_connect($host,$user,$pass,$db) or die("we couldn't connect");
    $querry1="SELECT * from police where username='$username' and password='$password'";
    $result1=mysqli_query($conn,$querry1);
      
    if(mysqli_num_rows($result1)>0)
    {
      session_start();
      $_SESSION['auth2']='true';
      $_SESSION['last_login_timestamp']=time();
      header('location:index1.php');
    
        
    }
        
  }   
    
 

  ?>
  <head>
    <title>Login</title>
    <style>
      <meta charset="utf-8">
      * { margin: 0px; padding: 0px; }
      body
      {
        font-size: 120%;
        background-image:url("web1.jpg");
        background-size: cover;
        background-attachment: fixed;
      }
      .header
      {
        width: 27%;
        margin: 50px auto 0px;
        color: white;
        background: brown;
        text-align: center;
        border: 1px solid #B0C4DE;
        border-bottom: none;
        border-radius: 10px 10px 0px 0px;
        padding: 20px;
      }
      form, .content
      {
        width: 27%;
        margin: 0px auto;
        padding: 20px;
        border: 1px solid #B0C4DE;
        background: white;
        opacity:.8;
        border-radius: 0px 0px 10px 10px;
      }
      .input-group
      {
        margin: 10px 5px 10px 5px;
      }
      .input-group label
      {
        display: block;
        text-align: center;
        margin: 3px;
      }
      .input-group input
      {
        height: 30px;
        width: 93%;
        padding: 5px 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid gray;
      }
      #user_type
      {
        height: 40px;
        width: 98%;
        padding: 5px 10px;
        background: white;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid gray;
      }
      .btn
      {
        padding: 10px;
        font-size: 15px;
        color: white;
        background: brown;
        border: none;
        border-radius: 5px;
      }
      .btn:hover
      {
        color: white;
        background: grey;
      }
  /* The message box is shown when the user clicks on the password field */
      #message
      {
        display:none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 20px;
        margin-top: 10px;
        height:250px;
      }

      #message p
      {
        padding: 1.5px 35px;
        font-size: 17px;
      }

  /* Add a green text color and a checkmark when the requirements are right */
      .valid
      {
        color: green;
      }

      .valid:before
      {
        position: relative;
        left: -35px;
        content: "T";
      }

  /* Add a red text color and an "x" when the requirements are wrong */
      .invalid
      {
        color: red;
      }

      .invalid:before
      {
        position: relative;
        left: -35px;
        content: "F";
      }
    </style>
  </head>
  <body>
    <div class="header">
      <h2>Criminal Records</h2>
      <img src="satya.png" height="120" width="90">
    </div>
    <form method="POST" action="">
      
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="usrname" value="" required>
      </div>
    
      <div class="input-group">
        <label> Password</label>
        <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$*^!#&]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter and a special character, and at least 8 or more characters" required>
      </div>

      <div class="input-group" align="center">
        <button type="submit" class="btn" name="register_btn" >Login</button>
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


    <script>
      var myInput = document.getElementById("psw");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var characters=document.getElementById("characters");
      var length = document.getElementById("length");

      myInput.onfocus=function()
      {
        document.getElementById("message").style.display = "block";
      }

      // When the user clicks outside of the password field, hide the message box
      myInput.onblur=function()
      {
        document.getElementById("message").style.display = "none";
      }

      // When the user starts to type something inside the password field
      myInput.onkeyup = function()
      {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) 
        {  
          letter.classList.remove("invalid");
          letter.classList.add("valid");
        }
        else
        {
          letter.classList.remove("valid");
          letter.classList.add("invalid");
        }
        
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters))
        {  
          capital.classList.remove("invalid");
          capital.classList.add("valid");
        }
        else
        {
          capital.classList.remove("valid");
          capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers))
        {  
          number.classList.remove("invalid");
          number.classList.add("valid");
        }
        else
        {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }
        var cs= /[@$*^!#&]/g;
        if(myInput.value.match(cs))
        {  
          characters.classList.remove("invalid");
          characters.classList.add("valid");
        }
        else
        {
          characters.classList.remove("valid");
          characters.classList.add("invalid");
        }
        
        // Validate length
        if(myInput.value.length >= 8)
        {
          length.classList.remove("invalid");
          length.classList.add("valid");
        }
        else
        {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }
      }
      // When the user clicks on the password field, show the message box

    </script>
  </body>
</html>