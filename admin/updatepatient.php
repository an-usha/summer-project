<?php
    include 'dbconnect.php';
        if (isset($_POST['update']))
        {
            $id= $_POST["id"];
            $name=$_POST['fname'];
            $address=$_POST['address'];
            $gender=$_POST['gender'];
	        $phone=$_POST['num'];
            $birthdate=$_POST['dob'];
            $weight=$_POST['weight'];
            $blood=$_POST['bg'];
            echo".";

            $q= "UPDATE `reg_patient` SET 
            `Name`='$name',
            `Address`='$address',
            `Gender`='$gender',
            `Phone`='$phone',
            `Birthdate`='$birthdate',
            `Weight`='$weight',
            `Blood`='$blood' 
            WHERE `reg_patient`.`ID` = '$id'; ";
            $result = mysqli_query($con,$q) or die(mysqli_error($con)); 
            if ($result)            
            {
                echo '<script src="../js/jquery-3.4.1.min.js"></script>';
                echo '<script src="../js/sweetalert2.all.min.js"></script>';
                echo '<script> Swal.fire({
				type:"success",
				title:"Updated Succesfully.",
				confirmButtonColor: "#d33"
	
			}).then(function(){
				window.location="allpatient.php";
			});
			</script>';
            }
            else{
                die(mysqli_error($con));
                echo '<script type ="text/JavaScript">';  
		        echo 'alert("Not Updated")';
		        echo '</script>';
		        echo "<script> location.href='allpatient.php'; </script>";
            }
        }

?>