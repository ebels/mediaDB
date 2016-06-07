<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
    /* -------------------------------------------------------------------------- */
    /* EFFECT FOR TABLE */
    .table-output{
        border-collapse: collapse;
    }
    
    /* -------------------------------------------------------------------------- */
    /* EFFECT FOR TABLE HEADER */
    th {
        background-color: grey;
        border-bottom: 1px solid #ddd;
        height: 30px;
        padding: 8px;
        text-align: left;
        width: 10%;
    }
    
    /* -------------------------------------------------------------------------- */
    /* EFFECT FOR TABLE DATA */
    td {
        border-bottom: 1px solid #ddd;
        height: 25px;
        padding: 8px;
        text-align: left;
    }
    
    /* -------------------------------------------------------------------------- */
    /* EFFECT: EVERY 2ND (EVEN) ROW COLORED */
    tr:nth-child(even){
        background-color: #f2f2f2
    }
</style>
</head>

<body>
    
    
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
<th>FSK</th>
<th>Standort</th>
</tr>";

// -------------------------------------------------------------------------- //
// DISPLAY ENTRIES OF DATABASE IN TABLE + EVERY 2ND ROW COLORED //
$count = 0;
foreach ($database->query($sql) as $row)
  {
    echo "<tr>";
    echo "<td>" . $row['cover'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['fsk'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "</tr>"; 
  }
    
echo "</table>";
    
?>   
    
</body>
</html>    
