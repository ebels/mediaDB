<?php
/*********************************************************************
Modulename: editentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

add movie entry to database

Version 1.0.0
2016-06-15
**********************************************************************/

include("header.html");

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// GET VALUES //
$sql = $database->query("SELECT * FROM movies WHERE id = '$_GET[id]'");
$details = $sql->fetch(\PDO::FETCH_ASSOC);
$titel=$details['title'];
$origtitle=$details['origtitle'];
$coverimg=$details['cover'];
$date=$details['date'];
$country=$details['country'];
$length=$details['length'];
$fsk=$details['fsk'];
$genre=$details['genre'];
$actors=$details['actors'];
$director=$details['director'];
$summery=$details['summery'];
$location=$details['location'];

?>

<!DOCTYPE html>
<html>
	<head>  
    <link rel="stylesheet" type="text/css" href="../styles/formupdate.css" />
	</head>
    <body>

<!-- -------------------------------------------------------------------------- -->
<!-- FORM HEADLINE -->
        <table class="table-form">
            <tr class="tr-form-headline">
                <th class="th-form-headline">
                    Filmattribute &auml;ndern
                </th>
                
                <!-- BUTTON BACK TO MAIN -->
                <th class="th-form-buttonback">
                    <a class="button-back" href="../index.php">zur&uuml;ck zur Hauptseite</a>
                </th>
            </tr>
        </table>
        
        <div class="div-formheadline-line">
            <hr>
        </div>
        
<!-- -------------------------------------------------------------------------- -->        
        <!-- FORM NEW FILM ENTRY -->
        <form action="updateentry.php" method="post" enctype="multipart/form-data">
            <!-- FORM BOXES -->
            <div class="div-container-form">
                <table class="table-editmovie">
                    <tr>
                        <th></th>
                        <th>Current</th>
                        <th>New</th>
                    </tr>
                    <tr>
                        <td class="td-title">Filmtitel</td>
                        <td>
                            <label class="label-filmtitle"><?php echo"$titel"?></label><br>
                        </td>   
                        <td>
                            <input class="input-filmtitle" type="text" name="filmtitle" value="" size="70" maxlength="255" required/>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="td-title">Filmtitel</td>
                        <td>
                            <label class="label-filmtitle"><?php echo"$titel"?></label><br>
                        </td>
                        <td>
                            <input class="input-filmtitle" type="text" name="filmtitle" value="" size="70" maxlength="255" required/>
                        </td>
                    </tr>
                </table>
                
            
                
                
<!-- -------------------------------------------------------------------------- -->
                <!-- FORM BUTTON -->
                <input class="button-editentry" type="submit" name="submit" value="Film ändern!" />
            </div>
        </form>
        
<!-- -------------------------------------------------------------------------- -->
    </body>
</html>

?>