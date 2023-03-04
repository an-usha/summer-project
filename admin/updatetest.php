<?php
    include 'dbconnect.php';
        $id= $_POST["id"];
        if (isset($_POST['update']))
        {
            $name=$_POST['fname'];
            $note=$_POST['note'];
            echo'.';

            $q= "UPDATE `new_test` SET 
            `Test_name`='$name',
            `Note`= '$note'
            WHERE `new_test`.`t_id` = '$id'; ";
            $result = mysqli_query($con,$q) or die(mysqli_error($con)); 
            if ($result)            
            {
                echo '<script src="../Java/jquery-3.4.1.min.js"></script>';
                echo '<script src="../Java/sweetalert2.all.min.js"></script>';
                echo '<script> Swal.fire({
				type:"success",
				title:"Updated Succesfully.",
				confirmButtonColor: "#d33"
	
			}).then(function(){
				window.location="test.php";
			});
			</script>';
            }
        }

?>