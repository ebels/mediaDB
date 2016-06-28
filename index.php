<?php
/*********************************************************************
Modulename: index.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

main page of mediaDB - show all database entries

Version 1.0.0
2016-06-28
**********************************************************************/
include ("pages/header.html");


// -------------------------------------------------------------------------- //
// DATABASE CONNECTION VARIABLES //
$dbhost='localhost';
$dbname='mediadb';
$dbusername='root';
$dbpw='';

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpw);

// -------------------------------------------------------------------------- //
// SQLQUERY ORDER BY TITLE //
$sql= 'SELECT * FROM movies ORDER BY title';
?>


<!-- -------------------------------------------------------------------------- -->
<!-- HTML PART -->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
    </head>

<!-- -------------------------------------------------------------------------- -->
<!-- CONTAINER CONTENT -->
<div class="div-container-content">
   
    <!-- -------------------------------------------------------------------------- -->
    <!-- DIV WRAPPER FOR ALL MOVIE COVERS -->
    <div class='div-wrapper-movies'>

    <!-- -------------------------------------------------------------------------- -->
    <!-- DISPLAY ALL ENTRIES OF DATABASE IN COVER STYLE -->
    <?php
        foreach ($database->query($sql) as $row)
      {
        $img=$row['cover']; // SET COVER IMAGE
        $shorttitle=substr($row['title'],0,24); // CUT TITLE AFTER 24 CHARACTERS
        echo "<div class='div-cover'>
                <a href=pages/details.php?id=$row[id]><img src='$img'/></a>
                <span class='title'>$shorttitle</span><br>
                <span class='genre'>$row[genre]</span><br><br>
        </div>";
      } ?>

    </div>
    <br><br><br>
    
</div>
</html>
