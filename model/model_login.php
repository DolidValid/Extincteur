
<?php
class user
{
    private $pseudo;
    private $password;

public function login ($pseudo ,$password){

    $req = $bdd->prepare('SELECT pseudo , passeword FROM user WHERE pseudo = :pseudo AND pass = :pass');
    $req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $password));
    $resultat = $req->fetch();

    if (!$resultat)
    {
     $a= false ;
    }else{
    session_start();
    
    $_SESSION['pseudo'] = $pseudo;
    
    $a=true ;

    }
return $a;

}




 }
 ?>