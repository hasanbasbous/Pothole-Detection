<html>

<?php 
    require 'common/connection.php';
    session_start();
    if(isset($_POST['message'])){
        $msg =  $_POST['message'];
        $uname = ($_SESSION['username']);
        $uid = $_SESSION['userId'];
        echo($msg);
        // echo($uname);
        // echo($uid);
        $query="INSERT INTO feedback (content, uid, uname) VALUES ('$msg', '$uid','$uname')";
        $result = $conn->query($query);
        if($result){
            echo "<script>alert('Successfully Sent Feedback')</script>";
        } else {
            // echo "<script>alert('Something went wrong, please try again.')</script>";
            die(mysqli_error($conn));
        }
    }


?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Omnifood is a premium food delivery service with the mission to bring affordable and healty meals to as many people as possible.">

    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <title>Manual Report</title>
</head>
<body>
    <header id="head">
        <nav>
            <div class="row">
                <p class="title-logo"><b><em>PDS</em></b></p>
                <ul class="main-nav js--main-nav">
                    <li><a href="pothole_table.php">All reports</a></li>
                    <li><a href="report_manually.php">Report Pothole</a></li>
                    <li><a href="logout.php">Sign out</a></li>
                    <li><a href="feedback.php"> Send Feedback </a></li>
                    
                </ul>
                <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
            </div>
        </nav>
        <div class="hero-text-box" style="width:100%;">
            <p class="title"> <b>Pothole Detection System</b><p>
            <h1>A better driving experience starts with <br>a better road condition</h1>
            
        </div>

    </header>
    <section class="section-form" id="contact">
        <div class="row">
            <h2>Enter your feedback</h2>
        </div>
        <div class="row">
            <form method="post" action="feedback.php" class="contact-form">
                <!-- <div class="row">
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
                </div> -->
                
                
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
</body>
</html>