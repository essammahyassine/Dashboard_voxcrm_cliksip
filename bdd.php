<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=voxcrm;charset=utf8', 'cliksip', 'cliksip2018');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
