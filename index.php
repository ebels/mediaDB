<?php
/*********************************************************************
Modulename: index.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

main page of mediaDB

Version 1.0.0
2016-06-20
**********************************************************************/

include ("pages/header.html");
?>

<!DOCTYPE html>
<html>
	<head>
    <title>EMDB</title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
	</head>
    
	<body>

<!-- -------------------------------------------------------------------------- -->
<!-- BUTTONS -->
        <div class="div-wrapper-buttons">
            <div class="div-new-entry">
                <a class="button btnnewentry" href="pages/formnewentry.php">Eintrag hinzuf&uuml;gen</a>
            </div>
        </div>
        <hr> 
        
	</body>
</html>


<!-- -------------------------------------------------------------------------- -->
<!-- SHOW DATABASE ENTRIES -->
<?php

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// SQLQUERY ORDER BY TITLE //
$sql= 'SELECT * FROM movies ORDER BY title';


// -------------------------------------------------------------------------- //
// DIV WRAPPER FOR ALL MOVIE COVERS //
echo "<div class='div-wrapper-movies'>";

// -------------------------------------------------------------------------- //
// DISPLAY ENTRIES OF DATABASE IN COVER STYLE //
foreach ($database->query($sql) as $row)
  {
    $img=$row['cover'];
    $shorttitle=substr($row['title'],0,24);
    echo "<div class='div-cover'>
            <a href=pages/details.php?id=$row[id]><img src='$img'/></a>
            <span class='title'>$shorttitle</span><br>
            <span class='genre'>$row[genre]</span><br><br>
    </div>";
  }

echo "</div>";
?>
