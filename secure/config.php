<?php
////////////////////////////////////
///////    Configuration 	////////
////////////////////////////////////
/////// Edit This File Only ////////
////////////////////////////////////

$host = "COMPUTER\SQLEXPRESS"; 	// Host Name (Example: BlaBla\SQLEXPRESS)
$user = "sa"; 							// SQL User (Default: sa)
$pass = "-"; 					// SQL Pass (As you put it when you installed the program)
$dbname = "GunzDB"; 					// DataBase Name

$connect = odbc_connect("Driver={SQL Server};Server={$host}; Database={$dbname}", $user, $pass) or die("Can't connect the MSSQL server.");

?>