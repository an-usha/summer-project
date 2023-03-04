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
            <a class="Back" href="test.php">Back To All Test</a>
        </div>

        <div class="new">
            <a href="newtest.php">New Test</a>
        </div>

    </div>
        <table class="tb">
            <tr>
              <th>Test Name</th>
                    <th>
                       Description
                    </th>
                    <th style="text-align:center">
                        Action
                    </th>
            </tr>
            <?php
                if(isset($_POST['medsubmit']))
            {
                $result_per_page = 6;
                $q="SELECT * FROM new_test";
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

        $sql1 = "SELECT * FROM new_test LIMIT ". $start_limit_num . ',' . $result_per_page;
        $result1 = mysqli_query($con, $sql1);
        $str=mysqli_real_escape_string($con,$_POST['str']);
        $sql="SELECT * FROM new_test WHERE Test_name LIKE '%$str%'";
        $res = mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
          {
            echo "<h2>You searched for - ".$str."</h2>";
           while ($row=mysqli_fetch_array($res)) 
           {
            echo "<tr>";
            // echo "<td>".$row[0]."</td>";
            echo "<td>".$row['Test_name']."</td>";
            echo "<td>".$row['Description']."</td>";
            // echo "<td>".$row[2]."</td>";
            echo "<td> <a href='updatetestform.php?id=".$row[0]."' class= 'edit'>Edit</a> 
            <a href='deletetest.php?delid=".$row[0]."' class= 'delete'>Delete </a> </td>";
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