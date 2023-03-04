
<!-- // include_once 'dbconnect.php';
// $id=$_GET['id'];
// $pt_id=$_GET['pt_id'];
// $status=$_GET['status']; -->

<?php
include 'dbconnect.php';
$sql="SELECT file FROM pre_test ";
$q=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($q)){
    ?>
    <embed type="application/pdf" scr="../images<?php echo $info['file']; ?>" width="300" height="400">
<?php
}
?>