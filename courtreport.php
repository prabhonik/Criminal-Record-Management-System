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
<h2>Court Report</h2>
<table id="customers" width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Court Id</strong></th>
<th><strong>Court type</strong></th>
<th><strong>Court Name</strong></th>
<th><strong>Place</strong></th>
<th><strong>DELETE</strong></th>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from court ORDER BY court_id ASC";
$resul = mysqli_query($conn,$sel_query);
if(mysqli_num_rows($resul)>0){
while($row = mysqli_fetch_assoc($resul)) { ?>
<td align="center"><?php echo $row["court_id"]; ?></td>
<td align="center"><?php echo $row["courttype"]; ?></td>
<td align="center"><?php echo $row["courtname"]; ?></td>
<td align="center"><?php echo $row["courtplace"]; ?></td>
<td align="center">
	<a href="delete5.php?id=<?php echo $row["court_id"];?>">Delete</a>
</td>
</tr>
<?php $count++; }} ?>
</tbody>
</table>
</div>
</body>
</html>
