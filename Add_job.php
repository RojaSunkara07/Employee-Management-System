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
        <title>Add &#8211; Job</title>
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
                <p class="white-txt center">Staff assignment form</p>   
            </section>
            <section id="body-container">
                <section id="form-full">
                    <form method="post" action="update_add_job.php">
                        <div class="dropdown"> 
                            <select name="subject_name" required="required">
                                <option value="">Please select unit...</option>			
                                <option value="Computer Science">Computer Science</option>
                                <option value="Cyber Security">Cyber Security</option>
                                <option value="Data Analytics">Data Analytics</option>
                                <option value="Data Management">Data Management</option>
                                <option value="Digital Media Technologies">Digital Media Technologies</option>
                                <option value="System Management">System Management</option> 
                                <option value="others">Others</option> 
                            </select>
                        </div>  
                        <!-- Field for user ID starts -->
                        <div class="input-field"> 
                            <!-- HTML validation -->
                            <input type="number" name="required_hours" id="required_hours" pattern="[0-9]" required="required" placeholder="Required hours"> 
                        </div>
                        <!-- Field for password starts -->
                        <div class="input-field"> 
                            <!-- HTML validation -->
                            <input type="number" name="assigned_hours" id="assigned_hours" pattern="[0-9]" required="required" placeholder="Assign hours">             
                        </div> 
                        <div class="input-field"> 
                            <!-- HTML validation -->
                            <input type="text" name="time_slot" id="time_slot" required="required" placeholder="Timeslot">             
            		    </div> 
                                                <br>
                        <div id="float-left">
                             <!-- Form button that submits input to backend -->
                            <a href="job_postings.php">Return to page</button>
                        </div>
                        <div id="float-right">
                             <!-- Form button that submits input to backend -->
                            <button id="fill" type="submit">Update</button>
                        </div> 
                    </form>
                </section>
            </section>
        </div>
    </body>
</html>