<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- <link rel="stylesheet" href="css/about.css"> -->
    <link rel="stylesheet" href="assets/css/about.css">
    <title>about</title>
</head>
<body>
    <!-- About Page Navbar -->
    <nav>
            <div class="logo">CSPMS</div>
            <div class="menu">
             <button class="hamburger">&#9783</button>
                 <li><a href="{{ route('home') }}">Home</a></li>
                 <li><a href="{{ route('about') }}">About</a></li>
                 <!-- <li><a href="">Case Study</a></li> -->
                 <!-- <li><a href="">Support</a></li> -->
                 <!-- <li><a href="">Contact Us</a></li> -->
            </div>
      
     </nav>
        <!-- jumbotron -->
        <div class="jumbotron">
            <div class="container">
                <h1>CSPMS is the online collaborative academic workspace</h1>
                
                <p class="jumbotron-paragraph"> 
                    CSPMS  is an academic project management system that enables communication and team work between academic supervisors and students. This system is built to smoothen the communication between supervisors, students and heads of department, thereby improving the efficiency in supervision and thus enhancing the student's performance. 
                </p>
                <img class="jumbotron__pic" src="img/undraw_project_team_lc5a.svg" alt="">
                <div class="jumbotron-mission">Our Mission is to empower teams to create the next big thing</div>
            </div>
        </div>

        <!-- footer -->
        <footer>
            <div class="footertext">
                <div class="locate">
                <h2>CONTACT US</h2>
                <p class="locate__title">Locate Us</p>
                <p>3 Birrel Avenue,Sabo. Yaba, Lagos State, Nigeria</p>
                </div>
    
                <div class="hear">
                    <p class="hear__title">Hear from Us</p>
                    <p class="hear__paragraph">hello@hng.tech</p>
                    <p class="hear__number">+234 (0) 812 345 6789</p>
                </div>
    
               <div class="footer__icons">
    
               </div>
            </div>
            
            <div class="footerform">
                <h2>Message Us</h2>
                <input type="name" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="message" placeholder="Message">
                
                
                    <button>Send Message</button>
                
            </div>
        
    
        </footer>

    
</body>
</html>