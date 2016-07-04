<?php
/*********************************************************************
Modulename: updateentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

update movie details in database

Version 1.0.0
2016-07-04
**********************************************************************/
require_once ("dbconnect.php");

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$connection = db_connect();

// -------------------------------------------------------------------------- //
// GET VALUES //
$id = $_POST['id'];
$title = $_POST['filmtitle'];
$origtitle = $_POST['origtitle'];
$date = $_POST['date'];
$country = $_POST['country'];
$length = $_POST['length'];
$fsk = $_POST['fsk'];
$genre = $_POST['genre'];
$actors = $_POST['actors'];
$director = $_POST['director'];
$summery = $_POST['summery'];
$location = $_POST['location'];

// -------------------------------------------------------------------------- //
// WRITE ONLY CHANGED VALUES IN DATABASE //
// UPDATE TITLE //
if (!empty($title)) {
    $sql = "UPDATE movies SET title='$title' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE ORIGTITLE //
if (!empty($origtitle)) {
    $sql = "UPDATE movies SET origtitle='$origtitle' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE COVER //
// CHECK IF USER CHOOSE IMAGE TO UPLOAD //
if ($_FILES["cover"]["name"]!="") {
    //CHECK IF UPLOADED IMAGE IS IMAGE //
    $uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/mediaDB/images/cover/";
    $uploadfile = $uploaddir . basename($_FILES['cover']['name']);
    
    $imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);

    // ALLOW IMAGE FILE FORMATS //
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        include('../messages/uploadfailed.html');
    } 

    // CHECK IF UPLOAD SUCCEEDED //
    if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadfile)) {
        // NOTHING - GO AHEAD TO SET IMAGE URL
                
    } else {
        include('../messages/uploadfailed.html');
    }
            
    // SET IMAGE URL FOR DATABASE UPDATE //
    $imgdir="images/cover/";
    $imgurl=$imgdir.$_FILES['cover']['name']; 
   
    $sql = "UPDATE movies SET cover='$imgurl' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE DATE //
if (!empty($date)) {
    $sql = "UPDATE movies SET date='$date' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE COUNTRY //
if (!empty ($country)) {
    $sql = "UPDATE movies SET country='$country' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE LENGTH //
if (!empty ($length)) {
    $sql = "UPDATE movies SET length='$length' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE FSK //
if (!empty ($fsk)) {
    $sql = "UPDATE movies SET fsk='$fsk' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE GENRE //
if (!empty ($genre)) {
    $sql = "UPDATE movies SET genre='$genre' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE ACTORS //
if (!empty ($actors)) {
    $sql = "UPDATE movies SET actors='$actors' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE DIRECTOR //
if (!empty ($director)) {
    $sql = "UPDATE movies SET director='$director' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE SUMMERY //
if (!empty ($summery)) {
    $sql = "UPDATE movies SET summery='$summery' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// UPDATE LOCATION //
if (!empty ($location)) {
    $sql = "UPDATE movies SET location='$location' WHERE id=$id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

// SHOW UPDATE SUCCEED //
include('../messages/updatesucceed.html');

?>