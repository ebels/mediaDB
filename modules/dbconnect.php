<?php
/*********************************************************************
Modulename: functions.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

function to connect to database

Version 1.0.0
2016-07-04
**********************************************************************/

function db_connect () {
    // Define connection as a static variable, to avoid connecting more than once 
    //static $connection;
    // Try and connect to the database, if a connection has not been established yet
    try {
        // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/mediaDB/conf/php.ini"); 
        $connection = new PDO($config['HOST'],$config['USER'],$config['PASSWORD']);  
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $connection;
}
?>