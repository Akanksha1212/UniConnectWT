 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Channel Posts</title>
    
 <!-- Styles -->

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/post.css" rel="stylesheet">
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
<script>
	$(document).ready(function(){

	  $('a#reply').click(function(){
	  $("#box1").fadeIn('slow');
	  $('#replyform').fadeIn('slow');
		});

	  $('#cancel1').click(function(){
	  $('#box1,#replyform').hide();
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
	<ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                       <a class="nav-link page-scroll" href="userHome.php">Dashboard</a>
                   </li>
                </ul>
	    <?php
		$sql    = "SELECT * FROM Users where user_id= $session_id";
		$result = mysqli_query($mysqli, $sql);
	?>
	<?php
	while ($rows = mysqli_fetch_array($result)) { 			    
	?>
	<a id="create" href="#" style="background-color: #cf1d52; padding:9px; border-radius: 8px; text-decoration: None; color: white; position: absolute; left: 1350px; top: 42%; font-weight: bold; height:40px;">Create New Post</a>
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
<?php
                $ch_id = $_GET['id'];
		$sql    = "SELECT * FROM Channels where ch_id= $ch_id";
		$result = mysqli_query($mysqli, $sql);
	?>
	<?php
	while ($rows = mysqli_fetch_array($result)) { 			    
	?>
<h4 style= "color: #cf1d52;"><b>#<?php echo $rows['ch_name'] ?></b></h4> 
<?php } ?>
<?php

	$sql = "SELECT * FROM Posts LEFT JOIN Users ON Posts.post_by = Users.user_id WHERE Posts.post_ch= $ch_id";
        $result = mysqli_query($mysqli, $sql);
        while ($rows = mysqli_fetch_array($result)) { 	
?>
<div>
	<hr>
	<h6><b><?php echo $rows['first_name']. " " .$rows['last_name']?></b>&nbsp; &nbsp; &nbsp; &nbsp; <?php echo date('d-m-Y', strtotime($rows['post_date'])); ?> at <?php echo date('h:i',strtotime($rows['post_date'])); if(date('H:i',strtotime($rows['post_date']))>12) { echo 'pm'; } else { echo 'am'; } ?></h6>
	<p><b><?php echo $rows['post_subject']?></b><br> <?php echo $rows['post_content']?> </p> 
<a id="reply" href="#"><i class="fa fa-reply" aria-hidden="true"> Add reply</i> </a>
</div>
<?php } ?>
</div>


<div id="box1" class="box" align="center"></div>
        <form id ="replyform" method="post" action="#">

        <b><span style= "color: #cf1d52; font-size: 30px;"><center>Replies</center></span></b><br>
	
        <br><b>Content</b><br>
        <textarea name="t_content" required></textarea><br><br>
        
 <?php
if (isset($_POST['submit1'])) {
        
        $reply_content = $_POST['reply_content'];
        $reply_ch = $_POST['reply_ch'];
        $reply_post = $_POST['reply_post'];
    //the form has been posted, so save it
    $sql = "INSERT INTO Replies (reply_content,reply_date, reply_ch,reply_by,reply_post)
       VALUES('$reply_content',now(),'$reply_ch',".$_SESSION["id"].",'$REPLY_POST')";
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
?><br>
        <center><input type="submit"  name= "submit1" value="Send" class="btn"/> &nbsp; &nbsp;
        <button type="button" id="cancel1" class="btn">Cancel</button></center>
        </form>


<!-- end of login card-->
   



  
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
                       <option value="<?php echo $row['ch_id'];?>"><?php echo $row['ch_name'];?></option>
                     <?php 
	                    }
	                    ?>
                </select><br><br>
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

