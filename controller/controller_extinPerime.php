<?php
include_once('../model/connexion_sql.php');
include_once('../model/model_extin.php');
session_start();

if(empty($_SESSION['logged_in'])){
   header("Location: http://localhost/extincteur/controller/controller_login.php");
   die();
}

$extincteur = new extin();

if (isset($_GET['id'])) {
  
   $extincteur->supp($bdd,$_GET['id']);
}

if (isset( $_POST['place'])   && isset( $_POST['type']) && isset( $_POST['volume']) &&
 isset( $_POST['Exact_location']) && isset( $_POST['date_d']) && isset( $_POST['date_p']) ) {

   $nvExtin = new extin();
   
   $nvExtin->UpDate($bdd,$_POST['id'],$_POST['date_d'],$_POST['date_p'],$_POST['place'],$_POST['type'],$_POST['volume'],$_POST['Exact_location']);
  
} 


$extincteur = new extin();
$donne= $extincteur->ExtinPerime($bdd); 


include_once('../views/view_extinPerime.php');