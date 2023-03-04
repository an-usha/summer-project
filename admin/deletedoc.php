<?php
	include ("dbconnect.php");
    $id=$_GET['id'];
        if ($id!==null);
        {
            $q="delete from add_doc where d_id=$id";
            $result=mysqli_query($con,$q);
            if ($result)
            {
		        echo "<script> location.href='doc.php'; </script>";
            }

            else
            {
                die(mysqli_error($con));
                echo '<script type ="text/JavaScript">';  
		        echo 'alert("Error!! Not Deleted")';
		        echo '</script>';
		        echo "<script> location.href='doc.php'; </script>";

            }
        }
        
        
?>