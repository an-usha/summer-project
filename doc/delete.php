<?php
	include("dbconnect.php");
    $id=$_GET['delid'];
    echo'.';
        if ($id!==null);
        {
            $q="delete from pre_test where pres_test=$id";
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