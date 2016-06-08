<?php
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
        <br>

<!-- -------------------------------------------------------------------------- -->
<!-- BUTTONS -->
        <div class="div-wrapper-buttons">
            <div class="div new-entry">
                <a class="button btnnewentry" href="pages/newentry.php">Eintrag hinzuf&uuml;gen</a>
            </div>
            
            <div class="div edit-entry">
                <a class="button btneditentry" href="">Eintrag &auml;ndern</a>
            </div>
            
            <div class="div search">
                <a class="button btnsearch" href="">Suche</a>
            </div>
            
            <div class="div print">
                <a class="button btnprint" href="">Drucken</a>
            </div>
            
            <div class="div export">
                <a class="button btnexport" href="">Exportieren</a>
            </div>
        </div>
        
        <hr>

<!-- -------------------------------------------------------------------------- -->
<!-- POP UP BOX -->
<!--        <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Here i am</h2>
                <a class="close" href="#">&times;</a>
                <div class="content">
                    Thank to pop me out of that button, but now i'm done so you can close this window.
                </div>
            </div>
        </div>       
     -->
   
	</body>
</html>


<!-- -------------------------------------------------------------------------- -->
<!-- SHOW DATABASE ENTRIES -->
<?php

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// SQLQUERY + RESULT //
$sqlquery = "SELECT * FROM movies";
$sql= 'SELECT title, origtitle, cover, date, country, length, fsk, genre, actors, director, summery, location FROM movies';

// -------------------------------------------------------------------------- //
// TABLE FOR OUTPUT //
echo "<table class='table-output' align=center>
    <tr>
    <th>Cover</th>
    <th>Filmtitel</th>
    <th>Standort</th>
    <th>Altersfreigabe (FSK)</th>
    </tr>";

$img="";
// -------------------------------------------------------------------------- //
// DISPLAY ENTRIES OF DATABASE IN TABLE STYLE //
foreach ($database->query($sql) as $row)
  {
    $img=$row['cover'];
    echo "<tr>";
    echo "<td><img style='border-width: 0px;' src='$img' width='50' height='50'/>"; // SET COVER IMAGE //
    echo "<td><a href='#popup1'>" . $row['title'] . "</a></td>";    // TITLE AS LINK + OPEN POPUP ON CLICK //
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
    echo "</tr>";
  }
   
echo "</table>";

// -------------------------------------------------------------------------- //
// POP UP BOX
echo "      <div id='popup1' class='overlay'>
            <div class='popup'>
                <h2>Here i am</h2>
                <a class='close' href='#'>&times;</a>
                <div class='content'>
                    HELLO
                </div>
            </div>
        </div>";

?>
