<!DOCTYPE html>
<html>
<style>
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
<a href="home.html">
  <img src="student.png" alt="Student" style="width:42px;height:42px;border:0">
</a>


<div>
<center><h3>Admin Login</h3></center>
  <form method="post">
    <input type="text" id="username" name="username" placeholder="Enter Username"><br>

    <input type="password" id="pass" name="pass" placeholder="Enter Password"><br>

	<input type="text" id="scid" name="scid" placeholder="Enter School code"><br>
    
    <input type="submit" value="Sign in">
  </form>
  <a href="signup.php"><button type="submit" value="signup">Sign up</button></a><br>
</div>
</body>
</html>
<?php
if($_POST)
{
	$mysqli = new mysqli();	
	$mysqli->connect("localhost", "root", "", "sample");
	$uname=$_POST['username'];
	$pass=$_POST['pass'];
	$scid=$_POST['scid'];
	$sql = "SELECT * FROM admin where username='$uname' and password='$pass' and schoolcode='$scid'";
	$result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($result);
	if($row['username'] == $uname and $row['schoolcode']==$scid )
	{
	if (!$result)
	{
		die('Invalid query: ' . mysqli_error());
	}
	else
	{
		session_start();
		$_SESSION['login_user'] = $uname;
		$_SESSION['scid']=$scid;
		if($row['username'] == 'admin' and $row['schoolcode']==1001)
		    header('location:adminhome.php');
		else
			header('location:schadmin.php');
	}
	}
	else
		echo "Enter the details correctly";
}
?>