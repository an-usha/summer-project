<html>
</body>
<?php
    // include("newapp.php");
	include("dbconnect.php");
	if(isset($_POST['submit']))
	{
		$name=$_POST['fname'];
		$phone=$_POST['num'];
		$date=$_POST['date'];
		$docname=$_POST['docname'];
		$query="INSERT INTO `new_appoint`(`Name`, `Phone`, `Date`,`d_id`) VALUES('$name','$phone','$date','$docname')";
	    $result=mysqli_query($con,$query) or die(mysqli_error($con));
        if($result)
		{     
    echo '<script src="../js/jquery-3.4.1.min.js"></script>';
	echo '<script src="../js/sweetalert2.all.min.js"></script>';
	echo '<script>
        Swal.fire({
            type:"success",
            title:"Inserted Succesfully.",
			confirmButtonColor: "#d33"

        }).then(function(){
			window.location="appointment.php";
		});
        </script>';
}
		else{
			die(mysqli_error($con));
        	echo '<script type ="text/JavaScript">';  
			echo 'alert("Error!! Not Inserted")';
			echo '</script>';
			echo "<script> location.href='appointment.php'; </script>";
		}
	}
?>
</body>
</html>