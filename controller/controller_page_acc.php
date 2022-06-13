<?php
include_once('../model/connexion_sql.php');
include_once('../model/model_extin.php');



$extincteur = new extin();
$extin= $extincteur->afficher($bdd); 


include_once('../views/accuille.php');