<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Website Title -->
    <title>UniConnect - Collaborate with your peers</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="js/validate.js"></script> 
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Favicon  -->
    <link rel="icon" href="images/logo.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
<?php
include('config.php');
// Initialize the session
session_start();
//print_r ($_SESSION);
$session_id= $_SESSION["id"];
//echo "<p>"; 
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
               <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                       <a class="nav-link page-scroll" href="#userhome.php">Home</a>
                   </li>
                   <li class="nav-item">
                     <a id="logoutbutton" class="nav-link page-scroll" href="logout.php">
                               Logout &nbsp</a>
                   </li>
                </ul>
            </div>
            
      </nav> 
<?php
$sql="SELECT * FROM Users where user_id= $session_id";
$result=mysqli_query($mysqli,$sql);
?>
<?php
while($rows=mysqli_fetch_array($result)){
?>   
    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $rows['first_name']." ".$rows['last_name']; ?>
                                    </h5>
                                    <h6>
                                        <?php echo "@".$rows['user_name']; ?>
                                    </h6>
                                    <p class="profile-rating"><?php echo $rows['email']; ?></p>
    </div>
</div>

    <form action="action_page.php" method="post">
        <div class="container" style="padding: 50px;">
          <h1>Profile Information</h1>
          <p>Please fill  this form to create your profile.</p>
          <hr>
      
          <label for="first name"><b>First Name</b></label>
          <input type="text" value="<?php echo $rows['first_name']; ?>" name="first name" id="first" required>
         
          <label for="last name"><b>Last Name</b></label>
          <input type="text" value="<?php echo $rows['last_name']; ?>" name="last name" id="last" required>
          
          <label for="phone num"><b>Phone Number</b></label>
          <input type="text" value="<?php echo $rows['phone']; ?>" id="phone" required>
          
          <label for="country"><b>Country Name</b></label>
          <input type="text" placeholder="Enter Country name" name="Country name" id="country" required>
          
          <label for="state"><b>State Name</b></label>
          <input type="text" placeholder="Enter State name" name="State name" id="state" required>
          
          <label for="University name"><b>University Name</b></label>
          <input type="text" placeholder="Enter University name" name="university name" id="university" required>
          
          <label for="course"><b>Course Name</b></label>
          <input type="text" placeholder="Enter Course name" name="course name" id="course" required>
          
          <label for="course year"><b>Course year</b></label>
          <input type="text" placeholder="Enter Course Year" name="course year" id="course year" required>
          
          <label for="facebook url"><b>Facebook URL</b></label>
          <input type="text" placeholder="Enter Facebook URL" name="facebook url" id="facebook url" required>
          
          <label for="github url"><b>Github URL</b></label>
          <input type="text" placeholder="Enter Github url" name="github url" id="github url" required>
          
          <label for="linkedin url"><b>Linkedin URL</b></label>
          <input type="text" placeholder="Enter linkedin url" name="likedin url" id="linkedin url" required>
		<br><br>
          <center><a href="profile.php" class = "signup-btn" style="">&nbsp Save Profile &nbsp</a></center>
          <!--<button type="submit" class="update">UPDATE</button>-->

    
        </div>

      
      </form>
</div>
<?php 
// close while loop 
}
?>
      
      </body>
</html>
