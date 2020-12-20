<?php
// Initialize the session
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: userHome.php");
    exit;
}
 
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    	$username = trim($_POST["name"]);
	$password = trim($_POST["pass"]);

	if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT user_id, user_name, user_pass FROM Users WHERE user_name = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: userHome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>

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
    <link href="css/login.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script src="js/validate.js"></script> 

	<!-- Favicon  -->
    <link rel="icon" href="images/logo.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">

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
                    <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a id="loginButton" class="nav-link page-scroll" href="login.php">
                            Login &nbsp</a>
                </li>
                <li class="nav-item">
                  <span class="navbar-text">
                             <a id="signupButton" href="signup.php" style="background-color: #cf1d52; padding:9px; border-radius: 8px; text-decoration: None;">
                             <span class="fa fa-sign-in"></span>Get Started</a>
                  </span>
                </li>
            </ul>
            <span class="nav-item social-icons" style="">
                <span class="fa-stack">
                    <a href="https://github.com/Akanksha1212/UniConnectWT">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav>


<!-- end of navbar -->
    <!-- end of navigation -->
    
<div class= "login-card"> 
     <div class="image-card">
          <img src="images/details-1-office-worker.svg" alt="alternative">
          <div class="vl"></div>
          <div class="box">

      <div class="title"><b>Good to See You! <br> Login To Your Account</b></div> <br>
	
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name= "login" id="login">
       <span class="help-block" style= "color: red;" ><?php echo $username_err; ?></span>
       <span class="help-block" style= "color: red;"><?php echo $password_err; ?></span>
      <div class="inputBox">
	
	 <input type="text" name="name" id="name" required onkeyup="this.setAttribute('value', this.value);" value="">
         <label>Username</label>
	 <span class="error"><p id="name_error"></p></span>
      </div>

      <div class="inputBox">
<input type="password" name="pass" id="pass" required onkeyup="this.setAttribute('value', this.value);" value="">
         <label>Password</label>
	 <!--<span class="error"><p id="email_error"></p></span>-->
      </div>
      
      <a href="" class="passForgot">Forgot your password?</a><br><br>

      <input type="submit" name="sign-in" value="Login"> &nbsp &nbsp 
      <a href="signup.php" class = "signup-btn" style="">Get Started</a>

</form>

   </div>
 </div>
      
</div>
</body>
<?php include 'footer.php'; ?>
</html>
