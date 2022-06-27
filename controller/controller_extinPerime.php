<?php
include_once('../model/connexion_sql.php');
include_once('../model/model_extin.php');


$extincteur = new extin();

if (isset($_GET['id'])) {
  
   $extincteur->supp($bdd,$_GET['id']);
}


$extincteur = new extin();
$donne= $extincteur->ExtinPerime($bdd); 


include_once('../views/view_extinPerime.php');