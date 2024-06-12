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
        <title>CorpU &#8211; Dashboard</title>
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
                    <li><a href="dashboard-staff.html" id="select"><i class="ri-dashboard-3-line"></i><p>Dashboard</p></a></li> 
                    <li><a href="job_postings.php"><i class="ri-bookmark-3-line"></i><p>Units</p></a></li>
                    <li><a href="applicants.php"><i class="ri-briefcase-line"></i><p>Applicants</p></a></li> 
                    <li><a href="account-staff.php"><i class="ri-profile-line"></i><p>Account</p></a></li>  
                    <li><a href="adelval.php"><i class="ri-logout-circle-line"></i><p>Logout</p></a></li>
                </ul>
            </nav>
        </header>  
        <!-- Jobs top section --> 
        <div id="full-container">
            <section id="page-top">
                <h4 class="sub-header white-txt">WELCOME BACK, PROFESSOR</h4>
                <br>
                <p class="white-txt center">Widen knowledge and instil excellence.</p>  
            </section>
            <!-- Section with applicants and courses containers --> 
            <section id="body-container"> 
                <a href="applicants.php"> 
                    <div class="staff-container"> 
                        <img src="images/sessional-staff-corpu.jpg" alt="Sessional staff image">
                        <div class="box-text">
                            <h1 class="strong1 center">Assess applicants</h1>
                            <br>
                            <h4>View the list of interested staff who have responded to vacant and available positions for this academic year.</h4>
                        </div>
                    </div>
                </a>
                <a href="job_postings.php"> 
                    <div class="courses-container">
                        <img src="images/courses-corpu.jpg" alt="Courses university image"> 
                        <div class="box-text">
                            <h1 class="strong1 center">Manage courses</h1>
                            <br>
                            <h4>Sort out available units and make changes by selecting, amending, or deleting your courses.</h4>
                        </div>
                    </div>  
                </a> 
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