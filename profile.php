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
				    <br>
                                    <span style= "font-size: 40px;">
                                        <b><?php echo $rows['first_name']." ".$rows['last_name']; ?></b>
                                    </span>
                             	    <span style= "color: #cf1d52;">
                                        <?php echo "(@".$rows['user_name'].")"; ?>  
                                    </span>
				   <br>
				    <span class="profile-rating"><i><?php echo $rows['bio']; ?></i></span><br>
				    <span style= "color: black;" ><?php echo $rows['email']; ?></span>
    </div>
</div>

    <form action="#" method="post">
        <div class="container" style="padding: 50px;">
          <h1>Profile Information</h1>
          <p>Please Edit your details and press <b>Save Profile</b> button.</p>
          <hr>
      
          <label for="first name"><b>First Name</b></label>
          <input type="text" value="<?php echo $rows['first_name']; ?>" name="first_name" id="first" required>
         
          <label for="last name"><b>Last Name</b></label>
          <input type="text" value="<?php echo $rows['last_name']; ?>" name="last_name" id="last" required>

	  <label for="bio"><b>Bio</b></label>
          <input type="text" placeholder="Enter Bio" value="<?php echo $rows['bio']; ?>" name="bio" id="bio" >
          
          <label for="phone num"><b>Phone Number</b></label>
          <input type="text" value="<?php echo $rows['phone']; ?>" name= "phone" id="phone" required>
          
          <label for="country"><b>Country Name</b></label>
          <input type="text" placeholder="Enter Country name" value="<?php echo $rows['country']; ?>" name="country" id="country">
          
          <label for="state"><b>State Name</b></label>
          <input type="text" placeholder="Enter State name" value="<?php echo $rows['state']; ?>" name="state" id="state">
          
          <label for="University name"><b>University Name</b></label>
          <input type="text" placeholder="Enter University name" value="<?php echo $rows['university']; ?>" name="university" id="university">
          
          <label for="course"><b>Course Name</b></label>
          <input type="text" placeholder="Enter Course name" value="<?php echo $rows['course']; ?>" name="course" id="course">
          
 	  <label for="course"><b>Course Year</b></label><br>
          <select name="course_year" style=" margin-bottom: 20px; width: 300px; padding: 5px 35px 5px 5px; font-size: 24px; height: 50px; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: url(images/down-arrow.png) 96% / 7% no-repeat #f1f1f1; color: dark grey;">
    	  <option value="" selected="selected">Select Course year &nbsp &nbsp &nbsp</option>
	  <option value="1st" <?php if($rows['course_year']=="1st"){echo "selected";} ?> >1st</option>
	  <option value="2nd" <?php if($rows['course_year']=="2nd"){echo "selected";} ?> >2nd</option>
	  <option value="3rd" <?php if($rows['course_year']=="3rd"){echo "selected";} ?> >3rd</option>
	  <option value="4th" <?php if($rows['course_year']=="4th"){echo "selected";} ?> >4th</option>
  	  </select><br>
           
          <label for="facebook url"><b>Facebook URL</b></label>
          <input type="text" placeholder="Enter Facebook URL" value="<?php echo $rows['facebook_url']; ?>" name="facebook_url" id="facebook url" >
          
          <label for="github url"><b>Github URL</b></label>
          <input type="text" placeholder="Enter Github url" value="<?php echo $rows['github_url']; ?>" name="github_url" id="github url" >
          
          <label for="linkedin url"><b>Linkedin URL</b></label>
          <input type="text" placeholder="Enter linkedin url" value="<?php echo $rows['linkedin_url']; ?>" name="linkedin_url" id="linkedin url">
		<br><br>
	  <center><input type="submit" name="submit" value="Save Profile" class="signup-btn"></center>
          <!--<center><a href="profile.php" class = "signup-btn" style="">&nbsp Save Profile &nbsp</a></center>-->
          <!--<button type="submit" class="update">UPDATE</button>-->

    
        </div>

      
      </form>
</div>
<?php 
// close while loop 
}
?>

<?php
      if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
	$bio = $_POST['bio'];
	$state = $_POST['state'];
	$university = $_POST['university'];
	$course = $_POST['course'];
	$course_year = $_POST['course_year'];
	$bio = $_POST['bio'];
	$facebook_url = $_POST['facebook_url'];
	$github_url = $_POST['github_url'];
	$linkedin_url = $_POST['linkedin_url'];
      $query = "UPDATE Users SET first_name = '$first_name',
                       last_name= '$last_name', country= '$country', phone='$phone', bio= '$bio', state= '$state', university= 		        		       '$university', course= '$course', course_year= '$course_year', facebook_url= '$facebook_url',github_url='$github_url', 			       linkedin_url= '$linkedin_url', bio= '$bio'
                      WHERE user_id = '$session_id'";
                    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "profile.php";
        </script>
        <?php
             }
            
?>
<!--<?php echo $rows['course_year'];?> -->
      
      </body>
</html>
