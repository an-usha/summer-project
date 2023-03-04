<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/doc_home.css" />
    <link rel="stylesheet" href="../css/med.css" />
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
    <?php 
        include 'doc_home.php';
        include 'dbconnect.php';
    ?>

    <div class="all">

        <div class="upper">

            <div class="head">
                <h3>All Test</h3>
            </div>

        </div>
        <div class="search_btn" >
            <form action="docsearch_test.php" method="POST" onsubmit="return check()">
            <input type=text name="str" placeholder="Search here...">
            <input type=submit value="Search" name="testsubmit">
            </form>
        </div>
            <table class="tb">
                <tr>
                  <th>Test Name</th>
                  <th>Description</th>
                </tr>
                <?php 
                   $result_per_page = 8;
                   $q="SELECT * FROM new_test";
                   $result=mysqli_query($con,$q) or die(mysqli_error($con));
                   $num_of_result = mysqli_num_rows($result);
                   $number_pages = ceil($num_of_result/$result_per_page);

                    if(!isset($_GET['page']))
                    {
                        $page = 1;
                    }
                    else
                    {
                        $page = $_GET['page'];
                    }
               
                    $start_limit_num = ($page-1)* $result_per_page;
               
                    $sql1 = "SELECT * FROM new_test ORDER BY Test_name LIMIT ". $start_limit_num . ',' . $result_per_page;
                    $result1 = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result1)>0)
                    {
                        while ($row=mysqli_fetch_array($result1)) 
                        {
                            echo "<tr>";
                            // echo "<td>".$row[0]."</td>";
                            echo "<td>".$row['Test_name']."</td>";
                            echo "<td>".$row['Note']."</td>";
                            echo "</tr>";
                        }
                    }
                    else
                    echo "No records";
                ?>

            </table>
            <?php
        
                for($page=1; $page<=$number_pages; $page++)
                {
                    echo '<a class="page" href="doc_test.php?page='.$page.'">'.$page.'</a>';
                }
        
            ?>
        </div>
    </div>
    <script>
        function check()
        {
            var str=document.getElementById("str").value;
            if(str=='')
            {
                document.getElementById("demo").innerHTML="*Please fill this out.";
                return false;
            }
            else{
                return true;
            }
        }
    </script>
    </body>
</html>