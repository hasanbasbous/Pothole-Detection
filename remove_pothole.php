<?php
require 'common/connection.php';
try {
    //PDO is PHP Data Objects, PDO is a way to access database
    // $db = new PDO($dsn, $username, $password);
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $path = $_POST['path'];
    $sql = "DELETE FROM potholes WHERE img='" . $path . "'";
    $result = $conn->query($sql);
    echo $result;
} catch (Exception $e) {    
    echo $e->getMessage();
}
?>