<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to User Home</title>
    
 <!-- Styles -->

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/userHome.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <script>
	$(document).ready(function(){

	  $('a#create').click(function(){
	  $("#box").fadeIn('slow');
	  $('form').fadeIn('slow');
		});

	  $('#cancel').click(function(){
	  $('#box,form').hide();
		});
	}); 
    </script>
<body>
<?php
// Initialize the session
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
	<a id="referral" href="referral.php" style="background-color: #cf1d52; padding:9px; border-radius: 8px; text-decoration: None; color: white; position: absolute; left: 1260px; top: 42%; font-weight: bold; height:40px;">Referral Portal</a>
	    <?php
		$sql    = "SELECT * FROM Users where user_id= $session_id";
		$result = mysqli_query($mysqli, $sql);
	?>
	<?php
	while ($rows = mysqli_fetch_array($result)) { 		    
	?>
	<a id="create" href="#" style="background-color: #cf1d52; padding:9px; border-radius: 8px; text-decoration: None; color: white; position: absolute; left: 1440px; top: 42%; font-weight: bold; height:40px;">Create New Channel</a>
	<div class="dropdown">
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
            <div class="col">
                <div class="col-lg-12">
			<h4>Hi! <b><?php echo $_SESSION["name"] ?></b>. Welcome to UniConnect!</h4>
                    <img src ="images/uni.png">
                    
<br>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
             <div class="col">
                <div class="col-lg-12">
                    
                 
                   
                    <div>
                    <?php
		                $sql = "SELECT
                                ch_id,
                                ch_name,
                                ch_description
                            FROM
                                Channels";
                     
                    $result = mysqli_query($mysqli, $sql);
                      
	                    ?>
	                    <?php
	                    while ($rows = mysqli_fetch_array($result)) { 			    
	                    ?>
<br>
	                     <div class="channel channel-1">
                                           <a href="post.php?id= <?php echo $rows['ch_id']; ?>">
                           
                       
                                            <img src="images/services-icon-1.svg" alt="alternative">
                                            <div class="">
                                                <h4 class="">#<?php echo $rows['ch_name'];?></h4>
                                                <p><?php echo $rows['ch_description'];?></p>
                                            </div>
                                        </a>
                               </div>
                                    
	                    <?php 
	                    }
	                    ?>



                    </div>
 

                    

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->
</div>
<div id="box" class="box" align="center"></div>
        <form method="post" action="#">
        <b><span style= "color: #cf1d52; font-size: 30px;"><center>Create New Channel</center></span></b><br>
	<b>Channel Name</b><br>
        <input type="text" name="ch_name" required/><br>
        <br><b>Channel Description</b><br>
        <textarea name="ch_description" required></textarea><br><br>
        <center><input type="submit"  name= "submit" value="Create" class="btn"/> &nbsp; &nbsp;
        <button type="button" id="cancel" class="btn">Cancel</button></center>
        </form>
<?php
if (isset($_POST['submit'])) {
        $ch_name  = $_POST['ch_name'];
        $ch_description = $_POST['ch_description'];
    //the form has been posted, so save it
    $sql = "INSERT INTO Channels (ch_name, ch_description, user_ch)
       VALUES('$ch_name','$ch_description',".$_SESSION["id"].")";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    var_dump($result);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' . mysqli_error($mysqli);
    }
    else
    { ?>
      <script type="text/javascript">
            alert("Creation Successful!");
            window.location = "userHome.php";
        </script>
<?php
    }
}
?>
</body>
</html>
