<?php
    include 'dbconnect.php';
        $id= $_POST["id"];
        if (isset($_POST['update']))
        {
            $m_name=$_POST['fname'];
            $med_type=$_POST['med_type'];
	        $mg=$_POST['mg'];
            $note=$_POST['note'];
            echo'.';
            $q= "UPDATE `new_med` SET 
            `M_name`='$m_name',
            `Med_type`='$med_type',
            `Mg`='$mg',
            `Note`='$note'
            WHERE `new_med`.`m_id` = '$id'; ";
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
				window.location="med.php";
			});
			</script>';
            }
        }

?>