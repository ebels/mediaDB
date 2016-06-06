<?php
// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// DISPLAY ENTRIES OF DATABASE //
$sqlquery = "SELECT * FROM movies";
$sql= 'SELECT title, origtitle, cover, date, country, length, fsk, genre, actors, director, summery, location FROM movies';


// -------------------------------------------------------------------------- //
// TABLE //


// -------------------------------------------------------------------------- //
foreach ($database->query($sql) as $row) {
    echo "Filmtitel: ";
    print $row['title'] . "\t <br>";
    echo "Originaltitel: ";
    print $row['origtitle'] . "\t <br>";
    echo "Cover: ";
    print $row['cover'] . "\t <br>";
    echo "Erscheinungsjahr: ";
    print $row['date'] . "\n <br>";
    echo "Land: ";
    print $row['country'] . "\t <br>";
    echo "Filmlänge: ";
    print $row['length'] . "\t <br>";
    echo "Altersfreigabe: ";
    print $row['fsk'] . "\t <br>";
    echo "Genre: ";
    print $row['genre'] . "\t <br>";
    echo "Darsteller: ";
    print $row['actors'] . "\t <br>";
    echo "Regisseur: ";
    print $row['director'] . "\t <br>";
    echo "Zusammenfassung: ";
    print $row['summery'] . "\t <br>";
    echo "Standort/Speicherort: ";
    print $row['location'] . "\t <br><br><hr><br>";
}

?>
    