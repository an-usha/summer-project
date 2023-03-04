<?php
include 'dbconnect.php';

if(isset($_POST['add']))
	{
	    $date=$_POST['p_date'];
        $id=$_POST['name'];
	    $d_id=$_POST['docname'];
        $t_id=$_POST['testname'];
	    $m_id=$_POST['medname'];
        if ($m_id=='' && $t_id==''){
            echo '<script type ="text/JavaScript">';  
		    echo 'alert("Empty field is not accepted. Please fill medicine or test field.")';
		    echo '</script>';
            echo "<script> location.href='newpres.php'; </script>";

        }
        if($m_id!=''){
            $query="INSERT INTO `pre_med`(`ID`, `d_id`, `date`,`m_id`) VALUES('$id','$d_id','$date','$m_id')";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
        }
        if($t_id!='')
        {
            $query="INSERT INTO `pre_test`(`ID`, `d_id`, `date`,`t_id`) VALUES('$id','$d_id','$date','$t_id')";
            $result=mysqli_query($con,$query) or die(mysqli_error($con));
        }
        if($result || $result1)
        {
            echo '<script type ="text/JavaScript">';  
		    echo 'alert("Data Inserted")';
		    echo '</script>';
            echo "<script> location.href='prescription.php'; </script>";
        }
        else{
            die(mysqli_error($con));
            echo '<script type ="text/JavaScript">';  
		    echo 'alert("Error!! Not Inserted")';
		    echo '</script>';
		    echo "<script> location.href='prescription.php'; </script>";
        }
    }
?>