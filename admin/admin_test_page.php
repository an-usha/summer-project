<?php
session_start();
if(empty(isset($_SESSION['username'])))
{
header("location:../Login/login1.php");
exit();
}
?>
<html>
  <head>
    <link rel="stylesheet" href="../css/home.css" /> 
    <link rel="stylesheet" href="../css/pres.css" /> 
    <link rel="stylesheet" href="../css/allpatient.css" />    


  </head>
  <body>

    <div class="wholebody">
        <div class="name">

        <a href="../Login/logout.php">Logout</a>
        <h2>Admin</h2>
          <p>Swoyambhu Health Care Center</p>
          
        </div>
        <div class="mainbody">
            
            <div class="menu">
              <ul><li class="dash"><a href="dashboard.php" >Dashboard</a></li><hr>
              <fieldset >
                  <legend>DOCTORS</legend>
                  <li class="dr"><a class="doc" href="doc.php">Doctors</a>
                    <ul>
                      <li>
                        <a href="doc.php">All Doctors</a>
                      </li>
                      <li>
                        <a href="adddoc.php">Add Doctors</a>
                      </li>
                    </ul>
                  </li>
                </fieldset>
                <hr>
                <fieldset >
                  <legend>PATIENT</legend>
                  <li class="submenu"><a class="reg" href="allpatient.php">Patients</a>
                    <ul>
                      <li>
                        <a href="allpatient.php">All Patient</a>
                      </li>
                      <li>
                        <a href="registerform.php">New Patient</a>
                      </li>
                    </ul>
                  </li>
                </fieldset>
                <hr>
                <fieldset>
                  <legend>APPOINTMENTS</legend>
                  <li class="appoint"><a class="app" href="appointment.php">Appointment</a>
                      <ul>
                        <li>
                          <a href="appointment.php">Appointment list</a>
                        </li>
                        <li><a href="newapp.php">New Appointments</a>
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
                            <a href="admin_prescription.php">All Prescribtion</a>
                          </li>
                      </ul>
                  </li>
              </fieldset>
              <hr>
                <fieldset>
                  <legend>MEDICINE</legend>
                  <li class="med"><a href="med.php" class="m">Medicine</a>
                      <ul>
                          <li>
                            <a href="med.php">Medicine list</a>
                          </li>
                          <li>
                            <a href="newmed.php">New Medicine</a>
                          </li>
                      </ul>
                  </li>
              </fieldset>
              <hr>
              <fieldset>
                <legend>TEST</legend>
                <li class="test"><a href="test.php" class="t">Test</a>
                  <ul>
                      <li>
                        <a href="test.php">Test list</a>
                      </li>
                      <li>
                          <a href="newtest.php">New Test</a>
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
                echo "<td> <a href='admin_prescription_page.php?id=".$row[0]."'>Medicine</a></td></table>"; 
          ?>
          <li>
          <?php 
                echo "<td> <a href='admin_test_page.php?id=".$row[0]."' id='onlink'>Test</a></td></table>"; 
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
                    <th colspan=2>Action</th>
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
                echo "<td>";
                if ($row['status']==1)
                {
                  echo '<p class="file">Added</a></p>';
                }
                else{
                  echo '<form action="upload.php?pt_id='.$row['pres_test'].'&status=0&id='.$row['ID'].'" method="post" enctype="multipart/form-data">
                  <input type="file" name="my" required>
                  <input type="submit" name="submit"></form>';
                  // ?pt_id='.$row['pres_test'].'&status=1&id='.$row['ID'].'"
                }
                "<td>";
							echo "</tr>";
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
       
  </body>
</html>