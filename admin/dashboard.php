<html>
  <head>
    <title>Patient Registeration System</title>
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/dashboard.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <?php 
      include 'Home.php';
      include 'dbconnect.php'; 

      $count1 = "SELECT count(id) AS total FROM reg_patient";
      $res1 = mysqli_query($con,$count1);
      $values1 = mysqli_fetch_assoc($res1);
      $num1 = $values1['total'];

      $count2 = "SELECT count(app_id) AS total FROM new_appoint";
      $res2 = mysqli_query($con,$count2);
      $values2 = mysqli_fetch_assoc($res2);
      $num2 = $values2['total'];

      $count3 = "SELECT count(m_id) AS total FROM new_med";
      $res3 = mysqli_query($con,$count3);
      $values3 = mysqli_fetch_assoc($res3);
      $num3 = $values3['total'];

      $count4 = "SELECT count(t_id) AS total FROM new_test";
      $res4 = mysqli_query($con,$count4);
      $values4 = mysqli_fetch_assoc($res4);
      $num4 = $values4['total'];
    ?>
      <div class="whole">
        <a href="allpatient.php"><div class="first">
                <h2> Total Patients
                  <br><p><?php echo $num1; ?></p>
                </h2>

            </div>
            </a>
            <a href="appointment.php"><div class="second">
                <h2>Total Appointments
                <br><p><?php echo $num2; ?></p>
              </h2>
            </div>
            </a>
            <a href="med.php"><div class="third">
                <h2> Medicine
                <br><p><?php echo $num3; ?></p>
              </h2>
            </div>
            </a>
            <a href="test.php"><div class="fourth">
                <h2>Total Tests
                  <br><p><?php echo $num4; ?></p>
                </h2>
            </div>
            </a>
        </div>
        <?php 
  $con=new mysqli("localhost","root","","db_prime");

  if(!$con){
      echo "Connection Failed";
  }
  $query = $con->query("
    SELECT Months, Patients FROM graph
  ");

  foreach($query as $data)
  {
    $month[] = $data['Months'];
    $patient[] = $data['Patients'];
  }

?>

<div class="chart">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Patient Record',
      data: <?php echo json_encode($patient) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
        x:{
          display: true,
          title: {
                    display: true,
                    text: 'Months'//setting Name of X axis 
                  }
        },
        y: {
          display: true,
          title: {
                    display: true,
                    text: 'Number of patients'//setting Name of X axis 
                  }
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</body>
</html>