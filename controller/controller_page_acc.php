<?php
include_once('../model/connexion_sql.php');
include_once('../model/model_extin.php');

$ins= $db->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message) VALUES ( :id_expediteur, :id_destinataire, :message)');
				$ins->execute(array(
					'id_expediteur' => 16,
					'id_destinataire' => $id_destinataire,
					'message' => $message
				));


$extincteur = new extin();

$extine= $extincteur->afficher($bdd);
$nbrPerime = $extincteur-> nbrExtinPerime($bdd); 



include_once('../views/view_accuille.php');
