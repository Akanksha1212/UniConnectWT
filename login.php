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
<form method="post" action="userhome.php" name= "login" id="login">
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
</html>
