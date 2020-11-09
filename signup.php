<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty(trim($_POST["name"]))) {
	$sql = "SELECT user_id FROM Users WHERE user_name = ?";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
	            echo $username_err;
                } else{
                    $username = trim($_POST["name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
$stmt->close();
        }
}
	//if(strlen(trim($_POST["pass"])) < 6){
        //$password_err = "Password must have atleast 6 characters.";
    //} else{
        $password = trim($_POST["pass"]);
    //}

$phone_number= trim($_POST["phone"]);
$first_name= trim($_POST["fname"]); 
$last_name= trim($_POST["lname"]);  
$email_address= trim($_POST["email"]);


	// Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO Users (user_name, first_name, last_name, user_pass, email, phone) VALUES (?, ?, ?, ?, ?, ?)";
      
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss", $param_username, $param_fname, $param_lname, $param_password, $param_email, $param_phone);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
	    $param_fname = $first_name;
	    $param_lname = $last_name;
	    $param_phone = $phone_number;
	    $param_email = $email_address;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
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
    <link href="css/signup.css" rel="stylesheet">
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
                             <a id="signupButton" href="login.php" style="background-color: #cf1d52; padding:9px; border-radius: 8px; text-decoration: None;">
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
          <img src="images/7959.jpg" alt="alternative">
          <div class="vl"></div>
          <div class="box">

      <div class="title"><b>Welcome Folk! <br> Create Your Account</b></div> <br>
<form method="post" name= "login" id="login" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="inputBox">
	 <input type="text" name="fname" id="fname" required onkeyup="this.setAttribute('value', this.value);" value="">
         <label>First Name</label>
      </div>
      <div class="inputBox">
	 <input type="text" name="lname" id="lname" required onkeyup="this.setAttribute('value', this.value);" value="">
         <label>Last Name</label>
      </div>
      <div class="inputBox">
	 <input type="text" name="email" id="email" required onkeyup="this.setAttribute('value', this.value);" value="">
         <label>Email Address</label>
      </div>
      <div class="inputBox">
	 <input type="text" name="phone" id="phone" required onkeyup="this.setAttribute('value', this.value);" value="">
         <label>Phone Number</label>
      </div>
      <div class="inputBox">
	 <input type="text" name="name" id="name" required onkeyup="this.setAttribute('value', this.value);" value="">
         <label>Username</label>
      </div>

      <div class="inputBox">
<input type="password" name="pass" id="pass" required onkeyup="check();" value="">
         <label>Password</label>
      </div>
<div class="inputBox">
<input type="password" name="confirm_password" id="confirm_password" required onkeyup="check();" value="">

         <label>Confirm Password <span id='message' style= "display:block;
 line-height: 0; font-size:15px;"></span>
</label>

      </div>
      
      <span style= "font-size: 15px; ">By clicking Sign Up, you agree to our Privacy Policy</span><br>

      <input type="submit" name="sign-in" value="Sign Up" > &nbsp &nbsp 
      <a href="login.php" class = "signup-btn" style="">&nbsp Login &nbsp</a>

</form>

   </div>
 </div>
</div>
<br>
<?php include 'footer.php'; ?>
</body>
</html>
