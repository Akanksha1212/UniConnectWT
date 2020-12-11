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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
	    <?php
		$sql    = "SELECT * FROM Users where user_id= $session_id";
		$result = mysqli_query($mysqli, $sql);
	?>
	<?php
	while ($rows = mysqli_fetch_array($result)) { 			    
	?>
	<a id="create" href="#" style="background-color: #cf1d52; padding:9px; border-radius: 8px; text-decoration: None; color: white; position: absolute; left: 1440px; top: 42%; font-weight: bold; height:40px;">Create New Post</a>
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
             </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->
</div>
<div id="box" class="box" align="center"></div>
        <form method="post" action="#">

        <b><span style= "color: #cf1d52; font-size: 30px;"><center>Create New Post</center></span></b><br>
	<b>Subject</b><br>
        <input type="text" name="post_subject" required/><br>
        <br><b>Content</b><br>
        <textarea name="post_content" required></textarea><br><br>
        <select name="post_ch">;
 <?php
		                    $sql = "SELECT
                                ch_id,
                                ch_name,
                                ch_description
                            FROM
                                Channels";
                     
                    $result = mysqli_query($mysqli, $sql);
                      
	                    ?>
                   <?php while($row = mysqli_fetch_array($result))
                    {?>
                       <option value="<?php echo $row['ch_id'];?>"><?php echo $row['ch_name'];?></option>;
                     <?php 
	                    }
	                    ?>
                </select>;
        <center><input type="submit"  name= "submit" value="Create" class="btn"/> &nbsp; &nbsp;
        <button type="button" id="cancel" class="btn">Cancel</button></center>
        </form>
<?php
if (isset($_POST['submit'])) {
        $post_subject  = $_POST['post_subject'];
        $post_content = $_POST['post_content'];
        $post_ch = $_POST['post_ch'];
    //the form has been posted, so save it
    $sql = "INSERT INTO Posts (post_subject, post_content,post_date, post_ch,post_by)
       VALUES('$post_subject','$post_content',now(),'$post_ch',".$_SESSION["id"].")";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    
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
