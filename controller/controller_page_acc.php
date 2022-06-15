<?php
include_once('../model/connexion_sql.php');
include_once('../model/model_extin.php');



$extincteur = new extin();

$extine= $extincteur->afficher($bdd);
$nbrPerime = $extincteur-> nbrExtinPerime($bdd); 



include_once('../views/view_accuille.php');
