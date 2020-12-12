<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Referral Portal</title>
    
 <!-- Styles -->

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/referral.css" rel="stylesheet">
    <link rel="icon" href="images/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
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

<div class= "login-card"> 
<h4 style= "text-align:center; color: #cf1d52;"><b>Referral Portal</b></h4>
<div class="wrap">
<div class="search">
      <form method="POST" action= "#">
        <input type="text" autocomplete="off" placeholder="Search Company..." name= "company" class= "searchTerm">
	<button type= "submit" name="submit" class= "searchButton"><i class="fa fa-search"></i></button>
	<div class="result"></div></form>
</div>
</div>
<?php
if (isset($_POST['submit'])) {
        $company  = $_POST['company'];

    //the form has been posted, so save it
    $sql = "SELECT * FROM Referral WHERE company= '$company'";
    $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' . mysqli_error($mysqli);
    }
    else if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result)){
                    echo "<br><br><p>" . $row["name"] . "</p>";
		    echo "<p>" . $row["company"] . "</p>";
		    echo "<p>" . $row["position"] . "</p>";
		    echo "<p>" . $row["location"] . "</p>";
		    echo "<p>" . $row["email"] . "</p>";
		    echo "<p>" . $row["linkedin_url"] . "</p>"; } 
	}
    else{
                echo "<p>No matches found</p>";
      }
}
?>
</div>
</body>
</html>


