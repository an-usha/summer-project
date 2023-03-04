<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/home.css" />
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
    <?php include 'Home.php';
    include 'dbconnect.php';
     

    ?>

        <div class="all">

            <div class="upper">

                <div class="head">
                    <h3>All Patients</h3>
                </div>

                <div class="new">
                    <a href="registerform.php">New Patients</a>
                </div>

            </div>
            <div class="search_btn" >
            <form action="search_patient.php" method="POST" onsubmit="return check()">
               <input type="text" placeholder="Search here..." name="str" id="str">
               <input type="submit" value="Search"  name="medsubmit"><span id="demo"></span>
            </form>
            </div>

            <table class="tb">
                <tr>
                    <th>
                        Patient Name
                    </th>
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
                        echo "<tr>";
                        echo "<td>".$row[1]."</a></td>";
                        echo "<td>".$row[2]."</td>";
                        echo "<td>".$row[3]."</td>";
                        echo "<td>".$row[4]."</td>";
                        echo "<td>".$age->format("%y")."</td>";
                        echo "<td>".$row[6]."</td>";
                        echo "<td>".$row[7]."</td>";
                        echo "<td style='text-align:center'> <a href='prescription_page.php?id=".$row[0]."' class= 'view'>View</a> <a href='updateform.php?id=".$row[0]."' class= 'edit'>Edit</a> 
                        <a href='delete.php?delid=".$row[0]."' class='delete'>Delete </a> </td>";
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
     <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/sweetalert2.all.min.js"></script>
     <script>
     $('.delete').on('click',function(e){
        e.preventDefault();
        const href =$(this).attr('href')
        Swal.fire({
            type:'Are you sure?',
            title:'Record will be deleted.',
            Text:'Warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete'

          }).then((result)=>{
            if(result.value){
                document.location.href= href;
            }
          })
     })
        </script>
  </body>
</html>
