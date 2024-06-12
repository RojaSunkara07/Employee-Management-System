<?php
include 'sess.php';
try {
    $dbh = new PDO("sqlite:/var/www/html/corpu.db");


$query = "SELECT subject_name, COUNT(*) AS count FROM assigned_units GROUP BY subject_id";
$result = $dbh->query($query);

// Fetch the data into an associative array
$data = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $data[] = $row;
}

// Free the result set
$result->finalize();

// Convert the data into arrays
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
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Assigned Units per Subject',
                    data: dataValues,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
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