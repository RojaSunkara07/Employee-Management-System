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
        <title>CorpU &#8211; Applicant &#8211; Jobs</title>
        <!-- References to external basic CSS file -->
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
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
	<script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>

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
                    <li><a href="dashboard-applicant.html"><i class="ri-dashboard-3-line"></i><p>Dashboard</p></a></li> 
                    <li><a href="jobopp.php" id="select"><i class="ri-briefcase-line"></i><p>Jobs</p></a></li> 
                    <li><a href="select-units-applicant.php"><i class="ri-bookmark-3-line"></i><p>Units</p></a></li> 
                    <li><a href="account-applicant.php"><i class="ri-profile-line"></i><p>Account</p></a></li>
                    <li><a href="logout.php"><i class="ri-logout-circle-line"></i><p>Logout</p></a></li>  
                </ul>
            </nav>
        </header>
    <!-- General heading text section --> 
        <div id="full-container">
            <section id="page-top-2">
                <h4 class="sub-header white-txt">APPLY TO YOUR CHOICE OF UNIT</h4>
                <br>
                <p class="white-txt center">Available jobs</p>  
            </section> 
            <section id="body-container"> 
                <table id="tablejobopp"> 
                    <thead>
                        <tr class="row-head">
                            <th class="head-col-0">Unit ID</th>
                            <th class="head-col-1">Unit name</th>
                            <th class="head-col-0">Available hrs.</th>
            		        <th class="head-col-1">Timeslots</th>
            		        <th class="head-col-0"></th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php 
                            include 'sess.php';
                            $dbh = new PDO("sqlite:/var/www/html/corpu.db");
                            $query = "SELECT subject_id,subject_name,(required_hours-assigned_hours) as available_hours,time_slot FROM assigned_units order by subject_id asc";
                            $result = $dbh->query($query);
                            foreach ($result as $row): 
                            ?>
                            <form method="post" action="apply_job.php">
                                <tr class="course-row">
                                    <td class="course-col-0">
                                        <h6 class="title grey-txt space-txt uppercase-txt">Unit ID</h6>
                                        <h4><?php echo $row['subject_id']; ?></h4>
                                    </td>
                                    <td class="course-col-1">
                                        <h6 class="title grey-txt space-txt uppercase-txt">Unit name</h6>
                                        <h4><?php echo $row['subject_name']; ?></h4>
                                    </td>
                                    <td class="course-col-0">
                                        <h6 class="title grey-txt space-txt uppercase-txt">Available hrs.</h6>
                                        <h4><?php echo $row['available_hours']; ?></td></h4>
                                    </h4>
                            		<td class="course-col-1">
                                        <h6 class="title grey-txt space-txt uppercase-txt">Timeslots</h6>
                                        <h4><?php echo $row['time_slot']; ?></h4>
                                    </td>
                            		<td class="course-col-0"> 
                                        <button type="submit" id="fill">Apply</button>
                                    </td>
                                </tr>
                        <?php endforeach; 
                        ?>
                    </tbody>
                </table>
            </section>
                <?php
                    $data = array();
                    $dbh = new PDO("sqlite:/var/www/html/corpu.db");
                    $query = "SELECT subject_name,(required_hours-assigned_hours) as available_hours from assigned_units";  
                    $result = $dbh->query($query);

                    foreach ($result as $row) {
                    $data[] = $row;
                    }
                    $labels = [];
                    $dataValues = [];

                    foreach ($data as $row) {
                        $labels[] = $row['subject_name'];
                        $dataValues[] = $row['available_hours'];
                    }
                ?>
            <section id="body-extension">
                <div class="myChart"> 
                    <h3 class="center strong2">Unit visualization</h3> 
		    <h4 class="center"> Hover on the graph for values</h4>
                    <br>
                    <canvas id="myChart"></canvas> 
                </div>
            </section>
                <script>
                    // Get the data from PHP
                    var labels = <?php echo json_encode($labels); ?>;
                    var dataValues = <?php echo json_encode($dataValues); ?>;
                    
                    // Create the chart using Chart.js
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels:labels,
                            datasets: [{
                                label: 'Assigned Units per Subject',
                                data: dataValues,
                                backgroundColor: [
                                    'rgb(232, 103, 116)',
                                    'rgb(255, 166, 131)',
                                    'rgb(255, 222, 184)',
        	                        'rgb(102, 191, 143)',
                                    'rgb(110, 68, 153)',
                                    'rgb(107, 82, 97)'
                                ],                  
                                borderWidth: 1
                            }]
                        },
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
                        <li><a href="dashboard-applicant.html">Dashboard</a></li> 
                        <li><a href="jobopp.php">Jobs</a></li> 
                        <li><a href="select-units-applicant.php">Units</a></li> 
                        <li><a href="account-applicant.php">Account</a></li>  
                    </ul>
                </div> 
            </footer>
        </div> 
    </body>
</html>
