<html>
    <link rel="stylesheet" href="../css/allpatient.css" />
    <body>
        <?php
include 'doc_home.php';
include 'dbconnect.php';
 ?>

<div class="all">

    <div class="upper">

        <div class="head">
            <a class="Back" href="doc_allpatient.php">Back To All Patient</a>
        </div>

    </div>
        <table class="tb">
            <tr>
              <th>Patient Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>
                        Phone Number
                    </th>
                    <th>
                        Age
                    </th>
                    <th>Weight</th>
                    <th>
                        Blood Group
                    </th>
                    <th style="text-align:center">
                        Action
                    </th>
            </tr>
            <?php
                if(isset($_POST['medsubmit']))
            {
                $result_per_page = 6;
                $q="SELECT * FROM reg_patient";
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

        $sql1 = "SELECT * FROM reg_patient LIMIT ". $start_limit_num . ',' . $result_per_page;
        $result1 = mysqli_query($con, $sql1);
        $str=mysqli_real_escape_string($con,$_POST['str']);
        $sql="SELECT * FROM reg_patient WHERE Name LIKE '%$str%' or Address LIKE '%$str%' or Phone LIKE '%$str%'";
        $res = mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
          {
            echo "<h2>You searched for - ".$str."</h2>";
           while ($row=mysqli_fetch_array($res)) 
           {
            echo "<tr>";
            // echo "<td>".$row[0]."</td>";
            echo "<td>".$row['Name']."</td>";
            echo "<td>".$row['Address']."</td>";
            echo "<td>".$row['Gender']."</td>";
            echo "<td>".$row['Phone']."</td>";
            echo "<td>".$row['Birthdate']."</td>";
            echo "<td>".$row['Weight']."</td>";
            echo "<td>".$row['Blood']."</td>";

            // echo "<td>".$row[2]."</td>";
            echo "<td> <a href='prescription_page.php?id=".$row[0]."' class= 'view'>View</a></td>";
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