<?php
    $server = 'localhost';
    $utilisateur ='cliksip';
    $password = 'cliksip2018';
    $database = 'voxcrm';
    $cnx = mysqli_connect($server,$utilisateur,$password,$database);
    $rf=$_GET['refappel'];
    $Query ="UPDATE  `contacts` SET 
            `custom_30`='Attention changement adresse.'
            WHERE `id`=".$rf;
    $cnx->query($Query);
    echo $rf;
?>