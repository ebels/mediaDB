<?php
/*********************************************************************
Modulename: editentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

add movie entry to database

Version 1.0.0
2016-06-14
**********************************************************************/

echo "Are you sure you want to delete:
<br>";
echo "
<a href=deleteentry.php?confirm=yes&id=$_GET[id]>Yes</a>
<a href=deleteentry.php?confirm=no&id=$_GET[id]>No</a>";

?>