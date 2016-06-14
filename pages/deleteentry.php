<?php
/*********************************************************************
Modulename: editentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

add movie entry to database

Version 1.0.0
2016-06-14
**********************************************************************/

// GET ID FROM MOVIE //
$id = $_GET['id'];

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// DELETE COVER IMAGE IF EXIST //
$sql = $database->query("SELECT cover FROM movies WHERE id = '$_GET[id]'");
$result = $sql->fetch(\PDO::FETCH_ASSOC);
$cover=$result['cover'];
if (!file_exists("../$cover")) {
        
} else {
unlink("../$cover");
}

// -------------------------------------------------------------------------- //
// DELETE ENTRY WITH SELECTED ID //
if ( $_GET['confirm'] == "yes" ) {
    $sql = "DELETE FROM movies WHERE id='$id'";
    $database->exec($sql);
    
} else if ( $_GET[confirm] == "no" ) {
    // SHOW ENTRY SUCCEED + REDIRECT TO INDEX.HTML AFTER 3 SEC. //
    header( "location: ../index.php");
}

// -------------------------------------------------------------------------- //
// SHOW DELETE SUCCEED + REDIRECT TO INDEX.HTML AFTER 5 SEC. //
include('deletesucceed.html');


?>