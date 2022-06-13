<?php
include_once('../model/connexion_sql.php');
include_once('../model/model_extin.php');



$extincteur = new extin();
$donne= $extincteur->ExtinPerime($bdd); 


include_once('../views/view_extinPerime.php');