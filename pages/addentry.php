<?php
/*********************************************************************
Modulename: addentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

add movie entry to database

Version 1.0.0
2016-06-10
**********************************************************************/


// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// CHECK IF MOVIE ALREADY EXISTS IN DATABASE //
$titleexists=$_POST['filmtitle'];
$stmt = $database->query("SELECT title FROM movies WHERE title = '$titleexists'");

if($stmt->rowCount() > 0){
        // SHOW ENTRY FAILED + REDIRECT TO INDEX.HTML AFTER 3 SEC. //
        include('entryfailed.html');
        header("refresh:3;url=../index.php");
    
    } else {
        //CHECK IF USER CHOOSE IMAGE TO UPLOAD //
        if ($_FILES["cover"]["name"]=="") {
            // ARRAY FOR NEW ENTRY WITHOUT IMAGE //
            $arraynewentry = array();
            $arraynewentry['title']=$_POST['filmtitle'];
            $arraynewentry['origtitle']=$_POST['origtitle'];
            $arraynewentry['cover']="";
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

            // SHOW ENTRY SUCCEED + REDIRECT TO INDEX.HTML AFTER 3 SEC. //
            include('entrysucceed.html');
            header( "refresh:3;url=../index.php" );
        } else {
             //CHECK IF UPLOADED IMAGE IS IMAGE //
            if (($info !== IMAGETYPE_GIF) && ($info !== IMAGETYPE_JPEG) && ($info !== IMAGETYPE_PNG)) {
                //die("Not a gif/jpeg/png");
                include('uploadfailed.html');
                header("refresh:3;url=newentry.php");
            } else {
                // MOVE UPLOADED IMAGE TO IMAGE DIRECTORY //
                $uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/mediaDB/img/cover/";
                $uploadfile = $uploaddir . basename($_FILES['cover']['name']);

                if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadfile)) {

                } else {
                    include('uploadfailed.html');
                    header("refresh:3;url=../index.php");
                }

                // SET IMAGE URL FOR DATABASE ENTRY //
                $imgdir="img/cover/";
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

                // SHOW ENTRY SUCCEED + REDIRECT TO INDEX.HTML AFTER 3 SEC. //
                include('entrysucceed.html');
                header( "refresh:3;url=../index.php" );
            }
        }
    }

?>
