<?php
// -------------------------------------------------------------------------- //
// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// SAVE UPLOADED IMAGE TO IMG DIRECTORY //
$uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/mediaDB/img/cover/";
$uploadfile = $uploaddir . basename($_FILES['cover']['name']);

// MOVE IMG TO IMAGE DIRECTORY //
if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadfile)) {
  
} else {
   echo "Upload failed";
}

// SET IMAGE URL //
$imgurl=$uploaddir.$_FILES['cover']['name']; 

// ARRAY FOR NEW ENTRY //
$arraynewentry = array();
$arraynewentry['title']=$_POST['filmtitle'];
$arraynewentry['origtitle']=$_POST['origtitle'];
$arraynewentry['cover']=$imgurl;
$arraynewentry['date']=$_POST['date'];
$arraynewentry['country']=$_POST['country'];
$arraynewentry['length']=$_POST['length'];
$arraynewentry['fsk']=$_POST['fsk'];
$arraynewentry['genre']=$_POST['genre'];
$arraynewentry['actors']=$_POST['actors'];
$arraynewentry['director']=$_POST['director'];
$arraynewentry['summery']=$_POST['summery'];
$arraynewentry['location']=$_POST['location']; 
    
// WRITE NEW ENTRY IN DATABASE //
$newentry = $database->prepare("INSERT INTO movies (title, origtitle, cover, date, country, length, fsk, genre, actors, director, summery, location) VALUES (:title, :origtitle, :cover, :date, :country, :length, :fsk, :genre, :actors, :director, :summery, :location)");
$newentry->execute($arraynewentry);

// SHOW ENTRY SUCCEED + REDIRECT TO INDEX.HTML AFTER 5 SEC. //
include('entrysucceed.html');
header( "refresh:3;url=../index.php" );
    
// SHOW ENTRY FAILED + REDIRECT TO INDEX.HTML AFTER 5 SEC. //
/*include('entryfailed.html');
header( "refresh:3;url=../index.php" );*/

?>
