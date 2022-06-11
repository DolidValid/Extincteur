<?php

$op=array(

PDO::MYSQL_ATTR_INIT_COMMAND =>  'SET CHARACTEUR SET utf8'  
);
try {

    $bdd= new PDO('mysql:host=localhost;dbname=extibase;charset=utf8mb4', 'root', '');
    
  //  $bd= $bdd->exec(statement'SET CHARACTER SET UTF8');
       
    //mysqli_set_charset($bdd,'utf8');

} catch (Exception $e) {    
    die('Erreur : ' . $e->getMessage());
}

