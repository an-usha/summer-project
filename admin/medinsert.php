<?php
    // include("newapp.php");
	include("dbconnect.php");
	$fname=$_POST['fname'];
	$med_type=$_POST['med_type'];
	// $qty=$_POST['qty'];
	// $price=$_POST['price'];
	$mg=$_POST['mg'];
    $note=$_POST['note'];
	echo '.';

	$all="SELECT * FROM `new_med`";
	$r=mysqli_query($con,$all) or die(mysqli_error($con));
	while($roww=mysqli_fetch_array($r))
	{
		// $n=$roww['name'];
		$mname=$roww['M_name'];
		$medmg=$roww['Mg'];
		if($mname==$fname && $medmg==$mg)
		{
			echo '<script src="../js/jquery-3.4.1.min.js"></script>';
			echo '<script src="../js/sweetalert2.all.min.js"></script>';
			echo '<script>
        
			Swal.fire({
            type:"success",
            title:"Already Exist.",
			confirmButtonColor: "#d33"
		}).then(function(){
			window.location="med.php";
		});
        </script>';
		die(mysqli_error($con));

		}

	else{
		$q= "INSERT INTO `new_med`(`M_name`,`Med_type`,`Mg`, `Note`) VALUES('$fname','$med_type','$mg','$note')";
			$result=mysqli_query($con,$q) or die(mysqli_error($con));
    
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
				window.location="med.php";
			});
			</script>';
	    }
    }
}
?>



