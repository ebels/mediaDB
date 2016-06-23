<?php
/*********************************************************************
Modulename: confirm.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

yes / no confirmation to delete movie

Version 1.0.0
2016-06-23
**********************************************************************/

include("header.html");
?>

<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" type="text/css" href="../css/header.css" />    
        <link rel="stylesheet" type="text/css" href="../css/message.css" />
        <style>
            .img-cover {
                width: 182px;
                height: 268px;
                border-radius: 10px;
            }
        </style>
	</head>
</html>

<?php
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


// -------------------------------------------------------------------------- //
// DIV CONFIRM DELETE //
echo "
<div class='div confirmdelete'>
<label>Möchten Sie den folgenden Titel entgültig löschen?<br><br>
<hr><br>
<strong> $titel </strong><br></label><br>
<img class='img-cover' src='/mediaDB/$coverimg'/><br><br><hr><br>

<a class='button yes' href=../modules/deleteentry.php?confirm=yes&id=$_GET[id]>Ja</a>
<a class='button no' href=../modules/deleteentry.php?confirm=no&id=$_GET[id]>Nein</a>";

?>