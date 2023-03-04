<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/doc_home.css" />
    <link rel="stylesheet" href="../css/form.css" />
    <link rel="stylesheet" href="../css/allpatient.css" />
    <style> 
        input[type="text"] {
           width: 30%;
           height: 30px;
           padding: 10px 10px;
           border-radius: 4px;
           border: 2px solid #ccc;
        }
        input[type="submit"]{
            width: 10%;
            height: 30px;
            padding: 5px 10px;
            background-color: #3cb371;
            border:1px solid #3cb371;
            border-radius: 4px;
            text-align: center;
            color: #FFFFFF;
            
        }
        input[type="submit"]:hover{
            background-color:#2b704a;
            crusor: pointer;
        }
</style>
  </head>
  <body>
    <?php include 'doc_home.php';
    include 'dbconnect.php';
     

    ?>

        <div class="all">

            <div class="upper">

                <div class="head">
                    <h3>All Patients</h3>
                </div>

                <div class="new">
                    <a href="newpres.php">New Prescription</a>
                </div>

            </div>
            <div class="search_btn" >
            <form action="searchpatient.php" method="POST">
               <input type="text" placeholder="Search here..." name="str">
               <input type="submit" value="Search"  name="medsubmit">
            </form>
            </div>

            <table class="tb">
                <tr>
                    <th>
                        Patient Name
                    </th>
                    <th>Gender</th>

                    <th>
                        Phone Number
                    </th>
                    <th>
                        Age
                    </th>
                    <th >
                        Action
                    </th>
                </tr>
                <?php 

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
                
                        $sql1 = "SELECT * FROM reg_patient ORDER BY Name LIMIT ". $start_limit_num . ',' . $result_per_page;
                        $result1 = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result1)>0)
                    {
                    while ($row=mysqli_fetch_array($result1)) 
                    {
                        $birthDate = $row[5];
                        $dob=new DateTime($birthDate);
                        $now=new DateTime();

                        $age = $now->diff($dob);

                        // echo "Current age is ".$age->format("%y");
                       
 
                        echo "<tr>";
                        // echo "<td>".$row[0]."</td>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row['Gender']."</td>";
                        echo "<td>".$row['Phone']."</td>";
                        echo "<td>".$age->format("%y")."</td>";
                        echo "<td> <a href='prescription_page.php?id=".$row[0]."' class= 'view'>View</a></td>";
                        echo "</tr>";
                    }
                }
                else
                echo "No records!!!";
                ?>
                
            </table>
            <?php
        
                for($page=1; $page<=$number_pages; $page++)
                {
                    echo '<a class="page" href="allpatient.php?page='.$page.'">'.$page.'</a>';
                }
        
            ?>
                
        </div>
     </div>
  </body>
</html>
