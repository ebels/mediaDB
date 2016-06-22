<?php
/*********************************************************************
Modulename: index.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

main page of mediaDB - show all database entries

Version 1.0.0
2016-06-22
**********************************************************************/

include ("pages/header.html");
?>

<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
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
// SQLQUERY ORDER BY TITLE //
$sql= 'SELECT * FROM movies ORDER BY title';


// -------------------------------------------------------------------------- //
// DIV WRAPPER FOR ALL MOVIE COVERS //
echo "<div class='div-wrapper-movies'>";

// -------------------------------------------------------------------------- //
// DISPLAY ALL ENTRIES OF DATABASE IN COVER STYLE //
foreach ($database->query($sql) as $row)
  {
    $img=$row['cover'];
    $shorttitle=substr($row['title'],0,24); // CUT TITLE AFTER 24 CHARACTERS
    echo "<div class='div-cover'>
            <a href=pages/details.php?id=$row[id]><img src='$img'/></a>
            <span class='title'>$shorttitle</span><br>
            <span class='genre'>$row[genre]</span><br><br>
    </div>";
  }

echo "</div>";
?>
