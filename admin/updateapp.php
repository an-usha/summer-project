<?php
    include 'dbconnect.php';
        $id= $_POST["id"];
        if (isset($_POST['update']))
        {
            $name=$_POST['fname'];
	        $phone=$_POST['num'];
            $date=$_POST['dateapp'];
            echo '.';

            $q= "UPDATE `new_appoint` SET 
            `Name`='$name',
            `Phone`='$phone',
            `Date`='$date'
            WHERE `new_appoint`.`app_id` = '$id'; ";
            $result = mysqli_query($con,$q) or die(mysqli_error($con)); 
            if ($result)            
            {
                echo '<script src="../Java/jquery-3.4.1.min.js"></script>';
                echo '<script src="../Java/sweetalert2.all.min.js"></script>';
                echo '<script>
			Swal.fire({
				type:"success",
				title:"Updated Succesfully.",
				confirmButtonColor: "#d33"
	
			}).then(function(){
				window.location="appointment.php";
			});
			</script>';
            }
            else{
                die(mysqli_error($con));
                echo '<script type ="text/JavaScript">';  
		        echo 'alert("Error!! Not Updated")';
		        echo '</script>';
		        echo "<script> location.href='appointment.php'; </script>";
            }
        }

?>