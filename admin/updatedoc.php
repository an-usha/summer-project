<?php
    include 'dbconnect.php';
        $id= $_POST["id"];
        if (isset($_POST['update']))
        {
            $name=$_POST['fname'];
	        $field=$_POST['field'];
            $phone=$_POST['phone'];
            $time1=$_POST['time1'];
            echo '.';

            $q= "UPDATE `add_doc` SET 
            `Name`='$name',
            `Field`='$field',
            `Phone`='$phone',
            `Time1`='$time1'
            WHERE `d_id` = '$id'; ";
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
				window.location="doc.php";
			});
			</script>';
            }
            else{
                die(mysqli_error($con));
                echo '<script type ="text/JavaScript">';  
                echo 'alert("Error!! Not Updated")';
                echo '</script>';
                echo "<script> location.href='doc.php'; </script>";
            }
        }

?>