<?php
/*********************************************************************
Modulename: deleteentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

delete movie from database

Version 1.0.0
2016-06-23
**********************************************************************/

// -------------------------------------------------------------------------- //
// GET ID FROM MOVIE //
$id = $_GET['id'];

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// DELETE COVER IMAGE IF EXIST //
$sql = $database->query("SELECT cover FROM movies WHERE id = '$_GET[id]'");
$result = $sql->fetch(\PDO::FETCH_ASSOC);


// -------------------------------------------------------------------------- //
// DELETE ENTRY WITH SELECTED ID //
if ( $_GET['confirm'] == "yes" ) {
    $cover=$result['cover'];
    //ONLY DELETE IMAGE, IF NOT STDIMAGE IS SET
    if ($cover == "images/stdcover.png")
    {
        
    } elseif (file_exists("../$cover")) {
        unlink("../$cover");
    }
    $sql = "DELETE FROM movies WHERE id='$id'";
    $database->exec($sql);
    
} else if ( $_GET[confirm] == "no" ) {
    // REDIRECT TO MAIN PAGE //
    header( "location: ../index.php");
}

// -------------------------------------------------------------------------- //
// SHOW DELETE SUCCEED  //
include('../messages/deletesucceed.html');


?>