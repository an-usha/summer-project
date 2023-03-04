<html>
<link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/allpatient.css" />
    <body>
        <?php
include 'Home.php';
include 'dbconnect.php';
 ?>

<div class="all">

    <div class="upper">

        <div class="head">
            <a class="Back" href="doc.php">Back</a>
        </div>

        <div class="new">
            <a href="newmed.php">New Test</a>
        </div>

    </div>
        <table class="tb">
            <tr>
              <th>Doctor Name</th>
              <th>Speciality</th>
              <th>Phone Number</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
            <?php
                if(isset($_POST['submit']))
            {
                $str=mysqli_real_escape_string($con,$_POST['str']);
                $result_per_page = 6;
                $q="SELECT * FROM add_doc where Name Like '%$str%' or Field Like '%$str%'";
                $result=mysqli_query($con,$q) or die(mysqli_error($con));
                $num_of_result = mysqli_num_rows($result);
                $number_pages = ceil($num_of_result/$result_per_page);

                if(!isset($_GET['page']))
                {
                    $page = 1;
                }
                else{
                    $page = $_GET['page'];
                }
                $sql="SELECT * FROM add_doc WHERE Name LIKE '%$str%' OR Field LIKE '%$str%'";
                $res = mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    echo "<h2>You searched for - ".$str."</h2>";
                    while ($row=mysqli_fetch_array($res)) 
                    {
                       echo "<tr>";
                       echo "<td>".$row['Name']."</td>";
                       echo "<td>".$row['Field']."</td>";
                       echo "<td>".$row['Phone']."</td>";
                       echo "<td>".$row['Time1']."</td>";
                       echo "<td> <a href='updatedocform.php?id=".$row['d_id']."' class= 'edit'>Edit</a> 
                       <a href='deletedoc.php?delid=".$row['d_id']."' class= 'delete'>Delete </a> </td>";
                       echo "</tr>";
                    }
                }
                else
                { 
                    echo "<h2>No data found!!!</h2>";
                }
            }
            ?>
        </table>
    </div>
    </div>
</body>
</html>