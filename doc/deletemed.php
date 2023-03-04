<?php
	include("dbconnect.php");
    $pm_id=$_GET['delid'];
    echo'.';
        if ($pm_id!==null);
        {
            $q="delete from pre_med where pres_med=$pm_id";
            $result=mysqli_query($con,$q);
            if ($result)
            {
		        echo "<script> location.href='prescription.php'</script>";
            }

            else
            {
                die(mysqli_error($con));
                echo '<script type ="text/JavaScript">';  
		        echo 'alert("Error!! Not Deleted")';
		        echo '</script>';
		        echo "<script> location.href='appointment.php'; </script>";

            }
        }
        
        
?>