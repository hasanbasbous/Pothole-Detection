<?php
require 'common/connection.php';
// include 'test.php';
set_time_limit(300);
session_start();
$_SESSION['detection_status'] = "0";
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
}
// echo($_SESSION['userId']);
// if (!isset($_SESSION['username'])) {
//     header("Location: report_manually.php");
// }

$image_name = "blank.jpg";
$filename = "detection_output.txt";
$detection_status = null;
if(isset($_POST["submit"])){
    $category = $_POST["category"];
    $comment = $_POST["comment"];
    $image = $_FILES["image"]["name"];
    $longitude = $_POST["longitude"];
    $latitude = $_POST["latitude"];
    $address = $_POST["address"];

    $open = fopen('imgCount.txt', 'r');
    if($open){
        $filecount = intval(fread($open, 10)) + 1;
    }
    fclose($open);
    // echo $filecount; working

    // $directory = getcwd()."/manual_reported_images/";
    // $file = glob($directory.'*');
    // $filecount = count($file)+1;
    $image_name="pothole".$filecount .".jpg";
    $userId = $_SESSION['userId'];
    // $query = "INSERT INTO potholes (latitude, longitude, img, category, comment, userId) VALUES('$latitude', '$longitude','$image_name','$category', '$comment', '$userId')";
    // $result = $conn->query($query);
    // if($result){
            // move_uploaded_file($_FILES['image']['tmp_name'],"manual_reported_images/$image_name");
    // }
    

    // Uncomment to run pothole detection model
    if(move_uploaded_file($_FILES['image']['tmp_name'],"manual_reported_images/$image_name"))
        exec('start detect_pothole.bat ' . $image_name);
            $f = fopen($filename, 'r');
            if($f){
                $detection_status = fread($f, 1); //1 is the number of bytes   
                $_SESSION['detection_status'] = $detection_status; 
                fclose($f);
            }
            // echo"<script>console.log('Inside object detection')</script>";
            
        
    // echo "<script> console.log('finished executing model') </script>";

    if($detection_status == "0"){
        // echo "<script> console.log('Evaluating detection status 0') </script>";
        echo "<script> alert('No detected potholes in the uploaded image')</script>"; 
        if(!unlink("manual_reported_images/$image_name")){
            echo("Error in deleting image");
        } else {
            $_POST["submit"] = null;
            // echo "<script>location.reload()</script>";
        }
    } else if ($detection_status == "1"){
        echo "<script> alert('Successfully reported pothole')</script>"; 
        $query = "INSERT INTO potholes (latitude, longitude, img, category, comment, address, userId) VALUES('$latitude', '$longitude','$image_name','$category', '$comment', '$address', '$userId')";
        $result = $conn->query($query);
        $f = fopen('imgCount.txt', 'w');
        fwrite($f, $filecount);
        fclose($f);
    }
        
        
    // $image_name="./manual_reported_images/".$image_name; 

    // echo "<script>loadImage()</script>";
    // $image_name="./manual_reported_images/".$image_name;
    // echo '<img src="'.$image_name.'">';

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Manual Report">

    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="styles/report.css">
    <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <title>Manual Report</title>
    <style>
            #loader {
                border: 12px solid #f3f3f3;
                border-radius: 50%;
                border-top: 12px solid #444444;
                width: 70px;
                height: 70px;
                animation: spin 1s linear infinite;
                visibility: hidden;
            }
          
            @keyframes spin {
                100% {
                    transform: rotate(360deg);
                }
            }
            
            .center {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }
            /* @media (max-width:1376px) {
                .left, .right{
                    float: none;
                    width: 100%;
                }
            }  */
            * {
            box-sizing: border-box;
        }
            .row1{
            margin-left: 1px;
            margin-right: 1px;
        }

        .left, .right {
            padding: 10px;
        }
        .left {
            float: left;
            width: 40%;
        }

        .right {
            float: right;
            width: 60%;
            position: sticky;
            top: 1px;
        }

        .row1:after {
            content: "";
            display: table;
            clear: both;
        }

        @media (max-width:1376px) {
            .left, .right{
                float: none;
                width: 100%;
            }
            .hero-text-box{
                /* display: none; */
                z-index: -1;
                /* visibility: hidden; */
            }
        
        }
        </style>
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
                        <?php if($_SESSION['role'] == 0) : ?>
                            <li><a href="feedback.php"> Send Feedback </a></li>
                        <?php endif; ?>
                        
                    </ul>
                    <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
                </div>
            </nav>
            <div class="hero-text-box" style="width:100%; ">
                <p class="title"> <b>Pothole Detection System</b><p>
                <h1>A better driving experience starts with <br>a better road condition</h1>
                
            </div>

        </header>
        <div id="loader" class="center"></div>
        <div class ="row1">
            <div class="column left" >
                <form class="myForm" id="form" action="report_manually.php" method="POST" enctype="multipart/form-data">
                    <!-- <fieldset> -->
                        <legend> Manual Report </legned>
                        <div class="control-group">
                            <label for="">Category</label> 
                            <div>
                                <input type="radio" name="category" value="small"> Small <br>
                                <input type="radio" name="category" value="mdeium"> Medium <br>
                                <input type="radio" name="category" value="large"> Large <br>
                                <br><small></small>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="">Comment</label>
                            <div>
                            <input type="text" name="comment" required value="">
                            <br><small></small>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="">Image</label>
                            <div>
                                <input class="file-upload-input" type="file" name="image" id="image" onchange="readURL(this)" accept="Image/*">
                                <br><small></small>
                                <img id="pothole_image" src="#" alt="your image" />
                            </div>
                            <!-- <div>
                                <form action="test.php" method="POST">
                                    <button type="submit" name="show_detection">Locate Pothole</button>
                                </form>
                            </div> -->
                        </div>
                        <div class="control-group">
                            <label for="">Location</label> <br> 
                            <div>
                                <!-- <input type="text" name="latitude" value="">
                                <input type="text" name="longitude" value=""><br>
                                <input type="text" name="address" value=""><br>
                                <br><small></small> -->
                                <label for="">Use my location <button type="button" id="myCheck" onclick="getLocation()">My location </button></label><br>
                                <label for="">Address <input id="map-search" name = "address" class="controls" type="text" placeholder="Search Box"></label><br>
                                <label for="">Latitude <input type="text" id="lat" name="latitude"></label>
                                <label for="">Longitude <input type="text" id="lng" name="longitude"></label>
                                <!-- <label for="">City <input type="text" class="reg-input-city" placeholder="City"></label> -->
                            </div>
                        </div>
                        <div class="form-action">
                            <button type="submit" name="submit" id="submitBtn" style="margin-left:15px;">Submit</button>
                        </div>
                    <!-- </fieldset> -->
                </form>
                <!--  -->
                <img id="myImg" src="<?="manual_reported_images/".$image_name?>" alt="Pothole" style="width:100%;max-width:300px; visibility: hidden;">

                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>
            </div>
            <div class="column right">
            <!-- <h1>My First Google Map</h1> -->
                <div id="map" style="width:100%; height:80vh;">TEST</div>
            </div>
            <!-- <div id="map" class="column right" style="width:100%; height:80vh;"></div> -->
    </div>
    <!-- style="float:left;width:60%;height:600px;top:0;" -->
    

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        var submitBtn = document.getElementById("submitBtn");
        submitBtn.addEventListener('click', function(event) {
            setTimeout(function() {
                event.target.disabled = true;
            }, 0);

            document.querySelector(
                ".row1").style.visibility = "hidden";
            document.querySelector(
            "#map").style.visibility = "hidden";  
            document.querySelector(
            "#loader").style.visibility = "visible"; 
            document.getElementById("loader").scrollIntoView()
        })
        var modal = document.getElementById("myModal");

            // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            console.log(img.src)
            modal.style.display = "block";
            modalImg.src = img.src;
            captionText.innerHTML = img.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            modal.style.display = "none";
        }

        window.onload = function() {
            document.querySelector("#loader").style.visibility = "hidden";
            // document.querySelector("form").scrollIntoView();
        
            

            var detection_status = '<?=$_SESSION['detection_status']?>';
            console.log(typeof(detection_status));
            console.log("detection_status " + detection_status)
            // && (detection_status != "0")
            if (img.src != "http://localhost/pds/manual_reported_images/blank.jpg" && (detection_status != "0")){   
                console.log("Entered if condition for the pop-up image")
                // window.onload = function(){
                    console.log(img.src)
                    modal.style.display = "block";
                    modalImg.src = img.src;
                    captionText.innerHTML = img.alt;
                // }
                
            }
        }
        $('.js--nav-icon').click(function() {
        var nav = $('.js--main-nav');
        var icon = $('.js--nav-icon i');
        
        nav.slideToggle(200);
        
        if (icon.hasClass('ion-navicon-round')) {
            icon.addClass('ion-close-round');
            icon.removeClass('ion-navicon-round');
        } else {
            icon.addClass('ion-navicon-round');
            icon.removeClass('ion-close-round');
        }        
        });
        
        // document.onreadystatechange = function() {
        //     if (document.readyState !== "complete") {
        //         document.querySelector(
        //           "body").style.visibility = "hidden";
        //         document.querySelector(
        //           "#loader").style.visibility = "visible";
        //     } else {
        //         document.querySelector(
        //           "#loader").style.display = "none";
        //         document.querySelector(
        //           "body").style.visibility = "visible";
        //     }
        // };

    </script>
    <script src="mapjs.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQICbjk9hqOpxSy48u9NA-DRwu4QyZMYw&libraries=places&callback=initialize"></script>
</html>