<?php
include 'common/connection.php';


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="PDS is a pothole reporting platform aiming at helping authorities to locate potholes and schedule repairs. 
        Its friendly interface helps drivers check potholes before their drive. ">

    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
    <title>PDS</title>
  

    <link rel="apple-touch-icon" sizes="57x57" href="/resources/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/resources/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/resources/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/resources/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/resources/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/resources/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/resources/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/resources/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/resources/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/resources/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/resources/favicons/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="/resources/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/resources/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/resources/favicons/favicon-16x16.png" sizes="16x16">
    <!-- <link rel="manifest" href="/resources/favicons/manifest.json"> -->
    <link rel="shortcut icon" href="/resources/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/resources/favicons/mstile-144x144.png">
    <meta name="msapplication-config" content="/resources/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <script src="https://kit.fontawesome.com/e75a129428.js" crossorigin="anonymous"></script>

</head>

<body>
    <header id="head">
        <nav>
            <div class="row">
                <p class="title-logo"><b><em>PDS</em></b></p>
                <ul class="main-nav js--main-nav">
                    <li><a href="#head">Home</a></li>
                    <li><a href="#features">About Us</a></li>
                    <li><a href="signin.php">Sign in</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    
                </ul>
                <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
            </div>
        </nav>
        <div class="hero-text-box">
            <p class="title"> <b>Pothole Detection System</b><p>
            <h1>A better driving experience starts with <br>a better road condition</h1>
            
        </div>

    </header>

    <section class="section-features js--section-features" id="features">
        <div class="row">
            <h2>Who we are</h2>
            <p class="long-copy">
                We are a private company working towards improving the driving experience and quality of roads in Lebanon, through the first pothole reporting platform in the country.   
            </p>
        </div>

        <div class="row js--wp-1">
            <div class="col span-1-of-4 box">
          
            <i class="fa-solid fa-location-dot icon-big"></i>
                <h3>Covering Lebanon</h3>
                <p>
                   Worried about driving on roads that were not covered by our company? Our company is covering all the main roads used by almost 90% of the drivers in lebanon
                </p>
            </div>
            <div class="col span-1-of-4 box">
            <i class="fa-solid fa-car icon-big"></i>
                <h3>Stop Repairing</h3>
                <p>
                   Potholes causing damage to your car? Not anymore. Using our system you can find all the potholes that you will encounter on your road
                </p>
            </div>
            <div class="col span-1-of-4 box">
           
            <i class="fa-solid fa-timer "></i>
                <i class="fa-solid fa-clock icon-big"></i>
                <h3>Always Up to date</h3>
                <p>
                    Worried that new potholes are not signalled to you? Our system performs search on a periodic basis to provide you with the updates needed
                </p>
            </div>
            <div class="col span-1-of-4 box">
                <i class="fa-solid fa-handshake-angle icon-big"></i>
                <h3>Assistance 24/7</h3>
                <p>
                    We don't limit our help by prividing you with some data. Our team aims to provide you with the best technical support 24/7.
                </p>
            </div>
        </div>
    </section>

    <!-- <section class="section-meals">
        <ul class="meals-showcase clearfix">
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/pot1.jpeg" alt="Korean bibimbap with egg and vegetables">
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/pot2.jpeg" alt="Simple italian pizza with cherry tomatoes">
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/pot3.jpeg" alt="Chicken breast steak with vegetables">
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/pot4.jpeg" alt="Autumn pumpkin soup">
                </figure>
            </li>
        </ul>
        <ul class="meals-showcase clearfix">
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/pot5.jpeg" alt="Paleo beef steak with vegetables">
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/pot6.jpeg" alt="Healthy baguette with egg and vegetables">
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/pot7.jpeg" alt="Burger with cheddar and bacon">
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/pot8.jpeg" alt="Granola with cherries and strawberries">
                </figure>
            </li>
        </ul>
    </section> -->


    <section class="section-steps" id="works">
        <div class="row">
            <h2>How it works &mdash; Simple as 1, 2, 3</h2>
        </div>
        <div class="row">
            <div class="col span-1-of-2 steps-box">
                <img src="resources/img/phoneapp.png" alt="Omnifood app on iPhone" class="app-screen js--wp-2">
            </div>
            <div class="col span-1-of-2 steps-box">
                <div class="works-step clearfix">
                    <div>1</div>
                    <p>Open our website, create your personal account and sign in </p>
                </div>
                <div class="works-step clearfix">
                    <div>2</div>
                    <p>Check latest reported potholes, and take care when you hit the road. </p>
                </div>
                <div class="works-step clearfix">
                    <div>3</div>
                    <p>Contribute yourself to reporting potholes.</p>
                </div>

                <!-- <a href="#" class="btn-app"><img src="resources/img/download-app.svg" alt="App Store Button"></a>
                <a href="#" class="btn-app"><img src="resources/img/download-app-android.png"
                        alt="Play Store Button"></a> -->
            </div>
        </div>
    </section>

    <!-- <section class="section-cities" id="cities">
        <div class="row">
            <h2>We these cities</h2>
        </div>
        <div class="row js--wp-3">
            <div class="col span-1-of-4 box">
                <img src="resources/img/beirut.png" alt="Lisbon">
                <h3>Beirut</h3>
                <div class="city-feature">
                    <i class="ion-ios-person icon-small"></i>
                    3600+ customers
                </div>
                <div class="city-feature">
                    <i class="ion-ios-star icon-small"></i>
                    180+ employee
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="#">@pdsbeirut</a>
                </div>
            </div>
            <div class="col span-1-of-4 box">
                <img src="resources/img/jezzine.jpeg" alt="San Francisco">
                <h3>Jezzine</h3>
                <div class="city-feature">
                    <i class="ion-ios-person icon-small"></i>
                    1700+ customers
                </div>
                <div class="city-feature">
                    <i class="ion-ios-star icon-small"></i>
                    60+ employee
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="#">@pdsjezzine</a>
                </div>
            </div>
            <div class="col span-1-of-4 box">
                <img src="resources/img/jbeil.png" alt="Berlin">
                <h3>Berlin</h3>
                <div class="city-feature">
                    <i class="ion-ios-person icon-small"></i>
                    900+ customers
                </div>
                <div class="city-feature">
                    <i class="ion-ios-star icon-small"></i>
                    80+ employee
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="#">@pdsjbeil</a>
                </div>
            </div>
            <div class="col span-1-of-4 box">
                <img src="resources/img/zahle.jpeg" alt="London">
                <h3>Zahle</h3>
                <div class="city-feature">
                    <i class="ion-ios-person icon-small"></i>
                    2200+ customers
                </div>
                <div class="city-feature">
                    <i class="ion-ios-star icon-small"></i>
                    120+ top chefs
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="#">@pdszahle</a>
                </div>
            </div>
        </div>

    </section> -->

    <section class="section-testimonials">
        <div class="row">
            <h2>Our customers' feedbacks</h2>
        </div>
        <div class="row">
                
            <?php
                $sql = "SELECT uname,content FROM feedback ORDER BY RAND() LIMIT 3";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

            ?>  
            <div class="col span-1-of-3">
            <blockquote>
            
            <?php echo $row['content']; ?>
                    <cite>USER: <?php echo $row['uname']; ?></cite>
            <?php ?>
            </blockquote>
            </div>
            <?php?>
            <?php }}?>
           
        </div>
            
    </section>


   

    <section class="section-form" id="contact">
        <div class="row">
            <h2>We're happy to hear from you</h2>
        </div>
        <div class="row">
            <form method="post" action="index.php" class="contact-form">
                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="name">Name</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="text" name="username" id="name" placeholder="Your name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="email">Email</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="email" name="email" id="email" placeholder="Your email" required>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col span-1-of-3">
                        <label>Drop us a line</label>
                    </div>
                    <div class="col span-2-of-3">
                        <textarea name="message" placeholder="Your message"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-3">
                        <label>&nbsp;</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="submit" value="Send it!">
                    </div>
                </div>

            </form>

        </div>
    </section>

    <footer>
        <div class="row">
            <div class="col span-1-of-2">
                <ul class="footer-nav">
                    <li><a href="#head">Home</a></li>
                    <li><a href="#features">About us</a></li>
                    <li><a href="signin.php">Sign in</a></li>
                    <li><a href="#works">How It Works</a></li>
                    
                </ul>
            </div>
            <div class="col span-1-of-2">
                <ul class="social-links">
                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <p>
                Copyright &copy; 2022 by HRR. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
    <script src="vendors/js/jquery.waypoints.min.js"></script>
    <script src="resources/js/script.js"></script>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
                m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-61026110-2', 'auto');
        ga('send', 'pageview');

    </script>

</body>

</html>