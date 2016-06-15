<?php
/*********************************************************************
Modulename: showdetails.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

add movie entry to database

Version 1.0.0
2016-06-15
**********************************************************************/

include("header.html");
?>

<!DOCTYPE html>
<html>
	<head>
    <title>EMDB</title>
    <link rel="stylesheet" type="text/css" href="../styles/header.css" />    
    <link rel="stylesheet" type="text/css" href="../styles/message.css" />
	</head>
</html>

<?php

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// GET VALUES //
$sql = $database->query("SELECT * FROM movies WHERE title = '$_GET[title]'");
$details = $sql->fetch(\PDO::FETCH_ASSOC);
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

// -------------------------------------------------------------------------- //
// DIV DETAILS //
echo "
<div class='div details'>
<label><strong> $titel </strong><br></label><br><br>
$origtitle <br>
<img style='border-width: 0px;' src='../$coverimg' width='80' height='114'/><br>
Erscheinungsjahr:$date<br>
Produktionsland:$country<br>
Filmlänge:$length<br>
Altersfreigabe:$fsk<br>
Genre:$genre<br>
Darsteller:$actors<br>
Regisseur:$director<br>
Zusammenfassung:$summery<br>
Standort/Speicherort:$location<br>
</div>"

?>