<?php
include_once('../model/connexion_sql.php');
include_once('../model/model_extin.php');




$extincteur = new extin();

if (isset($_GET['id'])) {
  
   $extincteur->supp($bdd,$_GET['id']);

}




if (isset( $_POST['place'])   && isset( $_POST['type']) && isset( $_POST['volume']) &&
 isset( $_POST['Exact_location']) && isset( $_POST['date_d']) && isset( $_POST['date_p'])  ) {

   $nvxExtin = new extin($_POST['place'],$_POST['type'],$_POST['volume'],$_POST['Exact_location'],$_POST['date_d'],$_POST['date_p']);
   
   $nvxExtin->addExtin($bdd,$_POST['date_d'],$_POST['date_p'],$_POST['place'],$_POST['type'],$_POST['volume'],$_POST['Exact_location']);
  
} 



$extine= $extincteur->afficher($bdd);
$nbrPerime = $extincteur-> nbrExtinPerime($bdd); 



include_once('../views/view_accuille.php');
