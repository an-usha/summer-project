<?php
	include("dbconnect.php");
    $id=$_GET['delid'];
    echo '.';
        if ($id!==null);
        {
            $sql="SELECT * from reg_patient where id=$id";
            $result1=mysqli_query($con,$sql);
            if (mysqli_num_rows($result1)>0)
            {
                while ($row=mysqli_fetch_array($result1)) 
                {
                    $month=$row['Created'];
                }
            }

            $q="delete from reg_patient where id=$id";
            $p_sql="SELECT * from pre_med where ID=$id";
            $p_r=mysqli_query($con,$p_sql);
            if (mysqli_num_rows($p_r)>0)
            {
                while ($row=mysqli_fetch_array($p_r)) 
                {
                    $p_q="delete from pre_med where ID=$id";
                    $r_p=mysqli_query($con,$p_q);
                }
            }
            $t_sql="SELECT * from pre_med where ID=$id";
            $t_r=mysqli_query($con,$t_sql);
            if (mysqli_num_rows($t_r)>0)
            {
                while ($row=mysqli_fetch_array($t_r)) 
                {
                    $t_q="delete from pre_test where ID=$id";
                    $r_t=mysqli_query($con,$t_q);
                }
            }
            $result=mysqli_query($con,$q);
            if ($result)
            {
		        $num='';
                $sql="SELECT * FROM graph where Months LIKE'%$month%'";
                $res=mysqli_query($con,$sql) or die(mysqli_error($con));
                while ($row=mysqli_fetch_array($res)) 
                {
				$id=$row['id'];
				$num=$row['Patients']-1;
				$q="UPDATE `graph` SET 
				`Patients`='$num'
				WHERE `graph`.`id` = '$id'; ";
	            $q_r=mysqli_query($con,$q) or die(mysqli_error($con));
                echo "<script> window.location='allpatient.php' </script>";
            }
            }
                
	
            }
?>