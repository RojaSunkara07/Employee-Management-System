
<?php
  $dbh = new PDO("sqlite:/var/www/html/corpu.db");
  $data = array();

  $query = "SELECT subject_name,COUNT(*) as count from assigned_units GROUP BY subject_id";  
  $result = $dbh->query($query);
  foreach ($result as $row) {
    $data[] = $row;
}



$labels = [];
$dataValues = [];
foreach ($data as $row) {
    $labels[] = $row['subject_name'];
    $dataValues[] = (int)$row['count'];
	
}


?>


<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>
    <script>
        // Get the data from PHP
        var labels = <?php echo json_encode($labels); ?>;
        var dataValues = <?php echo json_encode($dataValues); ?>;

        // Create the chart using Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Assigned Units per Subject',
                    data: dataValues,
                     backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>
</body>
</html>