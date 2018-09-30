<html>
<head>
<style>
table ,hr{
	width: 50%;
}
th, td  {
    padding: 5px;
	text-align: left;
}

</style>
</head>
<?php
if($_POST)
{
	
    $mysqli = new mysqli();
    $mysqli->connect("localhost", "root", "", "sample");
	$regno=$_POST['regno'];
	$dob=$_POST['dob'];
	$edu=$_POST['edu'];
	echo "<center><h2>Government Of Tamil Nadu </h2></center>";
	if($edu == 'hsc')
	{
		$sql = "SELECT * FROM studreg where regno='$regno' and dob='$dob'";
		if($result = mysqli_query($mysqli, $sql))
		{
			if(mysqli_num_rows($result) >=0)
			{
				echo "<center><table>";
				while($row = mysqli_fetch_array($result))
				{   
					echo "<center><h3>---HSC Examination Results---</h3></center>";
					echo "</table><hr><table>";
					echo "<tr><th>Register No</th><td>" . $row['regno'] . "</td>";
					echo "<th>Name</th><td>" . $row['name'] . "</td></tr>";
					echo "<tr><th>Group Code</th><td>" . $row['grpcode'] . "</td>";
					echo "<th>Date of Birth</th><td>" . $row['dob'] . "</td></tr>";
					echo "</table><hr><table>";
					echo "<tr><th> Subject Name</th><th> Practical </th><th> Theory </th><th>Total</th></tr>";
					echo "</table><hr><table>";
					echo "<tr><td> Tamil      </td><td>                </td><td>".$row['subj1']."</td><td>".$row['subj1']."</td></tr>";
					echo "<tr><td> English    </td><td>                </td><td>".$row['subj2']."</td><td>".$row['subj2']."</td></tr>";
					echo "<tr><td> Mathematics</td><td>                </td><td>".$row['subj3']."</td><td>".$row['subj3']."</td></tr>";
					$s =$row['subj4'];
					$p =$row['pra1'];
					$tot = $s+$p;
					echo "<tr><td> Physics    </td><td>".$row['pra1']."</td><td>".$row['subj4']."</td><td>".$tot."</td></tr>";
					$s =$row['subj5'];
					$p =$row['pra2'];
					$tot = $s+$p;
					echo "<tr><td> Chemistry  </td><td>".$row['pra2']."</td><td>".$row['subj5']."</td><td>".$tot."</td></tr>";
					if($row['grpcode'] == 102)
					{
						$s =$row['subj6'];
						$p =$row['pra3'];
						$tot = $s+$p;
						echo "<tr><td> Computer Science</td><td>".$row['pra3']."</td><td>".$row['subj6']."</td><td>".$tot."</td></tr>";					
					}
					else if($row['grpcode'] == 103)
					{
						$s =$row['subj6'];
						$p =$row['pra3'];
						$tot = $s+$p;
						echo "<tr><td> Biology</td><td>".$row['pra3']."</td><td>".$row['subj6']."</td><td>".$tot."</td></tr>";					
					}
					else if($row['grpcode'] == 104)
					{
						$s =$row['subj6'];
						$p =$row['pra3'];
						$tot = $s+$p;
						echo "<tr><td> Bio - Chemistry</td><td>".$row['pra3']."</td><td>".$row['subj6']."</td><td>".$tot."</td></tr>";					
					}
					echo "</table><hr><table>";
					echo "<tr><th> Total  </th><td>".$row['total']."</td><th> Average</th><td>".$row['avg']."</td></tr>";
					echo "<tr><th> Result </th><td>".$row['res'].  "</td><th>Cut-Off </th><td>".$row['cutoff']."</td></tr>";
					echo "</table><hr><table>";
				}
				echo "</table>";	
			}
			echo "---End of Statement---</center>";
			mysqli_free_result($result);
		}
	}
	if($edu == 'sslc')
	{
		$sqli = "SELECT * FROM studsslc where regno='$regno' and dob='$dob'";
		if($result = mysqli_query($mysqli, $sqli))
		{
			if(mysqli_num_rows($result) >=0)
			{
				echo "<center><table>";
				while($row = mysqli_fetch_array($result))
				{   
					echo "<center><h3>---SSLC Examination Results---</h3></center>";
					echo "</table><hr><table>";
					echo "<tr><th>Register No</th><td>" . $row['regno'] . "</td>";
					echo "<th>Name</th><td>" . $row['name'] . "</td></tr>";
					echo "</table><hr><table>";
					echo "<tr><th> Subject Name</th><th> Practical </th><th> Theory </th><th>Total</th></tr>";
					echo "</table><hr><table>";
					echo "<tr><td> Tamil         </td><td>                </td><td>".$row['subj1']."</td><td>".$row['subj1']."</td></tr>";
					echo "<tr><td> English       </td><td>                </td><td>".$row['subj2']."</td><td>".$row['subj2']."</td></tr>";
					echo "<tr><td> Mathematics   </td><td>                </td><td>".$row['subj3']."</td><td>".$row['subj3']."</td></tr>";
					$s =$row['subj4'];
					$p =$row['pra1'];
					$tot = $s+$p;
					echo "<tr><td> Science       </td><td>".$row['pra1']."</td><td>".$row['subj4']."</td><td>".$tot."</td></tr>";
					echo "<tr><td> Social Science</td><td>                </td><td>".$row['subj5']."</td><td>".$row['subj5']."</td></tr>";
					echo "</table><hr><table>";
					echo "<tr><th> Total  </th><td></td><td></td><td>".$row['total']."</td></tr>";
					echo "<tr><th> Average</th><td></td><td></td><td>".$row['avg'].  "</td></tr>";
					echo "<tr><th> Result </th><td></td><td></td><td>".$row['result'].  "</td></tr>";
					echo "</table><hr><table>";
				}
				echo "</table>";	
			}
			echo "---End of Statement---</center>";
			mysqli_free_result($result);
		}
	}
}
?>
</html>