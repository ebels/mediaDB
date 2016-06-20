<?php
/*********************************************************************
Modulename: showdetails.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

show movie details

Version 1.0.0
2016-06-20
**********************************************************************/

include("header.html");
?>

<!DOCTYPE html>
<html>
	<head>
    <title>EMDB</title>
    <link rel="stylesheet" type="text/css" href="../css/header.css" />    
    <link rel="stylesheet" type="text/css" href="../css/details.css" />
	</head>
</html>

<?php

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// GET VALUES //
$sql = $database->query("SELECT * FROM movies WHERE id = '$_GET[id]'");
$details = $sql->fetch(\PDO::FETCH_ASSOC);
$id=$details['id'];
$titel=$details['title'];
$origtitle=$details['origtitle'];
$coverimg=$details['cover'];
$date=$details['date'];
$country=$details['country'];
$length=$details['length'];
$fsk=$details['fsk'];
$genre=$details['genre'];
$actors=$details['actors'];
$director=$details['director'];
$summery=$details['summery'];
$location=$details['location'];
?>

<html>
    <body>
        <!-- -------------------------------------------------------------------------- -->
        <!-- DIV WRAPPER FOR BUTTONS -->
        <!-- DIV FOR BUTTON BACK -->
        <div class="div-buttons">
            <a class='button back' href='../index.php'>zur&uuml;ck zur Hauptseite</a><br><br>
            <a class="button delete" href="confirm.php?id=<?php echo"$id"?>">Löschen</a><br><br>
            <a class="button edit" href="formupdateentry.php?id=<?php echo"$id"?>">Editieren</a>
        </div>
        <!-- -------------------------------------------------------------------------- -->
        <!-- DIV WRAPPER FOR DETAILS OF MOVIE -->
        <div class="div-wrapper">
            <!-- DIV FOR MOVIE DETAILS -->
            <div class="div-details">
                <h2><strong><?php echo"$titel"?></strong></h2>
                <p><?php echo"$origtitle"?></p><br>
                <?php echo "<img style='border-width: 0px;' src='../$coverimg' width='80' height='114'/><br>"?><br>
                <p>Erscheinungsjahr: <?php echo"$date"?></p>
                <p>Produktionsland: <?php echo"$country"?></p>
                <p>Filmlänge: <?php echo"$length"?>Minuten</p>
                <p>Altersfreigabe (FSK): <?php echo"$fsk"?></p>
                <p>Genre: <?php echo"$genre"?></p>
                <p>Darsteller: <?php echo"$actors"?></p>
                <p>Regisseur: <?php echo"$director"?></p>
                <p>Zusammenfassung: <?php echo"$summery"?></p>
                <p>Standort / Speicherort: <?php echo"$location"?></p><br>
            </div>
        </div>
    </body>
</html>