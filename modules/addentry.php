<?php
/*********************************************************************
Modulename: addentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

add movie entry to database

Version 1.0.0
2016-06-16
**********************************************************************/


// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// CHECK IF MOVIE ALREADY EXISTS IN DATABASE //
$titleexists=$_POST['filmtitle'];
$stmt = $database->query("SELECT title FROM movies WHERE title = '$titleexists'");

if($stmt->rowCount() > 0){
        // SHOW ENTRY FAILED //
        include('../messages/entryfailed.html');
    
    } else {
        //CHECK IF USER CHOOSE IMAGE TO UPLOAD //
        if ($_FILES["cover"]["name"]=="") {
            // ARRAY FOR NEW ENTRY WITHOUT IMAGE //
            $arraynewentry = array();
            $arraynewentry['title']=$_POST['filmtitle'];
            $arraynewentry['origtitle']=$_POST['origtitle'];
            $arraynewentry['cover']="/mediaDB/img/dvd.png"; // SET DEFAULT IMAGE //
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

            // SHOW ENTRY SUCCEED //
            include('../messages/entrysucceed.html');
            
        } else {
            //CHECK IF UPLOADED IMAGE IS IMAGE //
            $uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/mediaDB/images/cover/";
            $uploadfile = $uploaddir . basename($_FILES['cover']['name']);
            
            $imageFileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
            
            // ALLOW IMAGE FILE FORMATS //
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                include('../messages/uploadfailed.html');
                
            } else {
                //CHECK IF COVER DIRECTORY EXISTS //
                if (!is_dir($uploaddir)) {
                    mkdir ($uploaddir, 0755, true);
                    
                }
                
                // CHECK IF UPLOAD SUCCEEDED //
                if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadfile)) {
                    // NOTHING - GO AHEAD TO SET IMAGE URL

                } else {
                    include('../messages/uploadfailed.html');
                }

                // SET IMAGE URL FOR DATABASE ENTRY //
                $imgdir="images/cover/";
                $imgurl=$imgdir.$_FILES['cover']['name']; 

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

                // SHOW ENTRY SUCCEED //
                include('../messages/entrysucceed.html');
            }
        }
    }

?>
