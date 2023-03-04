<?php
    //include("newapp.php");
	include("dbconnect.php");
	$name=$_POST['fname'];
	$note=$_POST['note'];
	echo '.';
	$all="SELECT * FROM `new_test`";
	$r=mysqli_query($con,$all) or die(mysqli_error($con));
	while($roww=mysqli_fetch_array($r))
	{
		// $n=$roww['name'];
		$tname=$roww['Test_name'];
		if($tname==$name)
		{
			echo '<script src="../js/jquery-3.4.1.min.js"></script>';
			echo '<script src="../js/sweetalert2.all.min.js"></script>';
			echo '<script>
        
			Swal.fire({
            type:"success",
            title:"Already Exist.",
			confirmButtonColor: "#d33"
		}).then(function(){
			window.location="test.php";
		});
        </script>';
		die(mysqli_error($con));

		}

	else{
		$query="INSERT INTO `new_test`(`Test_name`, `Note`) VALUES('$name','$note')";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
    if($result)
	{
        echo '<script src="../Java/jquery-3.4.1.min.js"></script>';
		echo '<script src="../Java/sweetalert2.all.min.js"></script>';
		echo '<script>
			Swal.fire({
				type:"success",
				title:"Inserted Succesfully.",
				confirmButtonColor: "#d33"
	
			}).then(function(){
				window.location="test.php";
			});
			</script>';
	}
}
}
?>



