<?php
    // include("registerform.php");
	include("dbconnect.php");
	$name=$_POST['fname'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$phone=$_POST['num'];
	$dob=$_POST['dob'];
	$weight=$_POST['weight'];
	$blood=$_POST['bg'];
	$created=$_POST['created'];
	echo '.';

	$all="SELECT * FROM `reg_patient`";
	$r=mysqli_query($con,$all) or die(mysqli_error($con));
	while($roww=mysqli_fetch_array($r))
	{
		// $n=$roww['name'];
		$p=$roww['Phone'];
		
	}
	if($phone==$p)
		{
			echo '<script src="../Jquery/jquery-3.4.1.min.js"></script>';
			echo '<script src="../Jquery/sweetalert2.all.min.js"></script>';
			echo '<script>
        
			Swal.fire({
            type:"success",
            title:"Already Exist.",
			confirmButtonColor: "#d33"
		}).then(function(){
			window.location="allpatient.php";
		});
        </script>';
		die(mysqli_error($con));

		}
	else{
		$query="INSERT INTO `reg_patient`(`Name`, `Address`, `Gender`, `Phone`, `Birthdate`, `Weight`, `Blood`,`Created`)  
		VALUES('$name','$address','$gender','$phone','$dob','$weight','$blood','$created')";
		$result=mysqli_query($con,$query) or die(mysqli_error($con));
	}
	
	
    if($result)
	{
		$num='';
		$sql="SELECT * FROM graph where Months LIKE'%$created%'";
		$res=mysqli_query($con,$sql) or die(mysqli_error($con));
		while ($row=mysqli_fetch_array($res)) 
        {
				$id=$row['id'];
				$num=$row['Patients']+1;
				$q="UPDATE `graph` SET 
				`Patients`='$num'
				WHERE `graph`.`id` = '$id'; ";
	            $q_r=mysqli_query($con,$q) or die(mysqli_error($con));

		}
	
    
		echo '<script src="../js/jquery-3.4.1.min.js"></script>';
		echo '<script src="../js/sweetalert2.all.min.js"></script>';
		echo '<script>
        Swal.fire({
            type:"success",
            title:"Inserted Succesfully.",
			confirmButtonColor: "#d33"

        }).then(function(){
			window.location="allpatient.php";
		});
        </script>';
	
	}
	
?>