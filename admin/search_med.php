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
            <a class="Back" href="med.php">Back To All Medicine</a>
        </div>

        <div class="new">
            <a href="newmed.php">New Test</a>
        </div>

    </div>
    <!-- <div class="search_btn" >
        <form action="searchpage.php" method="POST">
        <input type=text name="str">
        <input type=submit value="search" name="submit">
        </form>
    </div> -->
        <table class="tb">
            <tr>
              <th>Medicine Name</th>
              <th>Medicine Type</th>
              <th>Mg</th>
              <th>Action</th>
            </tr>
            <?php
                if(isset($_POST['medsubmit']))
            {
                $str=mysqli_real_escape_string($con,$_POST['str']);
                $result_per_page = 6;
                $q="SELECT * FROM new_med where M_name Like '%$str%' or Mg Like '%$str%' or Med_type Like '%$str%'";
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

                $start_limit_num = ($page-1)* $result_per_page;

                $sql1 = "SELECT * FROM new_med where M_name Like '%$str%' or Mg Like '%$str%' or Med_type Like '%$str%' LIMIT ". $start_limit_num . ',' . $result_per_page;
                $result1 = mysqli_query($con, $sql1);
                $sql="SELECT * FROM new_med where M_name Like '%$str%' or Mg Like '%$str%' or Med_type Like '%$str%'";
                $res = mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    echo "<h2>You searched for - ".$str."</h2>";
                    while ($row=mysqli_fetch_array($res)) 
                    {
                       echo "<tr>";
                       echo "<td>".$row['M_name']."</td>";
                       echo "<td>".$row['Med_type']."</td>";
                       echo "<td>".$row['Mg']."</td>";
                       echo "<td> <a href='updatemedform.php?id=".$row[0]."' class= 'edit'>Edit</a> 
                       <a href='deletemed.php?delid=".$row[0]."' class= 'delete'>Delete </a> </td>";
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