<?php
include 'dbconnect.php';

if(isset($_POST['add']))
	{
	    $date=$_POST['p_date'];
        $id=$_POST['name'];
	    $d_id=$_POST['docname'];
        $t_id=$_POST['testname'];
	    $m_id=$_POST['medname'];
        $note=$_POST['note'];
        if ($m_id=='' && $t_id==''){
            echo '<script type ="text/JavaScript">';  
		    echo 'alert("Empty field is not accepted. Please fill medicine or test field.")';
		    echo '</script>';
            echo "<script> location.href='newpres.php'; </script>";

        }
        foreach($m_id as $m){
            if($m!=''){
                $query="INSERT INTO `pre_med`(`ID`, `d_id`, `date`,`m_id`,`note`) VALUES('$id','$d_id','$date','$m','$note')";
                $result=mysqli_query($con,$query) or die(mysqli_error($con));
            }
        }
        foreach($t_id as $t){
            if($t!=''){
                $query="INSERT INTO `pre_test`(`ID`, `d_id`, `date`,`t_id`) VALUES('$id','$d_id','$date','$t')";
                $result=mysqli_query($con,$query) or die(mysqli_error($con));
            }
        }
        if($result || $result1)
        {
            echo '<script src="../js/jquery-3.4.1.min.js"></script>';
            echo '<script src="../js/sweetalert2.all.min.js"></script>';
            echo '<script>
                Swal.fire({
                    type:"success",
                    title:"Inserted Succesfully.",
                    confirmButtonColor: "#d33"
        
                }).then(function(){
                    window.location="prescription.php";
                });
                </script>';
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