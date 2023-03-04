<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/viewprofile.css" />
	
</head>
<body>

<?php 
    include "Home.php";
    include("dbconnect.php");
	$id=$_GET['id'];
	$q="SELECT * from reg_patient where id=$id";
	
	$result=mysqli_query($con,$q) or die(mysqli_error($con));
    while ($row=mysqli_fetch_array($result)) {?>
    <div class="left">
		<h3>Patient's Detail</h3>
		<label>Name :</label> <?php  echo $row['Name'];  ?><br>
		<label>Address :</label> <?php echo $row['Address'] ;  ?><br>
		<label>Contact :</label><?php echo $row['Phone'] ;  ?><br>
		<label>Gender :</label><?php echo $row['Gender'] ;  ?><br>
		<label>Birthdate :</label><?php echo $row['Birthdate'] ;  ?><br>
		<label>Blood Group :</label><?php echo $row['Blood'] ;  ?><br>
		<label>Email :</label><?php echo $row['Email'] ;  ?><br>
	</div>
    <div class="right">
		<h3>Prescription</h3>
		<table>
			<tr>
				<th>Doctor's Name</th>
				<th>Date</th>
				<th colspan=2>Medicine</th>
				<th>Test</th>
			</tr>
			<tr>
    		<?php
				$name=$row['Name'];
				$query =  "SELECT * FROM pre_med where patient like '%$name%'";
				$result1=mysqli_query($con,$query) or die(mysqli_error($con));
				if (mysqli_num_rows($result1)>0)
                    {
						while ($row=mysqli_fetch_array($result1))
						{ 
	    					echo "<td>".$row['doctor']."</td>";
	    					echo "<td>".$row['date']."</td>";
	    					echo "<td>".$row['med']."<td>";
							echo "<td>".$row['test']."<td>";
							echo "</tr>";
						}
					}
				else
				{
					echo "<td>No Record!!!</td>";
					echo "</tr>";
				}
				}
			?>
		</table>
	</div>
</body>
</html>