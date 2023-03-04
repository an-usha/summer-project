<?php
    //include("newapp.php");
	include("dbconnect.php");
	$name=$_POST['fname'];
    $field=$_POST['field'];
	$num=$_POST['phone'];
	$time1=$_POST['time1'];
	echo '.';


	$query="INSERT INTO `add_doc`(`Name`, `Field`,`Phone`,`Time1`) VALUES('$name','$field','$num','$time1')";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
    if($result)
	{
		echo '<script src="js/jquery-3.4.1.min.js"></script>';
		echo '<script src="js/sweetalert2.all.min.js"></script>';
		echo '<script>
			Swal.fire({
				type:"success",
				title:"Inserted Succesfully.",
				confirmButtonColor: "#d33"
	
			}).then(function(){
				window.location="doc.php";
			});
			</script>';
	}
	else{
		die(mysqli_error($con));
        echo '<script type ="text/JavaScript">';  
		echo 'alert("Error!! Not Inserted")';
		echo '</script>';
		echo "<script> location.href='dashboard.php'; </script>";
	}
?>



