
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
        <title>CorpU &#8211; Staff &#8211; Applicants</title>
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
                    <li><a href="dashboard-staff.html"><i class="ri-dashboard-3-line"></i><p>Dashboard</p></a></li> 
                    <li><a href="job_postings.php"><i class="ri-bookmark-3-line"></i><p>Units</p></a></li>
                    <li><a href="applicants.php" id="select"><i class="ri-briefcase-line"></i><p>Applicants</p></a></li> 
                    <li><a href="account-staff.php"><i class="ri-profile-line"></i><p>Account</p></a></li> 
                    <li><a href="logout.php"><i class="ri-logout-circle-line"></i><p>Logout</p></a></li>
                </ul>
            </nav>
        </header>  
        <!-- General heading text section --> 
        <div id="full-container">
            <section id="page-top">
                <h4 class="sub-header white-txt">CHOOSE THE NEXT MENTORS</h4>
                <br>
                <p class="white-txt center">Interested applicants</p>  
            </section>
            <!-- Section with applicants and courses containers --> 
            <section id="app-body-container"> 
                <table class="jobtable">        
                    <tbody>
                        <?php 
                            include 'sess.php';
                            $dbh = new PDO("sqlite:/var/www/html/corpu.db");
                            $query = "SELECT a.application_id, a.applicant_name, a.applied_subject, a.no_of_hours, b.email, b.phone
                            FROM applications AS a
                            JOIN applicant AS b ON a.email = b.email
                            where a.application_status='pending'";
                            $result = $dbh->query($query);
                            foreach ($result as $row): ?>
                            <?php
                            $itemID=0;
                        ?>
                        <a href="applicant-review.php?id=<?php echo $row['application_id'];?>">

                            <?php
                                $itemID=$itemID+1;
                                //echo $itemID;
                            ?>     
                            <div class="applicant-container"> 
                                <div class="box-text">
                                    <div class="applicant-display-bg"><div class="applicant-display"></div></div>
                                    <h2 class="strong2"><?php echo $row['applicant_name']; ?></h2>
                                    <br>
                                    <h5 class="strong0">Unit/s applied</h5>
                                    <h4><?php echo $row['applied_subject']; ?></h4>
                                    <br>

                                    <h5 class="strong0">Available hrs.</h5><h4><?php echo $row['no_of_hours']; ?></h4>
                                    <br> 
                                    <h5 class="strong0">Contact</h5>
                                    <h4><?php echo $row['email']; ?></h4>
                                    <h4><?php echo $row['phone']; ?></h4>
                                    <div class="review-link" id="float-right">Review applicant</div>
                                </div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </tbody>
                </table>                     
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
                        <li><a href="dashboard-staff.html">Dashboard</a></li>
                        <li><a href="job_postings.php">Units</a></li>
                        <li><a href="applicants.php">Applicants</a></li> 
                        <li><a href="account-staff.php">Account</a></li> 
                    </ul>
                </div> 
            </footer>
        </div>
    </body>
</html>