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
                       <a class="nav-link page-scroll" href="#userhome.php">Home</a>
                   </li>
                   <li class="nav-item">
                     <a id="logoutbutton" class="nav-link page-scroll" href="logout.php">
                               Logout &nbsp</a>
                   </li>
                </ul>
            </div>
            
      </nav>    
      
    <div class="profile-card" >
        <div class="image-container">
            <img class="img-fluid" src="images/team-member-1.svg" alt="alternative" style="width:100%">
        </div>

    </div>

    <form action="action_page.php">
        <div class="container">
          <h1>Profile Information</h1>
          <p>Please fill  this form to create your profile.</p>
          <hr>
      
          <label for="first name"><b>First Name</b></label>
          <input type="text" placeholder="Enter First name" name="first name" id="first" required>
         
          <label for="last name"><b>Last Name</b></label>
          <input type="text" placeholder="Enter Last name" name="last name" id="last" required>
          
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
          
          <label for="phone num"><b>Phone Number</b></label>
          <input type="text" placeholder="Enter Phone num" name="phone num" id="phone" required>
          
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

          <button type="submit" class="registerbtn">CREATE</button>
          <button type="submit" class="update">UPDATE</button>

    
        </div>

      
      </form>
      
      </body>
</html>
