<!DOCTYPE html>
<html>
<style>body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
img {
    display: block;
    margin-left: auto;
    margin-right: 100;
}
input[type=text],[type=date], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit],button[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover,button[type=submit]:hover {
    background-color: #45a049;
}

.blur {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	width: 35%;
	margin-left: auto;
    margin-right: auto;
}
</style>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="schadmin.php">View Marks</a>
  <a href="upstudent.php">Upload student</a>  
  <a href="viewstud.php">View Student List</a>
  <a href="home.html">Logout</a>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">
	<img src="option.png" alt="Student" style="width:42px;height:42px;border:0">
  </span>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>  

<div class="blur">

<center><h3>Student Details</h3></center>
  <form  method="post">
    <input type="text" id="regno" name="regno" placeholder="Enter Register number"><br>
    <input type="text" id="name" name="name" placeholder="Enter Name"><br>
    <input type="date" id="dob" name="dob" placeholder="Enter Date of birth"><br>	
	<select id="gen" name="gen">
      <option value="Male">Male</option>
      <option value="Female">FEMALE</option>
	  <option value="Others">OTHERS</option>
    </select><br>
    	<input type="text" id="scid" name="scid" placeholder="Enter School code"><br>	
	<input type="text" id="scname" name="scname" placeholder="Enter School Name"><br>	
	<input type="text" id="dist" name="dist" placeholder="Enter School District"><br>	
	<select id="edu" name="edu">
      <option value="HSC">HSC</option>
      <option value="SSLC">SSLC</option>
    </select><br>
    <input type="submit" value="Submit">	
</form>
<?php
if($_POST)
{
	$regno=$_POST['regno'];
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$scid=$_POST['scid'];
	$scname=$_POST['scname'];
	$dist=$_POST['dist'];
	$edu=$_POST['edu'];
	$gen=$_POST['gen'];
	$mysqli = new mysqli("localhost", "root", "", "sample");
    if($edu == 'hsc' or $edu == 'HSC')
	{
		$sql = "INSERT INTO studreg(regno,name,dob,gender,schoolcode,schoolname,dist,edu) 
				VALUES('$regno','$name','$dob','$gen','$scid','$scname','$dist','$edu') ";
		if ($mysqli->query($sql) ==  true)
		{
		    header('location:upstudent.php');
		}
		else
		{
			echo "ERROR: Could not able to execute $sql. ".$mysqli->error;
		}    
	}
	else if($edu == 'sslc' or $edu == 'SSLC')
	{
		$sql = "INSERT INTO studsslc(regno,name,dob,gender,schoolcode,schoolname,dist,edu) 
				VALUES('$regno','$name','$dob','$gen','$scid','$scname','$dist','$edu') ";
		if ($mysqli->query($sql) ==  true)
		{
		    header('location:upstudent.php');
		}
		else
		{
			echo "ERROR: Could not able to execute $sql. ".$mysqli->error;
		}    
	}
}
?>
</div>
</body>
</html>
