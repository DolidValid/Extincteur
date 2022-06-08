
<?php



class user{

   
    

public function login ($bdd,$pseudo ,$password){
  
    $req = $bdd->prepare('SELECT pseudo , passeword FROM user WHERE pseudo = :pseudo AND passeword = :pass');
    $req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $password));
    
    $count=0;

    while ($resultat = $req->fetch())
{
$count++;
}

    if ($count==0){

     $a= false ;
    }else{
        
    $a=true ;

    }
return $a;

}




}
 ?>