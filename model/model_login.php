
<?php
class user
{
    private $pseudo;
    private $password;

public function login ($pseudo ,$password){

    $req = $bdd->prepare('SELECT pseudo , passeword FROM user WHERE pseudo = :pseudo AND pass = :pass');
    $req->execute(array(
    'pseudo' => $pseudo,
    'passeword' => $password));
    $resultat = $req->fetch();

    if (!$resultat)
    {
    return $a= false ;
    }else{
    session_start();
    
    $_SESSION['pseudo'] = $pseudo;
    
    return $a=true ;

    }


}




 }
 ?>