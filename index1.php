<html>
    <?php
    session_start();
    include "dbconfig.php";
    if($_SESSION['auth2']=="true")
    {
        if((time() -$_SESSION['last_login_timestamp'])>900)
        {
            header('location:logout.php');
        }
        else
        {
            $_SESSION['last_login_timestamp']=time();
        }
    }       
    else
    {
        header('Location:main1.php');
    }
    if($_POST)
    {
        require "dbconfig.php";
        $connect=mysqli_connect($host,$user,$pass,$db) or die("we couldn't connect");
        if(!empty($_POST["pname"]))
        { 
            $a1=$_POST["pname"];
            $a2=$_POST["username"];
            $a3=$_POST["password"];
            $a4=$_POST["confpassword"];
            $a5=$_POST["mobile"];
            $a6=$_POST["email"];
            $a7=$_POST["dob"];
            $a8=$_POST["address"];
            $a9=$_POST["city"];
            $a10=$_POST["state"];
            $a11=$_POST["country"];
            if($a3==$a4)
            {
                $querry = "INSERT INTO police VALUES('$a1','$a2','$a3','$a5','$a6','$a7','$a8','$a9','$a10','$a11')";
                $result=mysqli_query($connect,$querry);
                if($result)
                {
                    echo '<script>alert("Data inserted successfully")</script>';
                }
            }
            else
            {
                echo '<script>alert("Incorrect Password!! Retry")</script>';
            }
        }
        if(!empty($_POST["crimeid"]))
        {    
            $b=$_POST["crimeid"];
            $b1=$_POST["criminals"];
            $b2=$_POST["category"];
            $b3=$_POST["prison"];
            $b4=$_POST["court"];
            $b5=$_POST["date"];
            $b6=$_POST["place"];
            $b7=$_POST["desc"];
            $querry2 = "INSERT INTO crime VALUES ('$b','$b1','$b2','$b3','$b4','$b5','$b6','$b7')";
            
            $result2=mysqli_query($connect,$querry2);
            if($result2)
            {
                echo '<script>alert("Data inserted successfully")</script>';
            }
            else
            {
                echo '<script>alert("Data insertion failed")</script>';
            }
        }
        if(!empty($_POST["cname"]))
        {
            $c=$_POST["criminalid"];
            $c1=$_POST["cname"];
            $c2=$_POST["alias"];
            $c3=$_POST["cmob"];
            $c4=$_POST["cemail"];
            $c5=$_POST["cgender"];
            $c6=$_POST["cheight"];
            $c7=$_POST["cweight"];
            $c8=$_POST["cdob"];
            $c9=$_POST["cnationality"];
            $c10=$_POST["crace"];
            $c11=$_POST["ccity"];
            $c12=$_POST["cstate"];
            $c13=$_POST["ccountry"];
            $querry3 = "INSERT INTO criminal VALUES('$c','$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$c9','$c10','$c11','$c12','$c13')";
            $result3 = mysqli_query($connect,$querry3);
            if($result3)
            {
                echo '<script>alert("Data inserted successfully")</script>';
            }
            else
            {
                echo '<script>alert("Couldnt enter data, check the data!")</script>';
            }
        }
        if(!empty($_POST["court_id"]))
        {
            $d=$_POST["court_id"];
            $d1=$_POST["court"];
            $d2=$_POST["courtname"];
            $d3=$_POST["courtplace"];
            $querry4 = "INSERT INTO court VALUES('$d','$d1','$d2','$d3')";
            $result4 = mysqli_query($connect,$querry4);
            if($result4)
            {
                echo '<script>alert("Data inserted successfully")</script>';
            }
            else
            {
                echo '<script>alert("Couldnt enter data, check the data!")</script>';
            }
        }
        if(!empty($_POST['prison_id']))
        {
            $e=$_POST["prison_id"];
            $e1=$_POST["prisonname"];
            $e2=$_POST["prisondesc"];
            $querry5 = "INSERT INTO prison VALUES('$e','$e1','$e2')";
            $result5 = mysqli_query($connect,$querry5);
            if($result5)
            {
                echo '<script>alert("Data inserted successfully")</script>';
            }
            else
            {
                echo '<script>alert("Couldnt enter data, check the data!")</script>';
            }
        }
    

$connect->close();
}
?>

<head>
<title>Admin Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
#white-background{
                display: none;
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                background-color: #fefefe;
                opacity: 0.7;
                z-index: 9999;
            }
            
            #dlgbox{
                /*initially dialog box is hidden*/
                display: none;
                position: fixed;
                width: 30%;
                z-index: 9999;
                border-radius: 10px;
                background-color: #7c7d7e;
            }
            
            #dlg-header{
                background-color: #6d84b4;
                color: white;
                font-size: 20px;
                padding: 10px;
                margin: 10px 10px 0px 10px;
            }
            
            #dlg-body{
                background-color: white;
                color: black;
                font-size: 14px;
                padding: 10px;
                margin: 0px 10px 0px 10px;
            }
            
            #dlg-footer{
                background-color: #f2f2f2;
                text-align: right;
                padding: 10px;
                margin: 0px 10px 10px 10px;
            }
            
            #dlg-footer button{
                background-color: #6d84b4;
                color: white;
                padding: 5px;
                border: 0px;
            }
            #white-background2{
                display: none;
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                background-color: #fefefe;
                opacity: 0.7;
                z-index: 9999;
            }
            
            #dlgbox2{
                /*initially dialog box is hidden*/
                display: none;
                position: fixed;
                width: 28%;
                z-index: 9999;
                border-radius: 10px;
                background-color: #7c7d7e;
            }
            
            #dlg-header2{
                background-color: #6d84b4;
                color: white;
                font-size: 20px;
                padding: 10px;
                margin: 10px 10px 0px 10px;
            }
            
            #dlg-body2{
                background-color: white;
                color: black;
                font-size: 14px;
                padding: 10px;
                margin: 0px 10px 0px 10px;
            }
            
            #dlg-footer2{
                background-color: #f2f2f2;
                text-align: right;
                padding: 10px;
                margin: 0px 10px 10px 10px;
            }
            
            #dlg-footer2 button{
                background-color: #6d84b4;
                color: white;
                padding: 5px;
                border: 0px;
            }
            #white-background3{
                display: none;
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                background-color: #fefefe;
                opacity: 0.7;
                z-index: 9999;
            }
            
            #dlgbox3{
                /*initially dialog box is hidden*/
                display: none;
                position: fixed;
                width: 30%;
                z-index: 9999;
                border-radius: 10px;
                background-color: #7c7d7e;
            }
            
            #dlg-header3{
                background-color: #6d84b4;
                color: white;
                font-size: 20px;
                padding: 10px;
                margin: 10px 10px 0px 10px;
            }
            
            #dlg-body3{
                background-color: white;
                color: black;
                font-size: 14px;
                padding: 10px;
                margin: 0px 10px 0px 10px;
            }
            
            #dlg-footer3{
                background-color: #f2f2f2;
                text-align: right;
                padding: 10px;
                margin: 0px 10px 10px 10px;
            }
            
            #dlg-footer3 button{
                background-color: #6d84b4;
                color: white;
                padding: 5px;
                border: 0px;
            }
            #white-background4{
                display: none;
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                background-color: #fefefe;
                opacity: 0.7;
                z-index: 9999;
            }
            
            #dlgbox4{
                /*initially dialog box is hidden*/
                display: none;
                position: fixed;
                width: 28%;
                z-index: 9999;
                border-radius: 10px;
                background-color: #7c7d7e;
            }
            
            #dlg-header4{
                background-color: #6d84b4;
                color: white;
                font-size: 20px;
                padding: 10px;
                margin: 10px 10px 0px 10px;
            }
            
            #dlg-body4{
                background-color: white;
                color: black;
                font-size: 14px;
                padding: 10px;
                margin: 0px 10px 0px 10px;
            }
            
            #dlg-footer4{
                background-color: #f2f2f2;
                text-align: right;
                padding: 10px;
                margin: 0px 10px 10px 10px;
            }
            
            #dlg-footer4 button{
                background-color: #6d84b4;
                color: white;
                padding: 5px;
                border: 0px;
            }
            #white-background5{
                display: none;
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                background-color: #fefefe;
                opacity: 0.7;
                z-index: 9999;
            }
            
            #dlgbox5{
                /*initially dialog box is hidden*/
                display: none;
                position: fixed;
               width: 28%;
                z-index: 9999;
                border-radius: 10px;
                background-color: #7c7d7e;
            }
            
            #dlg-header5{
                background-color: #6d84b4;
                color: white;
                font-size: 20px;
                padding: 10px;
                margin: 10px 10px 0px 10px;
            }
            
            #dlg-body5{
                background-color: white;
                color: black;
                font-size: 14px;
                padding: 10px;
                margin: 0px 10px 0px 10px;
            }
            
            #dlg-footer5{
                background-color: #f2f2f2;
                text-align: right;
                padding: 10px;
                margin: 0px 10px 10px 10px;
            }
            
            #dlg-footer5 button{
                background-color: #6d84b4;
                color: white;
                padding: 5px;
                border: 0px;
            }
             #white-background6{
                display: none;
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                background-color: #fefefe;
                opacity: 0.7;
                z-index: 9999;
            }
             #dlgbox6{
                /*initially dialog box is hidden*/
                display: none;
                position: fixed;
          width: 28%;
                z-index: 9999;
                border-radius: 10px;
                background-color: #7c7d7e;
            }
            
            #dlg-header6{
                background-color: #6d84b4;
                color: white;
                font-size: 20px;
                padding: 10px;
                margin: 10px 10px 0px 10px;
            }
            
            #dlg-body6{
                background-color: white;
                color: black;
                font-size: 14px;
                padding: 10px;
                margin: 0px 10px 0px 10px;
            }
            
            #dlg-footer6{
                background-color: #f2f2f2;
                text-align: right;
                padding: 10px;
                margin: 0px 10px 10px 10px;
            }
            
            #dlg-footer6 button{
                background-color: #6d84b4;
                color: white;
                padding: 5px;
                border: 0px;
            }
             #white-background7{
                display: none;
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                background-color: #fefefe;
                opacity: 0.7;
                z-index: 9999;
            }
             #dlgbox7{
                /*initially dialog box is hidden*/
                display: none;
                position: fixed;
                width: 28%;
                z-index: 9999;
                border-radius: 10px;
                background-color: #7c7d7e;
            }
            
            #dlg-header7{
                background-color: #6d84b4;
                color: white;
                font-size: 20px;
                padding: 10px;
                margin: 10px 10px 0px 10px;
            }
            
            #dlg-body7{
                background-color: white;
                color: black;
                font-size: 14px;
                padding: 10px;
                margin: 0px 10px 0px 10px;
            }
            
            #dlg-footer7{
                background-color: #f2f2f2;
                text-align: right;
                padding: 10px;
                margin: 0px 10px 10px 10px;
            }
            
            #dlg-footer7 button{
                background-color: #6d84b4;
                color: white;
                padding: 5px;
                border: 0px;
            }
             
.top{
	width:100%;
	background-color:brown !important;
	border-bottom:2px solid #f0f0f0;
}
.top div{
	width:1200px;
	color:#fff;
	background-color:brown !important;
	font-family:calibri;
	padding:10px;
	text-align:right;
}



input[type="text"]{
	padding:12px;
	width:150px;
	height:20px;
}
select{
	padding:12px;
	width:250px;
}
textarea{
	padding:50px;
	width:550px;
}
.button{
	width:190px;
	padding:13px;
	color:#fff;
	font-size:12px;
	background-color:black;
	opacity:.8;
}
.button:hover{
    background-color: blue;

}
button{
    padding:13px;
    color:#000;
    font-size:12px;
    background-color:white;
    opacity:.8;
}
button:hover{
    background-color: blue;
    color: white;

}
	body{
 	 background-image:url("web1.jpg");
       background-size: cover;
    background-attachment: fixed;
 	}
/* Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>
</head>

<body > 
	<div class="top">
		
        <div>
       <div><img src="satya.png" width="50" height="70"></div>
      <marquee direction = "">सत्यमेव जयते! Truth alone triumphs</marquee></div>
		</div>
       

<div class="nav" >
	<br>
	<br>
<button class="button" onclick="showDialog()">Add Police</button>
<br>
<button class="button" onclick="showDialog2()">Add Crime</button>
<br>
<button class="button" onclick="showDialog3()">Add Criminal</button>
<br>
<button class="button" onclick="showDialog4()">Add Court</button>
<br>
<button class="button" onclick="showDialog5()">Add Prison</button>
<br>
<button class="button" onclick="showDialog6()">Add Category</button>
<br>
<button class="button" onclick="showDialog7()">Add Court Type</button>
<br/>
<br>
<button class="button" onclick="window.location.href='policereport.php'">Police Report</button>
<br>
<button class="button" onclick="window.location.href='crimereport.php'">Crime Report</button>
<br>
<button class="button" onclick="window.location.href='criminalreport.php'">Criminal Report</button>
<br>
<button class="button" onclick="window.location.href='courtreport.php'">Court Report</button>
<br>
<button class="button" onclick="window.location.href='prisonreport.php'">Prison Report</button>
<br>
<button class="button" onclick="window.location.href='categoryreport.php'">Category Report</button>
<br/>
<button class="button" onclick="window.location.href='courttypereport.php'">Court Type Report</button>
<br>
<button class="button" onclick="window.location.href='passreset.php'">Change Password</button>
<br>
<button class="button" onclick="window.location.href='logout.php'">Logout</button>
<br>
</div>
  <!-- dialog box -->
        <div id="white-background">
        </div>
        <div id="dlgbox">
            <div id="dlg-header">Add Police</div>
            <div id="dlg-body">
                 <form method="post" action=" ">
                <table><tr><td>
				<label>Name:</label>
                <input type="text" id="pname" name="pname" required=""></input>
                </td>
                <td>
                <label>User Name:</label>
                <input type="text" id="username" name="username" required=""></input>
                </td></tr>
                <tr><td>
                <label>Password:</label>
                <input type="password" id="password" name="password" required=""></input>
                </td>
                <td>
                <label>Confir Password:</label>
                <input type="password" id="confpassword" name="confpassword" required=""></input>
                </td></tr>
                <tr><td>
                <label>Mobile:</label>
                <input type="number" id="mobile" name="mobile" required=""></input>
                </td>
                <td>
                <label>Email:</label>
                <input type="email" id="email" name="email" required=""></input>
                </td></tr>
                <tr><td>
                <label>DOB:</label>
                <input type="date" id="dob" name="dob" required=""></input>
                </td>
                <td>
                <label>Address:<label>
                <input type="text" id="address" name="address" required=""></input>
                </td></tr>
                <tr><td>
                <label>City:<label>
                <input type="text" id="city" name="city" required=""></input>
                </td>
                <td>
                <label>State:</label>
                <input type="text" id="state" name="state" required=""></input>
                </td></tr>
                <tr><td>
                <label>Country:</label>
                <input type="text" id="country" name="country" required=""></input>
                </td></tr>
                <tr><td>
                <button >Add</button>
                </td></tr></table>
            </form>
			</div>
            <div id="dlg-footer">
                
                <button onclick="dlgBtn()">Exit</button>
            </div>
            </div>
         <div id="white-background2">
        </div>
        <div id="dlgbox2">
            <div id="dlg-header2">Add Crime</div>
            <div id="dlg-body2">
                 <form method="post" action="">
                 <table>
                 <tr><td><label>Crime Id</label>
                <input type="text" id="crimeid" name="crimeid" required=""></input></td></tr>

                <tr><td>
                <div class="dropdown">
                <label for="criminals">Choose crimminal:</label>
                <select name="criminals" id="criminals">
                <?php
                    $qu="SELECT criminalname From criminal";
                    $records = mysqli_query($conn, $qu);  // Use select query here 
                    while($row = mysqli_fetch_array($records))
                    {
                        $criminal_name = $row['criminalname'];
			            echo " <option value = '$criminal_name'> $criminal_name</option> ";
                    }	
                ?> 
                
                
                <tr><td>
                <div class="dropdown">
                <label for="category">Choose Category:</label>
                <select name="category" id="category">
                <?php
                    $qu="SELECT categoryname FROM category";
                    $records = mysqli_query($conn,$qu);
                    while($row = mysqli_fetch_array($records))
                    {
                        $category_name = $row['categoryname'];
                        echo "<option value = '$category_name'> $category_name</option>";
                    }
                ?>

                <tr><td>
                <div class="dropdown">
                <label for="prison">Choose Prison:</label>
                <select name="prison" id="prison">
                <?php
                    $qu="SELECT prisonname FROM prison";
                    $records = mysqli_query($conn,$qu);
                    while($row = mysqli_fetch_array($records))
                    {
                        $prison_name = $row['prisonname'];
                        echo "<option value = '$prison_name'> $prison_name</option>";
                    }
                ?>
                
                <tr><td>
                
                <div class="dropdown">
                <label for="court">Choose Court:</label>
                <select name="court" id="court">
                <?php
                    $qu="SELECT courtname FROM court";
                    $records = mysqli_query($conn,$qu);
                    while($row = mysqli_fetch_array($records))
                    {
                        $court_name = $row['courtname'];
                        echo "<option value = '$court_name'> $court_name</option>";
                    }
                ?>
                
                <tr><td><label>Date and Time</label>
                <input type="date" id="date" name="date"></input></td></tr>
                <tr><td><label>Place</label>
                <input type="text" id="place" name="place"></input></td></tr>
                <tr><td><label>Description</label>
                <input type="text" id="desc" name="desc"></input></td></tr>
                <tr><td>
                <button>Add</button>
                </td></tr></table>
            </form>
			</div>
            <div id="dlg-footer2">
                
                <button onclick="dlgBtn2()">Exit</button>
            </div>
        </div>
          <div id="white-background3">
        </div>
        <div id="dlgbox3">
            <div id="dlg-header3">Add Criminal</div>
            <div id="dlg-body3">
                 <form method="post" action=" ">
                 <table>
                 <tr><td>
                 <label>Criminal Id:</label>
                 <input type="text" id="criminalid" name="criminalid"></input>
                 </td>
                 <td>
				<label>Criminal Name:</label>
                <input type="text" id="cname" name="cname"></input>
                </td></tr>
                <tr><td>
                <label>Alias</label>
                <input type="text" id="alias" name="alias"></input>
                </td>
                <td>
                <label>Mobile</label>
                <input type="text" id="cmob" name="cmob"></input>
                </td></tr>
                <tr><td>
                <label>Email</label>
                <input type="email" id="cemail" name="cemail"></input>
                </td>
                <td>
                <label>Gender</label>
                <input type="text" id="cgender" name="cgender" required></input>
                </td>
                <tr><td>
                <label>Height</label>
                <input type="number" id="cheight" name="cheight"></input>
                </td>
                <td>
                <label>Weight</label>
                <input type="number" id="cweight" name="cweight"></input>
                </td>
                <tr><td>
                <label>Date Of Birth</label>
                <input type="Date" id="cdob" name="cdob"></input>
                </td>
                <td>
                <label>Nationality</label>
                <input type="text" id="cnationality" name="cnationality"></input>
                </td></tr>
                <tr><td>
                <label>Race</label>
                <input type="text" id="crace" name="crace"></input>
                </td>
                <td>
                <label>City</label>
                <input type="text" id="ccity" name="ccity"></input>
                </td></tr>
                <tr><td>
                <label>State</label>
                <input type="text" id="cstate" name="cstate"></input>
                </td>
                <td>
                <label>Country</label>
                <input type="text" id="ccountry" name="ccountry"></input>
                </td></tr>
                <tr><td>
                 <button>Add</button></td></tr></table>
                 </td></tr>
             </form>
			</div>
            <div id="dlg-footer3">
               
                <button onclick="dlgBtn3()">Exit</button>
            </div>
        </div>
          <div id="white-background4">
        </div>
        <div id="dlgbox4">
            <div id="dlg-header4">Add Court</div>
            <div id="dlg-body4">
                 <form method="post" action=" ">
                 <label>Court Id</label>
                <input type="text" id="court_id" name="court_id" required></input><br/>
				
                <div class="dropdown">
                <label for="court">Choose Court Type:</label>
                <select name="court" id="court">
                <?php
                    $qu="SELECT typename FROM courttype";
                    $records = mysqli_query($conn,$qu);
                    while($row = mysqli_fetch_array($records))
                    {
                        $type_name = $row['typename'];
                        echo "<option value = '$type_name'> $type_name</option>";
                    }
                ?></select>
                </div>

                <label>Court Name</label>
                <input type="text" id="courtname" name="courtname" required></input><br/>
                <label>Place</label>
                <input type="text" id="courtplace" name="courtplace" required></input><br/>
                <button >Add</button>
              </form>
			</div>
            <div id="dlg-footer4">
              
                <button onclick="dlgBtn4()">Exit</button>
            </div>
        </div>
          <div id="white-background5">
        </div>
        <div id="dlgbox5">
            <div id="dlg-header5">Add Prison</div>
            <div id="dlg-body5">
                <form method="post" action=" ">
                    <label>Prison Id:</label>
                    <input type="text" id="prison_id" name="prison_id" required></input><br>
				    <label>Prison Name:</label>
                    <input type="text" id="prisonname" name="prisonname" required></input><br>
                    <label>Description</label>
                    <input type="text" id="prisondesc" name="prisondesc"></input><br>
				    <br>
                    <button>Set</button>
                </form>
			</div>
            <div id="dlg-footer5">
              
                <button onclick="dlgBtn5()">Exit</button>
            </div>
        </div>

        </div>
          <div id="white-background6">
        </div>
        <div id="dlgbox6">
            <div id="dlg-header6">Add Category</div>
            <div id="dlg-body6">
                <form method="post" action=" ">
                <label>Category Id:</label>
                    <input type="text" id="categoryid" name="categoryid" required></input><br>
				    <label>Category Name:</label>
                    <input type="text" id="categoryname" name="categoryprisonname" required></input><br>
                    <label>Description</label>
                    <input type="text" id="categorydesc" name="categorydesc"></input><br>
				    <br>
                    <button>Set</button>
                </form>
			</div>
            <div id="dlg-footer6">
              
                <button onclick="dlgBtn6()">Exit</button>
            </div>
        </div>

        </div>
          <div id="white-background7">
        </div>
        <div id="dlgbox7">
            <div id="dlg-header7">Add Court Type</div>
            <div id="dlg-body7">
                <form method="post" action=" ">
                    <label>Court Type Id:</label>
                    <input type="text" id="ctypeid" name="ctypeid" required></input><br>
				    <label>Type Name:</label>
                    <input type="text" id="ctypename" name="ctypename" required></input><br>
                    <label>Description</label>
                    <input type="text" id="courtdesc" name="courtdesc"></input><br>
				    <br>
                    <button>Set</button>
                </form>
			</div>
            <div id="dlg-footer7">
              
                <button onclick="dlgBtn7()">Exit</button>
            </div>
        </div>
        <?php
$hostname = "localhost";
$username = "root";
$password = "Admin001";
require "dbconfig.php";
 $connect=mysqli_connect($host,$user,$pass,$db) or die("we couldn't connect");

// mysql select query
$query11 = "SELECT * FROM criminal";
$result11 = mysqli_query($connect, $query11);
$query12= "SELECT * FROM criminal";
$result12 = mysqli_query($connect, $query12);
$query13 = "SELECT * FROM criminal";
$result13 = mysqli_query($connect, $query13);
$query14 = "SELECT * FROM dataentry4";
$result14 = mysqli_query($connect, $query14);
?>
         
	</body>
    <?php $connect->close();?>
        <script>
            function dlgBtn(){
                var whitebg = document.getElementById("white-background");
                var dlg = document.getElementById("dlgbox");
                whitebg.style.display = "none";
                dlg.style.display = "none";
				}
             function dlgBtn2(){
                var whitebg = document.getElementById("white-background2");
                var dlg = document.getElementById("dlgbox2");
                whitebg.style.display = "none";
                dlg.style.display = "none";
				
            }
             function dlgBtn3(){
                var whitebg = document.getElementById("white-background3");
                var dlg = document.getElementById("dlgbox3");
                whitebg.style.display = "none";
                dlg.style.display = "none";
				
            }
             function dlgBtn4(){
                var whitebg = document.getElementById("white-background4");
                var dlg = document.getElementById("dlgbox4");
                whitebg.style.display = "none";
                dlg.style.display = "none";
            }
            function dlgBtn5(){
                var whitebg = document.getElementById("white-background5");
                var dlg = document.getElementById("dlgbox5");
                whitebg.style.display = "none";
                dlg.style.display = "none";
				
            }
             function dlgBtn6(){
                var whitebg = document.getElementById("white-background6");
                var dlg = document.getElementById("dlgbox6");
                whitebg.style.display = "none";
                dlg.style.display = "none";
                
            }
             function dlgBtn7(){
                var whitebg = document.getElementById("white-background7");
                var dlg = document.getElementById("dlgbox7");
                whitebg.style.display = "none";
                dlg.style.display = "none";
                
            }
            
            

            
            function showDialog(){
                var whitebg = document.getElementById("white-background");
                var dlg = document.getElementById("dlgbox");
                whitebg.style.display = "block";
                dlg.style.display = "block";
                
                var winWidth = window.innerWidth;
                var winHeight = window.innerHeight;
                
                dlg.style.left = (winWidth/2) - 480/2 + "px";
                dlg.style.top = "150px";
            }
             function showDialog2(){
                var whitebg = document.getElementById("white-background2");
                var dlg = document.getElementById("dlgbox2");
                whitebg.style.display = "block";
                dlg.style.display = "block";
                
                var winWidth = window.innerWidth;
                var winHeight = window.innerHeight;
                
                dlg.style.left = (winWidth/2) - 480/2 + "px";
                dlg.style.top = "50px";
            }
             function showDialog3(){
                var whitebg = document.getElementById("white-background3");
                var dlg = document.getElementById("dlgbox3");
                whitebg.style.display = "block";
                dlg.style.display = "block";
                
                var winWidth = window.innerWidth;
                var winHeight = window.innerHeight;
                
                dlg.style.left = (winWidth/2) - 480/2 + "px";
                dlg.style.top = "50px";
            }
             function showDialog4(){
                var whitebg = document.getElementById("white-background4");
                var dlg = document.getElementById("dlgbox4");
                whitebg.style.display = "block";
                dlg.style.display = "block";
                
                var winWidth = window.innerWidth;
                var winHeight = window.innerHeight;
                
                dlg.style.left = (winWidth/2) - 480/2 + "px";
                dlg.style.top = "150px";
            }
             function showDialog5(){
                var whitebg = document.getElementById("white-background5");
                var dlg = document.getElementById("dlgbox5");
                whitebg.style.display = "block";
                dlg.style.display = "block";
                
                var winWidth = window.innerWidth;
                var winHeight = window.innerHeight;
                
                dlg.style.left = (winWidth/2) - 480/2 + "px";
                dlg.style.top = "150px";
            }
             function showDialog6(){
                var whitebg = document.getElementById("white-background6");
                var dlg = document.getElementById("dlgbox6");
                whitebg.style.display = "block";
                dlg.style.display = "block";
                
                var winWidth = window.innerWidth;
                var winHeight = window.innerHeight;
                
                dlg.style.left = (winWidth/2) - 480/2 + "px";
                dlg.style.top = "150px";
            }
             function showDialog7(){
                var whitebg = document.getElementById("white-background7");
                var dlg = document.getElementById("dlgbox7");
                whitebg.style.display = "block";
                dlg.style.display = "block";
                
                var winWidth = window.innerWidth;
                var winHeight = window.innerHeight;
                
                dlg.style.left = (winWidth/2) - 480/2 + "px";
                dlg.style.top = "150px";
            }
             
        </script>
 
</html>
 
