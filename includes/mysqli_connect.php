<?php # Script 8.2 - mysqli_connect.php

//Contains database access info
//Establishes connection to MySQL & selects the database

//Set access info as constants

DEFINE ('DB_USER', 'test');
DEFINE ('DB_PASSWORD', 'been21');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'projects');

$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Cold not connect to MySQL: ' . mysqli_connect_error() ); //@ = error suppression 

