<?php
   include 'dbconfig.php';
   $scno=$_GET['id'];
   $sql="SELECT * FROM `crime` where `crime_id`=$scno';
   $res=mysqli_query($conn,$sql);
   if(mysqli_num_rows($res)>0){
   while($row = mysqli_fetch_assoc($res)){
  echo '<form action='update4.php' method='post'>

      <tr><td><label>Crime Id</label>
      <input type='text' id='crimeid' name='crimeid' required=''></input></td></tr>
      <tr><td><label>Criminal Name</label>
      <input type='text' id='crimname' name='crimname' required=''>hffh</input></td></tr>
      <tr><td><label>Select Category</label>
      <input type='text' id='' name='' required=''></input></td></tr>
      <tr><td><label>Select Prison</label>
      <input type='text' id='' name=''</input></td></tr>
      <tr><td><label>Select Court</label>
      <input type='text' id='' name=''></input></td></tr>
      <tr><td><label>Date and Time</label>
      <input type='date' id='date' name='date'></input></td></tr>
      <tr><td><label>Place</label>
      <input type='text' id='place' name='place'></input></td></tr>
      <tr><td><label>Description</label>
      <input type='text' id='desc' name='desc'></input></td></tr>
      <tr><td>
      <button>Add</button>
      </td></tr>



  </form>;
   }
}
?>