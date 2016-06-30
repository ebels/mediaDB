<?php
/*********************************************************************
Modulename: confirm.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

yes / no confirmation to delete movie

Version 1.0.0
2016-06-30
**********************************************************************/

include("header.html");

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
// GET TITLE //
$sql = $database->query("SELECT title, cover FROM movies WHERE id = '$_GET[id]'");
$result = $sql->fetch(\PDO::FETCH_ASSOC);
$titel=$result['title'];
$coverimg=$result['cover'];

?>


<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="../css/header.css" />    
        <link rel="stylesheet" type="text/css" href="../css/message.css" />
	</head>
    <body>
    
    <!-- -------------------------------------------------------------------------- -->
    <!-- DIV CONFIRM DELETE -->
    <div class="div-background"></div>
        <div class="div message">
            <div class="top-border left"></div>
            <div class="top-border right"></div>
            <h1><?php echo "$titel" ?></h1>
            <p>
                Möchten Sie den Film entgültig löschen?<br>
            </p>
            
            <img class="img-cover" src="/mediaDB/<?php echo "$coverimg" ?>"/><br>   
            <br><br>
            
            <?php 
            echo "
            <a class='button-yes' href=../modules/deleteentry.php?confirm=yes&id=$_GET[id]>Ja</a>
            <a class='button-no' href=../modules/deleteentry.php?confirm=no&id=$_GET[id]>Nein</a>";
            ?>
        </div>
    </body>
</html>