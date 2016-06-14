<?php
/*********************************************************************
Modulename: editentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

add movie entry to database

Version 1.0.0
2016-06-14
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
// GET TITLE //
$sql = $database->query("SELECT title FROM movies WHERE id = '$_GET[id]'");
$result = $sql->fetch(\PDO::FETCH_ASSOC);
$titel=$result['title'];


// -------------------------------------------------------------------------- //
// DIV CONFIRM DELETE //
echo "
<div class='div confirmdelete'>
<label>Möchten Sie den folgenden Titel entgültig löschen?<br><br><strong> $titel </strong><br></label><br><br>

<a class='button yes' href=deleteentry.php?confirm=yes&id=$_GET[id]>Yes</a>
<a class='button no' href=deleteentry.php?confirm=no&id=$_GET[id]>No</a>";

?>