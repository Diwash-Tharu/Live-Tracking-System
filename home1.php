<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="hoem.css">
    <style>
        
    </style>
</head>
<body>
    <div class="navbar">
    <a href="#" class="logo">
  <img src="logo.png" alt="Logo"style="width: 250px; height: 120px;">
</a>

    <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> Login</a>
        <a href="map.php" class="location-link">
     <i class="fas fa-map-marker-alt"></i> Location
     <a href="index.php" class="nav-link"><i class="fas fa-home"></i> Home</a>
    </div>

    <div class="container">
        <h2>Welcome To <span style="color:red">Location Tracking System</span></h2>
    </div>

    <?php
    if(isset($_SESSION['user_name']))
    {
        echo "<h1>Welcome ".$_SESSION['user_name']."</h1>";	
    }
    
   // echo $_SESSION['user_name'];
    ?>

    <div class="image">
        <img src="https://www.twi-global.com/image-library/hero/internet-of-things-iot-istock-1201992144.jpg" alt="Girl in a jacket" style="max-width: 100%; height: auto;">
    </div>
    <footer>
        <div class="footer-container">
            <div class="footer-logo" id ="diwash">
                <img src="logo.png" alt="Logo" style="width: 180px; height: 100px;">
            </div>
            <div class="social-media">
                <a href="https://www.facebook.com/diwash.chaudhary.58511"><i class="fab fa-facebook" style="color: black;"></i></a>
                <a href="https://twitter.com/Diwash21T"><i class="fab fa-twitter" style="color: black;"></i></a>
                <a href="https://github.com/Diwash-Tharu"><i class="fab fa-github" style="color: black;"></i></a>
                <a href="https://www.linkedin.com/in/diwash-tharu-4ab620246/"><i class="fab fa-linkedin" style="color: black;"></i></a>
            </div>
            <div class="footer-text">
                <p>Kathmandy, Nepal, Sankhamaul</p>
                <p>Email:t-diwash21@tbc.edu.np
                </p>
                
            </div>
            <div class="copy-right">
                &copy; 2024 Your Company. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>