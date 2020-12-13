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
    <link href="css/reply.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    
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
                $p_id  = $_GET['p_id'];
		$sql    = "SELECT * FROM Channels where ch_id= $ch_id";
		$result = mysqli_query($mysqli, $sql);
	?>
	<?php
	while ($rows = mysqli_fetch_array($result)) { 			    
	?>
<h4 style= "color: #cf1d52;"><b>#<?php echo $rows['ch_name'] ?></b></h4> 
<?php } ?>
<?php

	$sql = "SELECT * FROM Posts JOIN Users ON Posts.post_by = Users.user_id WHERE Posts.post_ch= $ch_id AND Posts.post_id=$p_id;";
        $result = mysqli_query($mysqli, $sql);
        while ($rows = mysqli_fetch_array($result)) { 	
?>
<div>
	<hr>
 
	<h6><b><?php echo $rows['first_name']. " " .$rows['last_name']?></b>&nbsp; &nbsp; &nbsp; &nbsp; <?php echo date('d-m-Y', strtotime($rows['post_date'])); ?> at <?php echo date('h:i',strtotime($rows['post_date'])); if(date('H:i',strtotime($rows['post_date']))>12) { echo 'pm'; } else { echo 'am'; } ?></h6>

	<p><b><?php echo $rows['post_subject']?></b><br> <?php echo $rows['post_content']?> </p> &nbsp; &nbsp; 
 <?php } ?>
<hr>

<?php

	$sql = "SELECT * FROM Replies JOIN Users ON Replies.reply_by = Users.user_id JOIN Posts ON Replies.reply_post = Posts.post_id WHERE Posts.post_ch= $ch_id AND Posts.post_id= $p_id;";

        $result = mysqli_query($mysqli, $sql);
        while ($rows = mysqli_fetch_array($result)) { 	
?>
<h6><b><?php echo $rows['first_name']. " " .$rows['last_name']?></b>&nbsp; &nbsp; &nbsp; &nbsp; <?php echo date('d-m-Y', strtotime($rows['reply_date'])); ?> at <?php echo date('h:i',strtotime($rows['reply_date'])); if(date('H:i',strtotime($rows['reply_date']))>12) { echo 'pm'; } else { echo 'am'; } ?></h6>
<p><?php echo $rows['reply_content']?></b><br></p>

    <?php } ?>
   <form method="post" action="#">
       <textarea name="reply_content" required></textarea><br><br>
        <input type="submit"  name= "submit" value="Add reply" class="btn"/> &nbsp; &nbsp;
       </form>
<?php
if (isset($_POST['submit'])) {
        $reply_content = $_POST['reply_content'];
       
        
    //the form has been posted, so save it
    $sql = "INSERT INTO Replies (reply_content,reply_date, reply_ch,reply_by,reply_post)
       VALUES('$reply_content',now(),'$_GET[id]',".$_SESSION["id"].",'$_GET[p_id]')";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' . mysqli_error($mysqli);
    }
    else
    { ?>
      <script type="text/javascript">
    var cid = <?php echo json_encode($ch_id); ?>;
    var pid = <?php echo json_encode($p_id); ?>;
            
            window.location.href = "reply.php?id="+cid+"&p_id="+pid;
        </script>
<?php
    }
}
?>
       
</div>

</div>

  

</body>
</html>


