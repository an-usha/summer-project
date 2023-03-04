<?php
session_start();
if(empty(isset($_SESSION['username'])))
{
header("location:Login/login1.php");
exit();
}
?>
<html>
  <head>
    <link rel="stylesheet" href="../css/doc_home.css" /> 
    <link rel="stylesheet" href="../css/pres.css" /> 
    <link rel="stylesheet" href="../css/allpatient.css" />    


  </head>
  <body>

    <div class="wholebody">
        <div class="name">

        <a href="../Login/logout.php">Logout</a>
<?php include_once 'dbconnect.php';
        if(empty($_SESSION['username'])){
        ?>
        <?php } else {?>  
<?php 
$username=$_SESSION['username'];
$q="SELECT * FROM admin WHERE username='$username'";
$result=mysqli_query($con,$q);
if (mysqli_num_rows($result)>0)
{
  while ($row=mysqli_fetch_array($result)) 
  {
    $name=$row['Name'];

    echo "<h2>".$name."</h2>";

  }
}
        }
?>
          <p>Swoyambhu Health Care Center</p>
          
        </div>
        <div class="mainbody">
            
            <div class="menu">
              <ul><li class="dash"><a href="doc_dashboard.php" >Dashboard</a></li><hr>
                <fieldset >
                  <legend>PATIENT</legend>
                  <li class="submenu"><a class="reg" href="doc_allpatient.php">Patients</a>
                    <ul>
                      <li>
                        <a href="doc_allpatient.php">All Patient</a>
                      </li>
                    </ul>
                  </li>
                </fieldset>
                <hr>
                <fieldset>
                  <legend>APPOINTMENTS</legend>
                  <li class="appoint"><a class="app" href="doc_appointment.php">Appointment</a>
                      <ul>
                        <li>
                          <a href="doc_appointment.php">Appointment list</a>
                        </li>
                      </ul>
                  </li>
                </fieldset>
                <hr>
                <fieldset>
                  <legend>PRESCRIBTION</legend>
                  <li class="pre"><a href="" class="p">Prescribtion</a>
                      <ul>
                          <li>
                            <a href="prescription.php">All Prescribtion</a>
                          </li>
                          <li>
                            <a href="newpres.php">New Prescribtion</a>
                          </li>
                      </ul>
                  </li>
              </fieldset>
              <hr>
                <fieldset>
                  <legend>MEDICINE</legend>
                  <li class="med"><a href="doc_med.php" class="m">Medicine</a>
                      <ul>
                          <li>
                            <a href="doc_med.php">Medicine list</a>
                          </li>
                      </ul>
                  </li>
              </fieldset>
              <hr>
              <fieldset>
                <legend>TEST</legend>
                <li class="test"><a href="doc_test.php" class="t">Test</a>
                  <ul>
                      <li>
                        <a href="doc_test.php">Test list</a>
                      </li>
                  </ul>
              </li>
            </fieldset>
            <hr>
        </div>
      </div>
      <div class="detail">
        <h2>Patient's Details</h2>
        <?php 
          include ("dbconnect.php");
          $id=$_GET['id'];
          $patient="SELECT * from reg_patient where id=$id";
          $pres="SELECT * from pre_test where id=$id ORDER BY date desc";
          $result=mysqli_query($con,$patient) or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($result)) {

        ?>
        <p>Name :<?php  echo $row['Name'];  ?><br>
        <p>Address :<?php echo $row['Address'] ;  ?><br>
        <p>Contact :<?php echo $row['Phone'] ;  ?><br>
        <p>Gender :<?php echo $row['Gender'] ;  ?><br>
        <p>Birthdate :<?php echo $row['Birthdate'] ;  ?><br>
		    <p>Blood Group :<?php echo $row['Blood'] ;  ?><br>
		    <!-- <p>Email :<?php echo $row['Email'] ;  ?><br> -->
      </div>
      <div class="nav_bar">
        <ul>
        <li>
          <?php 
                echo "<td> <a href='prescription_page.php?id=".$row[0]."'>Medicine</a></td></table>"; 
          ?>
          <li>
          <?php 
                echo "<td> <a href='test_page.php?id=".$row[0]."' id='onlink'>Test</a></td></table>"; 
          ?>
      </li>
        </ul>

      </div>
      <div class="main_content">
        <table class="tb">
                <tr>
                    <th>
                        Date
                    </th>
                    <th>Doctor</th>
                    <th>Test</th>
                    <th style="text-align:center" colspan=2>Action</th>
          </tr>
          <tr>
          <?php
				$result1=mysqli_query($con,$pres) or die(mysqli_error($con));
				if (mysqli_num_rows($result1)>0)
                    {
						while ($row=mysqli_fetch_array($result1))
						{ 
              $docid=$row['d_id'];
              $doctor="SELECT * FROM add_doc WHERE d_id=$docid";
              $resdoc=mysqli_query($con,$doctor);
              while ($rowdoc=mysqli_fetch_assoc($resdoc))
              {
                $docname= $rowdoc['Name'];
              }
              $testid=$row['t_id'];
              $test="SELECT * FROM new_test WHERE t_id=$testid";
              $restest=mysqli_query($con,$test);
              while ($rowtest=mysqli_fetch_assoc($restest))
              {
                $testname= $rowtest['Test_name'];
              }
	    					echo "<td>".$row['date']."</td>";
	    					echo "<td>".$docname."</td>";
	    					echo "<td>".$testname."<td>";
                echo"<td style='text-align:center'>";
                if ($row['status']==1)
                {
                  echo "<p class='file'><a href='status.php?pt_id=".$row['pres_test']."&id=".$row['ID']."' class='view'>View</a> 
                  <a href='delete.php?delid=".$row['pres_test']."' class='delete'>Delete </a></p>";
                }
                else{
                  echo"<p class='file'>Not Added
                  <a href='delete.php?delid=".$row['pres_test']."' class='delete'>Delete</a></p>";
                }

							echo "</td></tr>";
						}
					}
				else
				{
					echo "<td>No Record!!!</td>";
					echo "</tr>";
				}
      }
			?>
</table>
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