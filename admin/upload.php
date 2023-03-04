<?php 
include 'dbconnect.php';
echo'.';
if(isset($_POST['submit']) && isset($_FILES['my']))
{
    // echo"<pre>";
    // print_r($_FILES['my']);
    // echo"</pre>";
    $pt_id=$_GET['pt_id'];
    $id=$_GET['id'];
    
    $img_name = $_FILES['my']['name'];
    $img_size = $_FILES['my']['size'];
    $full_path = $_FILES['my']['full_path'];
    $img_type = $_FILES['my']['type'];
    // echo $img_name;
    // echo $img_type;
    if($img_type!='application/pdf')
    {
        echo '<script src="../Java/jquery-3.4.1.min.js"></script>';
        echo '<script src="../Java/sweetalert2.all.min.js"></script>';
        echo '<script>
        Swal.fire({
            type:"success",
            title:"Only pdf files are allowed.",
			confirmButtonColor: "#d33"

        }).then(function(){
			window.location="admin_test_page.php?id='.$id.'";
		});
        </script>';
    }
    else{
    $tmp_file=$_FILES['my']['tmp_name'];
    $store="../images/".$img_name;
    move_uploaded_file($tmp_file,$store);
    $error = $_FILES['my']['error'];
    $sql="UPDATE `pre_test` SET 
    `file`='$img_name',
    `status`=1
    WHERE `pre_test`.`pres_test` = '$pt_id' ";
     $result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
     if ($result)   
     {
        echo '<script src="../Java/jquery-3.4.1.min.js"></script>';
        echo '<script src="../Java/sweetalert2.all.min.js"></script>';
        echo '<script>
        Swal.fire({
            type:"success",
            title:"Inserted Succesfully.",
			confirmButtonColor: "#d33"

        }).then(function(){
			window.location="admin_test_page.php?id='.$id.'";
		});
        </script>';

    }         
    
}
}
?>