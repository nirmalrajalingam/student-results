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
  <a href="upmarks.php">Upload Marks</a>
  <!--<a href="v">View Marks</a>-->
  <a href="adminhome.php">View school</a>
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
    <input type="text" id="rnm" name="rnm" placeholder="Enter Register number"><br>
    <input type="text" id="tam" name="tam" placeholder="Enter Tamil mark"><br>
    <input type="text" id="eng" name="eng" placeholder="Enter English mark"><br>
    <input type="text" id="mat" name="mat" placeholder="Enter Maths mark"><br>	
	<input type="text" id="sci" name="sci" placeholder="Enter Science mark"><br>	
	<input type="text" id="ssc" name="ssc" placeholder="Enter Social Science mark"><br>	
	<input type="text" id="spr" name="spr" placeholder="Enter Science practical"><br>	
	<input type="submit" value="Submit">	
</form>
<?php
if($_POST)
{
	$rol=$_POST['rnm'];
	$tam=$_POST['tam'];
	$eng=$_POST['eng'];
	$mat=$_POST['mat'];
	$sci=$_POST['sci'];
	$ssc=$_POST['ssc'];
	$spr=$_POST['spr'];
	$tot=$tam+$eng+$mat+$sci+$ssc+$spr;
	$avg=$tot/5;
	$mysqli = new mysqli("localhost", "root", "", "sample");
    if($tam >= 35 and $eng >= 35 and $mat >= 35 and $sci >= 20 and $ssc >= 35 and $spr >= 15)
	{
		$sql="UPDATE studsslc SET subj1='$tam',subj2='$eng',subj3='$mat',subj4='$sci',subj5='$ssc',pra1='$spr',total='$tot',avg='$avg',result='PASS' WHERE regno='$rol'";
		if ($mysqli->query($sql) ==  true)
		{
			echo "updated";		   
		  // header('location:upmarkssslc.php');
		}
		else
		{
			echo "ERROR: Could not able to execute $sql. ".$mysqli->error;
		}    
	}
	else 
	{
		$sql="UPDATE studsslc SET subj1='$tam',subj2='$eng',subj3='$mat',subj4='$sci',subj5='$ssc',pra1='$spr',total='$tot',avg='$avg',result='FAIL' WHERE regno='$rol'";
		if ($mysqli->query($sql) ==  true)
		{
		    header('location:admin.php');
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
