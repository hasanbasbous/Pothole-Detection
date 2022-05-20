<?php
    include 'common/connection.php';

    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: signin.php");
    }

    $query = "SELECT * FROM potholes";
    if(isset($_GET['order_by'])){
        $orderby = ' order by '.$_GET['order_by'].' '.$_GET['sort'];
        
        // if(isset($_GET['func']) && $_GET['func'] == 'getPotholesByAddress'){
        //     $query = $query. " WHERE address=" .$_GET['addr']. $orderby;
        // }else
            $query = $query. $orderby;
    }
    // if(isset($_GET['func'])){
    //     $query = $query. " WHERE address=" .$_GET['addr'];
    //     echo $query;
    // }
    $result = $conn->query($query);
    // echo $query;    

    if(isset($_POST['chk_id']) && isset($_POST['schedule_btn']))
    {
        $id = $_POST['chk_id'];
        echo($id);  
        $time = date('H:i:s', strtotime(implode($_POST['time'])));
        $date = date('Y-m-d',strtotime(implode($_POST['date'])));
        for($x = 0; $x < count($id); $x++){
            $conn->query("UPDATE potholes SET date= '$date', time= '$time' WHERE id=" .$id[$x]);
        }
        $msg = "Updated Successfully!";
        header("Location: pothole_table.php?msg=$msg"); 
    }
    if(isset($_POST['chk_id']) && isset($_POST['remove_btn']))
    {
        $id = $_POST['chk_id'];
        for($x = 0; $x < count($id); $x++){
            $conn->query("DELETE FROM potholes WHERE id=" .$id[$x]);
        }
        $msg = "Deleted Potholes Successfully!";
        header("Location: pothole_table.php?msg=$msg"); 
    }


    function sortorder($column){
       
        $sorturl = "?order_by=".$column."&sort=";
        $sorttype = "asc";
        $sorturl .= $sorttype;
        $_GET['sort'] = $sorturl;
        // $result = $conn->query("SELECT * FROM potholes ORDER BY '$column' asc");
        return $sorturl;
        // header("Location: pothole_table.php");
    }
    $sql = "SELECT *FROM potholes";
    //execute the query and store the result in $result
    $pothole = $conn->query($sql);

?>



<?php
while ($row = mysqli_fetch_array($pothole)) {

    $GLOBALS['longitude']=$row['longitude'];
    $GLOBALS['latitude']=$row['latitude'];
    $GLOBALS['path']=$row['img'];
}
?>

<html>
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
    <style>
        #loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid #444444;
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
            /* visibility: visible; */
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

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }   

        tbody tr:hover {background-color: coral;} /*makes only tbody rows change color on hover */
        
        /* remove the x-button from the infowindow */
        button.gm-ui-hover-effect {
            visibility: hidden;
        }

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
            
        }
        @media (max-width:600px){
            .hero-text-box{
                /* display: none; */
                /* z-index: -1; */
                /* visibility: hidden; */
            }
        }
        table.scrolldown {
            /* display: flex; */
            flex-flow: column;
            /* height: 100%;
            width: 100%; */
            position:relative;
        } 
        table.scrolldown thead {
            width: 100%;
            overflow-y: scroll;
            display: block;
            overflow-x: hidden;
            
        }
        table.scrolldown tbody {
            /* flex: 1 1 auto; */
            width: 100%;
            height: 80vh;
            overflow-y: scroll;
            display: block;
        }
        table.scrolldown tr{
            width: 100%;
            display: table;
            table-layout: fixed;
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
        <div class="hero-text-box">
            <p class="title"> <b>Pothole Detection System</b><p>
            <h1>A better driving experience starts with <br>a better road condition</h1>
            
        </div>

    </header>
    <div class="row1">
        <div class="column right">
            <!-- <h1>My First Google Map</h1> -->
            <div id="googleMap" style="width:100%; height:80vh;">TEST</div>
            <label> Address <input id="map-search" name = "address" class="controls" type="text" placeholder="Search Box" style="width:40%;"></label><br>
        </div>
        <div class="column left" >
            <form action="pothole_table.php" method="POST">
            <?php if (isset($_GET['msg'])) { ?>
            <p class="alert alert-success"><?php echo $_GET['msg']; ?></p>
            <?php } ?>
                <table class="scrolldown" >
                    <thead>
                        <tr >
                            <?php if($_SESSION['role']==1) : ?>
                                <th style="width:5%;"></th>
                            <?php endif; ?>
                            <th style="width:8%;"><a href="<?php echo sortorder('id'); ?>"> ID</a></th>
                            <th style="width:25%;">Comment</th>
                            <th style="width:12%;"><a href="<?php echo sortorder('address'); ?>" >Address</a></th>
                            <th style="width:12%;"><a href="<?php echo sortorder('date'); ?>" >Date</a></th>
                            <th style="width:12%;">Time </th>
                            <?php if($_SESSION['role']==1) : ?>
                                <th style="width:5%;"> uID</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr id="<?php echo $row['id'];?>" onmouseover="handleHover(<?php echo $row['id'];?>)" > 
                            <?php if($_SESSION['role']==1) : ?>
                                <td style="width:5%;">
                                    <input id="<?php echo "check".$row['id'];?>" name="chk_id[]" onclick="handleCheck(this)" type="checkbox" value="<?php echo $row['id']; ?>"/>
                                </td>
                            <?php endif; ?>
                            <td style="width:8%;" class="row_id"><?php echo $row['id'];?></td>
                            <td style="width:25%;"><?php echo $row['comment'];?></td>
                            <td style="width:12%;"><?php echo $row['address'];?></td>
                            <td style="width:12%;"><?php echo $row['date'];?></td>
                            <td style="width:12%;"><?php echo $row['time'];?></td>
                            <?php if($_SESSION['role']==1) : ?>
                                <td style="width:5%;"><?php echo $row['userId'];?></td>
                            <?php endif; ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if($_SESSION['role']==1) : ?>
                    <input name="remove_btn" type="submit" class="btn btn-danger" value="remove" />
                    
                    <input id="submit" name="schedule_btn" type="submit" class="btn btn-danger" value="schedule" /><br>
                    <label> Date <input name="date[]" type="date" value="date"/> </label>
                    <label> Time <input type="time" id="appt" name="time[]" min="09:00" max="18:00" 
                    style="margin-top:5px;" ></label> 
                <?php endif; ?>
            </form>
        </div>
        
    </div>
    
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    let lat=33.8938;
    let long=35.5018;
    var map;
    var addressEl = document.getElementById('map-search');
    var markers = new Map();
    var searchBox;
    console.log(addressEl)

    function myMap() {  
        console.log("Entered")
        var mapProp= {
        center:new google.maps.LatLng(lat,long),
        zoom:12,
        };
        map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        showLocations(map);

        
    searchBox = new google.maps.places.SearchBox( addressEl);
    google.maps.event.addListener( searchBox, 'places_changed', function () {
        console.log("Entered function")
		var places = searchBox.getPlaces(),
			bounds = new google.maps.LatLngBounds(),
			i, place, lat, long, resultArray,
			addresss = places[0].formatted_address;

		for( i = 0; place = places[i]; i++ ) {
			bounds.extend( place.geometry.location );
			map.setCenter( place.geometry.location );  // Set map center to new position
		}

		map.fitBounds( bounds );  // Fit to the bound
		map.setZoom( 15 ); // This function zooms to level 15.

		resultArray =  places[0].address_components;
		console.log(resultArray)
		if(resultArray.length == 5)
			addressEl.value = resultArray[1].long_name + ", " + resultArray[2].long_name
		else 
			addressEl.value = resultArray[0].long_name + ", " + resultArray[1].long_name

        // getPotholesByAddress(addressEl.value)
        // console.log("address " + addressEl.value)
	});
    }

    //using AJAX
    function showLocations() { 
        var xhr = new XMLHttpRequest();
        var jsvar = null;
        xhr.open("GET", "locations.php?func=showlocation");
        xhr.onload = function () {
            var jsvar = this.response;
            jsvar = JSON.parse(jsvar);
            var infowindow = new google.maps.InfoWindow; //create one instance and each click change content
            
            for(var i = 0; i < jsvar.length; i++){
                addMarker(jsvar[i].latitude, jsvar[i].longitude, jsvar[i].img, map, infowindow, jsvar[i].id);
            }
        }
        xhr.send();
    }

    // function getPotholesByAddress(address){
    //     var xhr = new XMLHttpRequest();
    //     var jsvar = null;
    //     xhr.open("GET", "pothole_table.php?func=getPotholesByAddress&addr=" + address)
    //     console.log(address)
    //     xhr.onload = function () {     
    //         console.log(this.response)       
    //     }
    //     xhr.send();
    // }
    console.log(document.querySelector("table"))
    window.onload = ()=>{
        document.querySelector("table").scrollIntoView()
       
    }

    function addMarker(lat, lng, path, map, infowindow, id){
        var pt = new google.maps.LatLng(lat, lng);
        var marker = new google.maps.Marker({
            position: pt,
            map: map
        });
        marker.set('id', id)
        markers.set(id, marker)
        var admin = '<?=$_SESSION['role']?>';
        var infowincontent = document.createElement('div')
        infowincontent.style.maxWidth='300px'
        infowincontent.style.maxHeight='300px'
        var img = document.createElement('img');
        img.style.width='100%';
        img.style.height = '100%'
        infowincontent.appendChild(img)
        // img.src = "pothole_image/" + path
        img.src = "manual_reported_images/" + path
        if(admin == 1){ 
            // console.log("added button")
            // var remove_btn = document.createElement('button')
            // infowincontent.appendChild(document.createElement('div').appendChild(remove_btn))
            // remove_btn.innerHTML = "Remove"
            // remove_btn.addEventListener('click', ()=>{
            //     // console.log(marker.id)
            //     console.log(id);
            //     markers.delete(""+id)
            //     remove_pothole(path)
            //     // console.log(markers[id+""])
            //     marker.setMap(null)
            // })

            //when you click on the cursor automatically check the corresponding box
            //if the box is already checked, then uncheck it
            google.maps.event.addListener(marker, 'click', ()=> {
            if(document.getElementById("check" + marker.id).checked)
                document.getElementById("check" + marker.id).checked = false;
            else
                document.getElementById("check" + marker.id).checked = true
        })
        }
        google.maps.event.addListener(marker, 'mouseover', function() {
            console.log(marker.id)
            infowindow.close();
            infowindow.setContent(infowincontent);
            infowindow.open(map,marker);
            document.getElementById(marker.id+"").style.backgroundColor = 'coral';
            document.getElementById(marker.id+"").scrollIntoView();
        });

        google.maps.event.addListener(marker, 'mouseout',()=>{
            infowindow.close();
            document.getElementById(marker.id+"").style.backgroundColor = 'white';
        }) 
    }   

    function remove_pothole(path){
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "remove_pothole.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
        xhr.send("path=" + path);
        xhr.onload = function(){
            console.log(this.response);
        }
    }

    let lastChecked;        

    function handleCheck(element){
        let checkboxes = document.querySelectorAll( 'input[type="checkbox"]' );
        let e = window.event;
        let inBetween = false;
        if(typeof lastChecked === 'undefined'){
            lastChecked = element;
        }
            
        if(e.shiftKey && element.checked){
            checkboxes.forEach(checkbox => {
                if(checkbox === element || checkbox === lastChecked){
                    inBetween = !inBetween;
                }
                if(inBetween){
                    checkbox.checked = true;
                }
            })
        }
        lastChecked = element;
    }

    function handleHover(id){
        map.setCenter(markers.get(id+"").position)
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
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDQICbjk9hqOpxSy48u9NA-DRwu4QyZMYw&callback=myMap"></script>