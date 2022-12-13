<?php
define("DBHOST" , "localhost");
define("DBUSER" , "homestead");
define("DBPASS" , "secret");
define("DB" , "panda");

$connection = @mysqli_connect( DBHOST, DBUSER, DBPASS, DB) or die("No connection to BD");
mysqli_set_charset($connection , "utf8") or die("No charset");
?>