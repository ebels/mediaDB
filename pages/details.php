<?php
/*********************************************************************
Modulename: showdetails.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

show movie details

Version 1.0.0
2016-06-21
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
$format=$details['format'];


if ($fsk == "FSK 0") {
    $imgfsk = "../images/fsk/FSK0.jpg";
} elseif ($fsk == "FSK 6") {
    $imgfsk = "../images/fsk/FSK6.jpg";
} elseif ($fsk == "FSK 12") {
    $imgfsk = "../images/fsk/FSK12.jpg";
}elseif ($fsk == "FSK 16") {
    $imgfsk = "../images/fsk/FSK16.jpg";
}else {
    $imgfsk = "../images/fsk/FSK18.jpg";
}
?>

<html>
    <body>
        <!-- -------------------------------------------------------------------------- -->
        <!-- DIV FOR BUTTON BACK -->
        <div class="div-buttons">
            <a class='button back' href='../index.php'>zur&uuml;ck zur Hauptseite</a><br><br>
        </div>
        
        <!-- -------------------------------------------------------------------------- -->
        <!-- DIV WRAPPER MOVIE CARD -->
        <div class="div-wrapper">
            
            <!-- DIV FOR IMAGES -->
            <div class="div-images">
                <img class="img-cover" src="<?php echo "../$coverimg" ?>"/><br><br>
                <label class="label-border">Genre: <?php echo "$genre" ?></label><br><br>
                <label class="label-border">Format: <?php echo "$format" ?><br>
                Standort: <?php echo "$location" ?></label><br><br>
            </div>
            
            <!-- DIV FOR DETAILS -->
            <div class="div-details">
                <div class="div-title">
                    <label class="label-title"><?php echo "$titel" ?></label><br>
                    <label><?php echo "$origtitle" ?></label>
                </div>
                
                <div class="div-fsk">
                    <img class="img-fsk" src="<?php echo "$imgfsk" ?>"/>
                </div>
                
                <br><hr class="hr-detail"><br>
                
                <label class="label-bold">Filmlänge: </label><?php echo "$length" ?> min.<br>
                <label class="label-bold">Filmstart: </label><?php echo "$date"?> (<?php echo"$country" ?>)<br><br>
                <label class="label-bold">Regisseur: </label><?php echo "$director" ?><br>
                <label class="label-bold">Darsteller: </label><?php echo "$actors" ?>
                <br><br><hr class="hr-detail"><br>
                
                <label class="label-bold">Zusammenfassung:</label><br>
                <label><?php echo "$summery" ?></label>
                <br><br><hr class="hr-detail"><br>
                
                <div class="div-buttonsedit">
                    <a class="button delete" href="confirm.php?id=<?php echo"$id"?>">Löschen</a>
                    <a class="button edit" href="formupdateentry.php?id=<?php echo"$id"?>">Editieren</a>
                </div>
                <br>
            </div> <!-- DETAILS -->
        </div> <!-- WRAPPER -->
    </body>
</html>