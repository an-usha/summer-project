<?php
	include("dbconnect.php");
    $id=$_GET['delid'];
        if ($id!==null);
        {
            $q="delete from new_appoint where app_id=$id";
            $result=mysqli_query($con,$q);
            if ($result)
            {
		        echo "<script> location.href='appointment.php'; </script>";
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