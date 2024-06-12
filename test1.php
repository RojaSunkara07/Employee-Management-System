<?php
  $dbh = new PDO("sqlite:/var/www/html/corpu.db");
  $data = array();

  $query = "SELECT subject_name,required_hours,assigned_hours from assigned_units";  
  $result = $dbh->query($query);
  foreach ($result as $row) {
    $data[] = $row;

}



$labels = [];
$dataset1= [];
$dataset2=[];
foreach ($data as $row) {
    $labels[] = $row['subject_name'];
    $dataset1[] = $row['required_hours'];
    $dataset2[] = $row['assigned_hours'];

	
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
        // Data for the comparison bar chart
        const data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [
                {
                    label: 'Dataset 1',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)', // Customize the colors here
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    data: <?php echo json_encode($dataset1); ?>
                },
                {
                    label: 'Dataset 2',
                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Customize the colors here
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: <?php echo json_encode($dataset2); ?>
                }
            ]
        };

        // Configuration options for the chart
        const options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Create the chart
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>
</html>
  
</html>

            <footer>
            <!-- Full-width two-column footer --> 
                <!-- Column 1 -->
                <div id="footer-left">
                    <ul> 
                     <li>CorpU&nbsp; &#169; &nbsp;All rights reserved.</li> 
                    </ul>
                </div>
                <!-- Column 2 -->
                <div id="footer-right">
                    <ul> 
                         <li><a href="dashboard-staff.html">Dashboard</a></li>
                         <li><a href="units-staff.html">Units</a></li>
                         <li><a href="applicants-staff.html">Applicants</a></li> 
                         <li><a href="account-staff.html">Account</a></li> 
                    </ul>
                </div> 
            </footer>
        </div>
</section> 
    </body>
</html>
 