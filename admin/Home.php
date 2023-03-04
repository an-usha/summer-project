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
    <link rel="stylesheet" href="../css/home.css" />    
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
  </body>
</html>