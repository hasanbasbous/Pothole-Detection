<?php
require 'common/connection.php';


if(isset($_GET['func'])){
    if($_GET['func'] == 'showlocation')
    {    
        try {
            //PDO is PHP Data Objects, PDO is a way to access database
            // $db = new PDO($dsn, $username, $password);
            // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT *FROM potholes";
            $pothole = $conn->query($sql);
            $location = json_encode($pothole->fetch_all(MYSQLI_ASSOC));
            echo $location;
        } catch (Exception $e) {    
            echo $e->getMessage();
        }
    } else if($_GET['func'] == 'getPotholesByAddress')
    {
        $addr = $_GET['addr'];
        $sql = "SELECT * FROM potholes WHERE address=" . $addr;
    }
}

?>
