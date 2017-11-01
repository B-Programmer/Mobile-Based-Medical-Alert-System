<?php 
$host = "localhost"; //host
$dbusername = "root"; // Username
$dbpass = ""; //Password
$dbname = "DbMBMAS"; // Database name

mysql_connect("$host","$dbusername") or die("could not connect to mysql"); // connect database
mysql_select_db("$dbname") or die("No Database found!!!!"); // Confirm database name

?>