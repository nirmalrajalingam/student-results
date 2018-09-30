<!DOCTYPE html>
<html>
<style>
input[type=text],[type=password],[type=email], select {
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

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	width: 35%;
	margin-left: auto;
    margin-right: auto;
}
img {
    display: block;
    margin-left: auto;
    margin-right: 100;
}

</style>
<body bgcolor="#55555F">

<div>
<center><h3>Admin Registration</h3></center>
  <form  method="post">
    <input type="text" id="username" name="username" placeholder="Enter Username"><br>

    <input type="password" id="pass" name="pass" placeholder="Enter Password"><br>
	
	<input type="password" id="conpass" name="conpass" placeholder="Enter Confirm Password"><br>

	<input type="text" id="scid" name="scid" placeholder="Enter School code"><br>
	
	<input type="text" id="scname" name="scname" placeholder="Enter School Name"><br>
	
	<input type="text" id="dist" name="dist" placeholder="Enter School Place"><br>
	
	<input type="email" id="email" name="email" placeholder="Enter E - mail"><br>
    
    <input type="submit" value="Submit">
	
	
  </form>
<?php
if($_POST)
{
	$uname=$_POST['username'];
	$pass=$_POST['pass'];
	$conpass=$_POST['conpass'];
	$scid=$_POST['scid'];
	$scname=$_POST['scname'];
	$dist=$_POST['dist'];
	$email=$_POST['email'];
	$mysqli = new mysqli("localhost", "root", "", "sample");
    if($pass == $conpass)
	{
		$sql = "INSERT INTO admin(username,password,schoolcode,schoolname,dist,email) VALUES('$uname','$pass','$scid','$scname','$dist','$email') ";
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
