<?php 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=extibase', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT pseudo , passeword FROM user ');
$req->execute();
$resultat = $req->fetch();

echo($resultat['pseudo']);
echo("\n");
echo('khalil');

?>