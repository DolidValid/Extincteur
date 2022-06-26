<?php 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=extibase', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//$req = $bdd->prepare('SELECT pseudo , passeword FROM user ');
//$req->execute();
//$resultat = $req->fetch();

//echo($resultat['pseudo']);




$reqq = $bdd->prepare('SELECT*FROM extin WHERE date_p  <= DATE_ADD(now(),INTERVAL 10 DAY )');
$reqq->execute();




while($resultatee = $reqq->fetch())
{

   // echo($resultatee['id']);
 
           $hh=  strtotime($resultatee['date_p']);
           $hhh=strtotime(date('Y\-m\-d H:i:s'));
         
           $xk =($hh - $hhh)/(86400);

    echo('-------------------------'.$xk);

}
  

echo('khalil');




?>