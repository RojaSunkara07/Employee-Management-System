<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Viewport set to scale 1.0 -->       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Descriptive meta tags -->   
        <meta name="description" content="Applicant login page for CorpU">
		<meta name="keywords" content="CorpU, recruitment, IT">
		<meta name="author" content="Group 23">
        <title>CorpU &#8211; Staff &#8211; Units</title>
        <!-- References to external basic CSS file -->
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <!-- Favicon for tab -->
        <link rel="icon" type="image/x-icon" href="images/game-fill.png">
        <!-- Reference to web icons from Remixicon.com -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
       <!-- Reference to web icons from Fontawesome -->
        <script src="https://kit.fontawesome.com/d7376949ab.js" crossorigin="anonymous"></script>
        <!-- References to external fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
    <!-- Main navigation bar --> 
        <header>
            <nav> 
                <div class="corpu-logo"><img src="images/corpU-logo.svg" alt="CorpU logo"></div>
                <input type="checkbox" id="burger">
                <label for="burger" class="burgerbtn">
                    <i class="ri-menu-line"></i>
                </label>
                <ul>
                    <li><a href="dashboard-staff.html" ><i class="ri-dashboard-3-line"></i><p>Dashboard</p></a></li> 
                    <li><a href="job_postings.php" id="select"><i class="ri-bookmark-3-line"></i><p>Units</p></a></li>
                    <li><a href="applicants.php"><i class="ri-briefcase-line"></i><p>Applicants</p></a></li> 
                    <li><a href="account-staff.php"><i class="ri-profile-line"></i><p>Account</p></a></li> 
                    <li><a href="logout.php"><i class="ri-logout-circle-line"></i><p>Logout</p></a></li>
                </ul>
            </nav>
        </header>  
        <!-- General heading text section --> 
        <div id="full-container">
            <section id="page-top">
                <h4 class="sub-header white-txt">EDIT AND SAVE CHANGES</h4>
                <br>
                <p class="white-txt center">Staff assignment</p>  
            </section>
            <section id="body-container">
                <table id="tablejobpostings">
                    <thead>
                        <tr class="row-head">
                            <td class="head-col-0">Unit ID</td>
                            <td class="head-col-1">Unit name</td>
                            <td class="head-col">Required hrs.</td>
                            <td class="head-col">Assigned hrs.</td>
		                    <td class="head-col-1">Assigned staff</td>
                            <td class="head-col-1">Timeslots</td> 
                            <td class="head-col-0"></td> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include 'sess.php';
                            $dbh = new PDO("sqlite:/var/www/html/corpu.db");
                            $query = "SELECT subject_id,subject_name,required_hours,assigned_hours,assigned_staff,time_slot FROM assigned_units order by subject_id";
                            $result = $dbh->query($query);
                            foreach ($result as $row): ?>
                            	<form method="post" action="Add_job.php">
                                    <tr class="course-row">
                                        <td class="course-col-0">
                                            <h6 class="title grey-txt space-txt uppercase-txt">Unit ID</h6>
                                            <h4><?php echo trim($row['subject_id']); ?></h4>
                                        </td>
                                        <td class="course-col-1">
                                            <h6 class="title grey-txt space-txt uppercase-txt">Unit name</h6>
                                            <h4><?php echo trim($row['subject_name']); ?></h4>
                                        </td>
                                        <td class="course-col">
                                            <h6 class="title grey-txt space-txt uppercase-txt">Required hrs.</h6>
                                            <h4><?php echo trim($row['required_hours']); ?></h4>
                                        </td>
                                        <td class="course-col">
                                            <h6 class="title grey-txt space-txt uppercase-txt">Assigned hrs.</h6>
                                            <h4><?php echo trim($row['assigned_hours']); ?></h4>
                                        </td>
                                        <td class="course-col-1">
                                            <h6 class="title grey-txt space-txt uppercase-txt">Assigned staff</h6>
                                            <h4><?php echo trim($row['assigned_staff']); ?></h4>
                                        </td>
                            	        <td class="course-col-1">
                                            <h6 class="title grey-txt space-txt uppercase-txt">Timeslot</h6>
                                            <h4><?php echo trim($row['time_slot']); ?></h4>
                                        </td> 
                            	        <td class="course-col-0"> 
                                            <button type="submit" id="fill">Edit</button>
                                        </td>
                                    </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
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
            <section id="body-extension">
                <div class="myChart2"> 
                    <h3 class="center strong2">Unit visualization</h3> 
                    <br>
                    <canvas id="myChart"></canvas>
                </div>
            </section>
            <script>
                // Data for the comparison bar chart
                const data = {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [
                        {
                            label: 'Required hours',
                            backgroundColor: 'rgba(255, 166, 131)', // Customize the colors here
                            borderColor: 'rgba(255, 166, 131)',
                            borderWidth: 1,
                            data: <?php echo json_encode($dataset1); ?>
                        },
                        {
                            label: 'Assigned hours',
                            backgroundColor: 'rgb(102, 191, 143)', // Customize the colors here
                            borderColor: 'rgba(102, 191, 143)',
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
    </body>
</html>