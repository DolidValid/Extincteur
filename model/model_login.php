
<?php



class user{

   
    

public function login ($bdd,$pseudo ,$password){
    $a=true;
    $req = $bdd->prepare('SELECT pseudo , passeword FROM user WHERE pseudo = :pseudo AND pass = :pass');
    $req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $password));
    $resultat = $req->fetch();
     echo('$resultat');
    if (!isset($resultat)){

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