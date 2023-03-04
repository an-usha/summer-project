<?php
session_start();
if(empty(isset($_SESSION['username'])))
{
header("location:Login/logout.php");
exit();
}
?>
<html>
  <head>
    <link rel="stylesheet" href="css/doc_home.css" />    
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

    echo "<h2>Dr.".$name."</h2>";

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
                      <!-- <li>
                        <a href="registerform.php">New Patient</a>
                      </li> -->
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
                        <!-- <li><a href="newapp.php">New Appointments</a>
                        </li> -->
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
                          <!-- <li>
                            <a href="newmed.php">New Medicine</a>
                          </li> -->
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
                      <!-- <li>
                          <a href="newtest.php">New Test</a>
                      </li> -->
                  </ul>
              </li>
            </fieldset>
            <hr>
        </div>
      </div>
  </body>
</html>