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
        <title>CorpU &#8211; Apply Job</title>
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
                <p class="white-txt center">Available jobs form</p>  
            </section>   
            <section id="body-container">
                <section id="form-full">
                    <?php
                        include 'sess.php';
                        $dbh = new PDO("sqlite:/var/www/html/corpu.db");
                        $query = "SELECT subject_name FROM assigned_units";
                        $result = $dbh->query($query);
                    ?>
                    <form method="post" action="applicant_apply_job.php">
                     	<div class="dropdown"> 
                            <select name="subject_name" required="required">
                                <option value="">Please select unit...</option>	
                    		    <?php foreach ($result as $row): ?>
                        		  <option value="<?php echo $row['subject_name']; ?>"><?php echo $row['subject_name']; ?></option>
                    		    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-field"> 
                            <!-- HTML validation -->
                            <input type="number" name="no_of_hours" id="no_of_hours" required="required" placeholder="Input available hours">             
                    	</div> 
                        <div id="float-left">
                             <!-- Form button that submits input to backend -->
                            <a href="jobopp.php">Return to page</button>
                        </div>
                        <div id="float-right">
                             <!-- Form button that submits input to backend -->
                            <button id="fill" type="submit">Apply</button>
                        </div>
                    </form>
                </section>
            </section>
        </div>
    </body>
</html>