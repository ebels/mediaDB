<?php
/*********************************************************************
Modulename: index.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

main page of mediaDB

Version 1.0.0
2016-06-15
**********************************************************************/

include ("pages/header.html");
?>

<!DOCTYPE html>
<html>
	<head>
    <title>EMDB</title>
    <link rel="stylesheet" type="text/css" href="styles/header.css" />
    <link rel="stylesheet" type="text/css" href="styles/index.css" />
	</head>
    
	<body>

<!-- -------------------------------------------------------------------------- -->
<!-- BUTTONS -->
        <div class="div-wrapper-buttons">
            <div class="div-new-entry">
                <a class="button btnnewentry" href="pages/newentry.php">Eintrag hinzuf&uuml;gen</a>
            </div>
        </div>
        
        <hr>

<!-- -------------------------------------------------------------------------- -->
<!-- POP UP BOX -->
        <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Here i am</h2>
                <a class="close" href="#">&times;</a>
                <div class="content">
                    Thank to pop me out of that button, but now i'm done so you can close this window.
                </div>
            </div>
        </div>
   
	</body>
</html>


<!-- -------------------------------------------------------------------------- -->
<!-- SHOW DATABASE ENTRIES -->
<?php

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// SQLQUERY //
$sql= 'SELECT * FROM movies';

// -------------------------------------------------------------------------- //
// TABLE FOR OUTPUT //
echo "<table class='table-output' align=center>
    <tr>
    <th>Cover</th>
    <th>Filmtitel</th>
    <th>Standort</th>
    <th>Altersfreigabe (FSK)</th>
    <th></th>
    </tr>";

// -------------------------------------------------------------------------- //
// DISPLAY ENTRIES OF DATABASE IN TABLE STYLE //
foreach ($database->query($sql) as $row)
  {
    $img=$row['cover'];
    echo "<tr>";
    echo "<td><img style='border-width: 0px;' src='$img' width='80' height='114'/>"; // SET COVER IMAGE //
    echo "<td><a class='link-title' href='pages/showdetails.php?title=$row[title]'.>$row[title]</a></td>";
    echo "<td>" . $row['location'] . "</td>";
    
    // SET FSK IMAGE // 
    if ($row['fsk'] == "FSK 0") {
        $fskimage= '<img style="border-width: 0px;" src="img/fsk/FSK0.jpg" width="50" height="50"/>';
    } elseif ($row['fsk'] == "FSK 6") {
        $fskimage= '<img style="border-width: 0px;" src="img/fsk/FSK6.jpg" width="50" height="50"/>';
    } elseif ($row['fsk'] == "FSK 12") {
        $fskimage= '<img style="border-width: 0px;" src="img/fsk/FSK12.jpg" width="50" height="50"/>';
    } elseif ($row['fsk'] == "FSK 16") {
        $fskimage= '<img style="border-width: 0px;" src="img/fsk/FSK16.jpg" width="50" height="50"/>';
    } elseif ($row['fsk'] == "FSK 18") {
        $fskimage= '<img style="border-width: 0px;" src="img/fsk/FSK18.jpg" width="50" height="50"/>';
    }
    
    echo "<td>" . $fskimage . "</td>";
    echo "<td><a class='button-delete' href='pages/confirmdelete.php?id=$row[id]'>Löschen</a><br>";
    echo "<a class='button-edit' href='pages/formupdateentry.php?id=$row[id]'>Editieren</a></td>";
    echo "</tr>";
  }
   
echo "</table>";

?>
