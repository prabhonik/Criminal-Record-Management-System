<!DOCTYPE html>
<?php
session_start();
if($_SESSION['auth2']=="true")
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
 require "dbconfig.php";
 $conn=mysqli_connect($host,$user,$pass,$db) or die("we couldn't connect");
 ?>
<html>
<head>
  <style>
    #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 6px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: px;
  padding-bottom: 12px;
  text-align: left;
  background-color: green;
  color: white;
}
#abc{
  padding: 10px;
  font-size: 15px;
  height:40px;
  width:80px;
  color: white;
  background: green;
  border: none;
  border-radius: 5px;  
}
  </style>
<meta charset="utf-8">
<title>View Records</title>
</head>
<body>
	<div align="left">
		<button id="abc" style="width:60px;" onclick="window.location.href='index1.php'">Back</button>
</div>


<div class="form">
<h2>Police Records</h2>
<table id="customers" width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Police Name</strong></th>
<th><strong>username</strong></th>
<th><strong>mobile no.</strong></th>
<th><strong>email</strong></th>
<th><strong>dob</strong></th>
<th><strong>address</strong></th>
<th><strong>city</strong></th>
<th><strong>state</strong></th>
<th><strong>country</strong></th>
<th><strong>DELETE</strong></th>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from police ORDER BY username ASC";
$resul = mysqli_query($conn,$sel_query);
if(mysqli_num_rows($resul)>0){
while($row = mysqli_fetch_assoc($resul)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["policename"]; ?></td>
<td align="center"><?php echo $row["username"]; ?></td>
<td align="center"><?php echo $row["policeemobile"]; ?></td>
<td align="center"><?php echo $row["policeemail"]; ?></td>
<td align="center"><?php echo $row["policedob"]; ?></td>
<td align="center"><?php echo $row["policeaddress"]; ?></td>
<td align="center"><?php echo $row["policecity"]; ?></td>
<td align="center"><?php echo $row["policestate"]; ?></td>
<td align="center"><?php echo $row["policecountry"]; ?></td>
<td align="center">
	<a href="delete.php?id=<?php echo $row["username"];?>">Delete</a>
</td>
</tr>
<?php $count++; }} ?>
</tbody>
</table>
</div>
</body>
</html>
