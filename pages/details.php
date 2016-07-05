<?php
/*********************************************************************
Modulename: details.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

show details of selected movie

Version 1.0.0
2016-07-05
**********************************************************************/

include("header.html");
require_once ("../modules/dbconnect.php");

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$connection = db_connect();

// -------------------------------------------------------------------------- //
// GET VALUES //
$sql = $connection->query("SELECT * FROM movies WHERE id = '$_GET[id]'");
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

// -------------------------------------------------------------------------- //
// SET FSK IMAGE //
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
    <head>
        <link rel="stylesheet" type="text/css" href="../css/header.css" />
        <link rel="stylesheet" type="text/css" href="../css/details.css" />
	</head>
    
    <body>
        <!-- -------------------------------------------------------------------------- -->
        <!-- CONTAINER CONTENT -->
        <div class="div-container-content"></div>
        <!-- -------------------------------------------------------------------------- -->
        
            <!-- -------------------------------------------------------------------------- -->
            <!-- DIV WRAPPER MOVIE CARD -->
            <div class="div-wrapper">
                <div class="top-border left"></div>
                <div class="top-border right"></div>
                <h1><?php echo "$titel" ?></h1><br>

                <div class="div-images">
                    <img class="img-cover" src="<?php echo "../$coverimg" ?>"/><br><br>
                    <label class="label-frame">Genre: <?php echo "$genre" ?></label><br><br>
                    <label class="label-frame">Format: <?php echo "$format" ?><br>
                    Standort: <?php echo "$location" ?></label><br><br>
                    <img class="img-fsk" src="<?php echo "$imgfsk" ?>"/>
                </div>

                <div class="div-divider"></div>

                <div class="div-details">
                    <label class="label-bold">Originaltitel: </label><?php echo "$origtitle" ?><br>
                    <label class="label-bold">Laufzeit: </label><?php echo "$length" ?> min.<br>
                    <label class="label-bold">Filmstart: </label><?php echo "$date"?> (<?php echo"$country" ?>)<br><br>
                    <label class="label-bold">Regisseur: </label><?php echo "$director" ?><br>
                    <label class="label-bold">Darsteller: </label><?php echo "$actors" ?>
                    <br><br><br>

                    <label class="label-bold">Kurzbeschreibung:</label><br>
                    <label><?php echo "$summery" ?></label>
                    <br><br><br>
                    <a class="button-delete" href="confirm.php?id=<?php echo"$id"?>">Löschen</a><br><br>
                    <a class="button-edit" href="formupdateentry.php?id=<?php echo"$id"?>">Editieren</a>
                </div>

            </div>
    </body>
</html>