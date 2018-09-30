<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
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
input[type=text],[type=password], select {
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
</head>
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
<?php
if($_POST)
{
	session_start();
	$uname=$_SESSION['login_user'];
	$scid=$_SESSION['scid'];
	
    $link = mysqli_connect("localhost", "root", "", "sample");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $std=$_POST['stand'];
	if($std=='hsc')
	{
		echo "<br><br><center><h1> Higher Secondary Certification Student List</h1>";
		$sql = "SELECT * FROM studreg where schoolcode=$scid";
		if($result = mysqli_query($link, $sql)){
			if(mysqli_num_rows($result) > 0)
			{
				echo "<table border='1'>";
					echo "<tr>";
						echo "<th>Register no</th>";
						echo "<th>Name</th>";
						echo "<th>Date Of Birth</th>";
						echo "<th>Gender</th>";
						echo "<th>School code</th>";
						echo "<th>School Name</th>";
						echo "<th>Standard</th>";
					echo "</tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
						echo "<td>" . $row['regno'] . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['dob'] . "</td>";
						echo "<td>" . $row['gender'] . "</td>";
						echo "<td>" . $row['schoolcode'] . "</td>";
						echo "<td>" . $row['schoolname'] . "</td>";
						echo "<td>" . $row['edu'] . "</td>";
					echo "</tr>";
				}
				echo "</table></center>";
				mysqli_free_result($result);
			} 
			else
			{
				echo "No records matching your query were found.";
			}
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	else if($std=='sslc')
	{
		echo "<br><br><center><h1>  Secondary School Leaving Certificate Results</h1>";
		$sql = "SELECT * FROM studsslc where schoolcode=$scid";
		if($result = mysqli_query($link, $sql)){
			if(mysqli_num_rows($result) > 0)
			{
				echo "<table border='1'>";
					echo "<tr>";
						echo "<th>Register no</th>";
						echo "<th>Name</th>";
						echo "<th>Date Of Birth</th>";
						echo "<th>Gender</th>";
						echo "<th>School code</th>";
						echo "<th>School Name</th>";
						echo "<th>Standard</th>";
					echo "</tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
						echo "<td>" . $row['regno'] . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['dob'] . "</td>";
						echo "<td>" . $row['gender'] . "</td>";
						echo "<td>" . $row['schoolcode'] . "</td>";
						echo "<td>" . $row['schoolname'] . "</td>";
						echo "<td>" . $row['edu'] . "</td>";
					echo "</tr>";
				}
				echo "</table></center>";
				mysqli_free_result($result);
		    } 
			else
			{
				echo "No records matching your query were found.";
			}
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}
	else echo"Enter the correct standard sslc or hsc";
	mysqli_close($link);
  }
?>
</body>
</html> 
