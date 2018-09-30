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
  <a href="upmarks.php">Upload Marks</a>
  <!--<a href="v">View Marks</a>-->
  <a href="viewsch.php">View school</a>
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
   $link = mysqli_connect("localhost", "root", "", "sample");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    echo "<br><br><center><h1> School List</h1>";
	$sql = "SELECT * FROM admin";
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0)
		{
			echo "<table border='1'>";
				echo "<tr>";
					echo "<th>Username</th>";
					echo "<th>School code</th>";
					echo "<th>School Name</th>";
					echo "<th>District</th>";
					echo "<th>E-mail</th>";
					echo "<th>Staff Incharge</th>";
				echo "</tr>";
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['schoolcode'] . "</td>";
					echo "<td>" . $row['schoolname'] . "</td>";
					echo "<td>" . $row['dist'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['incharge'] . "</td>";
					
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
mysqli_close($link);
?>
</body>
</html> 
