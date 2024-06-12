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
        <title>CorpU &#8211; Applicant &#8211; Selected Units </title>
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
                    <li><a href="jobopp.php"><i class="ri-briefcase-line"></i><p>Jobs</p></a></li> 
                    <li><a href="select-units-applicant.php" id="select"><i class="ri-bookmark-3-line"></i><p>Units</p></a></li> 
                    <li><a href="account-applicant.php"><i class="ri-profile-line"></i><p>Account</p></a></li>
                    <li><a href="logout.php"><i class="ri-logout-circle-line"></i><p>Logout</p></a></li>    
                </ul>
            </nav>
        </header>  
        <!-- General heading text section --> 
        <div id="full-container">
            <section id="page-top-2">
                <h4 class="sub-header white-txt">PRIORITISE OPPORTUNITIES</h4>
                <br>
                <p class="white-txt center">Selected units</p>  
            </section>
            <!-- Section with applicants and courses containers --> 
            <section id="app-body-container"> 
                <a href="#"> 
                    <?php 
                        include 'sess.php';
                    $email=getval('aloggedin');
                        $dbh = new PDO("sqlite:/var/www/html/corpu.db");
                        $email=
                        $query = "SELECT  applied_subject, no_of_hours, time_slot, application_status
                        FROM applications where  email='$email' ";

                        $result = $dbh->query($query);
                        foreach ($dbh->query($query) as $row): 
                    ?>
                    <div class="applicant-container"><br>
                        <div class="box-text"><br>
                            <div class="applicant-display-bg">
                                <div class="applicant-display"></div>
                            </div>
                            <h2 class="strong2"><?php echo $row['applied_subject']; ?></h2>
                            <br>
                            <h5 class="strong0">Timeslot</h5>
                            <h4><?php echo $row['time_slot']; ?></h4>
                            <br>
 <br>
                            <h5 class="strong0">Application Status</h5>
                            <h4><?php echo $row['application_status']; ?></h4>
                            <br>

                            <h5 class="strong0">Available hours</h5>
                            <h4><?php echo $row['no_of_hours']; ?></h4>
                            <br> 
                        </div>
                    </div>
                </a>    
                <?php endforeach; ?> 
            </section> 
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