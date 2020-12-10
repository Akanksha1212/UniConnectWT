 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    
 <!-- Styles -->

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/userHome.css" rel="stylesheet">
<link rel="icon" href="images/logo.png">
</head>
<body>
<?php
// Initialize the session
include('config.php');
session_start();

$session_id = $_SESSION["id"];

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        
        <a class="navbar-brand logo-image" href="index.php"><img src="images/logo.png" alt="alternative"></a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
	    <?php
		$sql    = "SELECT * FROM Users where user_id= $session_id";
		$result = mysqli_query($mysqli, $sql);
	?>
	<?php
	while ($rows = mysqli_fetch_array($result)) { 			    
	?>
	<div class="dropdown">
		<a href="reset-password.php" class="" style="background-color: #cf1d52; padding:9px; border-radius: 8px; text-decoration: None; color: white">Create New Channel</a>
                <a href= "#"> <img src="user_images/<?php echo $rows['image']; ?>" alt="" class="dropbtn"/>&nbsp<img src="images/down-arrow.png"/></a>
		<div class="dropdown-content">
        	<a href="profile.php">Edit Profile</a>
        	<a href="reset-password.php">Reset Password</a>
        	<a href="logout.php">Sign Out</a>
      		</div>
            </div>
    	</div>
	<?php 
	}
	?>
        </div>
    </nav>

<!-- end of navbar -->
    <!-- end of navigation -->
     
<div class= "login-card"> 
   <!-- Services -->
    <div id="services" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img src ="images/uni.png">
                    <h4>Hi! <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to UniConnect!</h4>
<br>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
             <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card -->

                    <div class="card">
                       <a class="card-block stretched-link text-decoration-none" href="https://www.google.com">
       
   
                        <img class="card-image" src="images/services-icon-1.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">#General</h4>
                            <p>Post and see what others are doing?</p>
                        </div>
                    </a>
                    </div>
                    <!-- end of card -->

                   <!-- Card -->

                    <div class="card">
                       <a class="card-block stretched-link text-decoration-none" href="https://www.google.com">
       
   
                        <img class="card-image" src="images/services-icon-1.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">#Announcements</h4>
                            <p>Get all updates in one click</p>
                        </div>
                    </a>
                    </div>
                    <!-- end of card -->

                  <!-- Card -->

                    <div class="card">
                       <a class="card-block stretched-link text-decoration-none" href="https://www.google.com">
       
   
                        <img class="card-image" src="images/services-icon-1.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">#Events</h4>
                            <p>Seminars,Workshsops etc.</p>
                        </div>
                    </a>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card -->

                    <div class="card">
                       <a class="card-block stretched-link text-decoration-none" href="https://www.google.com">
       
   
                        <img class="card-image" src="images/services-icon-1.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">#Hackathons</h4>
                            <p>Team up and build awesome projects</p>
                        </div>
                    </a>
                    </div>
                    <!-- end of card -->

                   <!-- Card -->

                    <div class="card">
                       <a class="card-block stretched-link text-decoration-none" href="https://www.google.com">
       
   
                        <img class="card-image" src="images/services-icon-1.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">#Events</h4>
                            <p>Seminars,Workshsops etc.</p>
                        </div>
                    </a>
                    </div>
                    <!-- end of card -->

                  <!-- Card -->

                    <div class="card">
                       <a class="card-block stretched-link text-decoration-none" href="https://www.google.com">
       
   
                        <img class="card-image" src="images/services-icon-1.svg" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Alumni Referral</h4>
                            <p>Find alumna from your college</p>
                        </div>
                    </a>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->
</div>
</body>
</html>
