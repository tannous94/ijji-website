<?php

$bloquiados = array(";","\"","%","'","+","#","$","--","==","z'; U\PDATE Account S\ET ugradeid=char","x'; U\PDATE Character S\ET level=99;-\-","x';U\PDATE Account S\ET ugradeid=255;-\-","x';U\PDATE Account D\ROP ugradeid=255;-\-","x';U\PDATE Account D\ROP "); 
foreach($_POST as $valor)
{
	foreach($bloquiados as $bloquiados2)
	{
		if(substr_count(strtolower($valor), strtolower($bloquiados2)) > 0) 
		{
			die("<body background=\"img/bg_body.gif\" /><div align=\"center\"><p><br><p>&nbsp;</p><p>&nbsp;</p><img width=\"100\" height=\"100\" src=\"img/stop.png\" /><br /><br />SQL Injection Detected, Admin will check It Soon!</p><p><br /><div><a href=\"javascript: history.back(-1);\">Back to Register Page</a></div></p></div>");
		}
	}
}
foreach($_GET as $valor)
{
	foreach($bloquiados as $bloquiados2)
	{
		if(substr_count(strtolower($valor), strtolower($bloquiados2)) > 0) 
		{
			die("<body background=\"img/bg_body.gif\" /><div align=\"center\"><p><br><p>&nbsp;</p><p>&nbsp;</p><img width=\"100\" height=\"100\" src=\"img/stop.png\" /><br /><br />SQL Injection Detected, Admin will check It Soon!</p><p><br /><div><a href=\"javascript: history.back(-1);\">Back to Register Page</a></div></p></div>");
		}
	}
}
foreach($_COOKIE as $valor)
{
	foreach($bloquiados as $bloquiados2)
	{
		if(substr_count(strtolower($valor), strtolower($bloquiados2)) > 0) 
		{
			die("<body background=\"img/bg_body.gif\" /><div align=\"center\"><p><br><p>&nbsp;</p><p>&nbsp;</p><img width=\"100\" height=\"100\" src=\"img/stop.png\" /><br /><br />SQL Injection Detected, Admin will check It Soon!</p><p><br /><div><a href=\"javascript: history.back(-1);\">Back to Register Page</a></div></p></div>");
		}
	}
} ?>