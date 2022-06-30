<?php


class extin{


private $place;
private $type;
private $vol;
private $placeEx;
private $date_d;
private $date_p;




public function constructeur($place,$type,$vol,$placeEx,$date_d, $date_p)
{


$this->place = $place;
$this->type = $type;
$this->vol = $vol;
$this->placeEx = $placeEx;
$this->date_d = $date_d;
$this->date_p = $date_p;
}


public function getPlace(){
    return $this->place;
}
public function getType(){
    return $this->type;
}
public function getVol(){
    return $this->vol;
}
public function getPlaceEx(){
    return $this->placeEx;
}
public function getDate_d(){
    return $this->date_d;
}
public function getDate_p(){
    return $this->date_p;
}


public function afficher($bdd){

    $req = $bdd->prepare('SELECT*FROM extin WHERE date_p > NOW() ORDER BY place ');
    $req->execute();
    
    
return $req;

}

public function ExtinPerime ($bdd){
    $req = $bdd->prepare('SELECT*FROM extin where date_p <= now()  ');
    $req->execute();
    
    return $req;
    
}

public function nbrExtinPerime($bdd)
{
    $count = 0;
    $req=$this->ExtinPerime($bdd);

    while($resultat = $req->fetch())
    {
        $count++;

    }

    return $count;
}

 public function addExtin($bdd,$a,$b,$c,$d,$ee,$f)
{ 
    $date11=date('y-m-d',strtotime($a));

    $date22=date('y-m-d',strtotime($b));
  
                try {
          
                  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $ins= $bdd->prepare('INSERT INTO extin(date_d,date_p,place,typeE,vol,placeEx) VALUES( :date_d, :date_p, :place, :typeE, :vol, :placeEx)');
                $ins->execute(array(
                    
                    'date_d' => $date11,
                    'date_p' => $date22,
                    'place' =>$c,
                   'typeE' =>$d,
                    'vol' =>$ee,
                   'placeEx' =>$f              
                 ));
                  
                } catch(PDOException $e) {
                  echo  $e->getMessage();
                }
                
  $_POST['place']=0;

}

public function supp($bdd,$a){

$num= (int) $a ;

    try {
          
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$ins= $bdd->prepare('DELETE FROM extin WHERE id= :a');
      $ins->execute(array(
          
          'a' => $num
                       
       ));
        
      } catch(PDOException $e) {
        echo 'jgdflgjfdlkgjfdklgjdflgjfdklgjfdlgjfdlggfdljkkkkkkkkk'. $e->getMessage();
      }

}
public function resJour($datep){

    $hh=  strtotime($datep);
    $hhh=strtotime(date('Y\-m\-d H:i:s'));
  
    $xk =($hh - $hhh)/(86400);

    return  round($xk);

}

public function UpDate($bdd,$idd,$a,$b,$c,$d,$ee,$f)
{ 
    $date11=date('y-m-d',strtotime($a));
    $date22=date('y-m-d',strtotime($b));
  
                try {
          
                  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
                // "UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname', `address` = '$address' WHERE `user_id` = '$user_id'"


    $ins= $bdd->prepare(" UPDATE extin SET date_d= '$date11',date_p= '$date22' ,place= '$c',typeE= '$d',vol= '$ee',placeEx= '$f' WHERE id= $idd ");
                $ins->execute();
                  
                } catch(PDOException $e) {
                  echo  'jgdflgjfdlkgjfdklgjdflgjfdklgjfdlgjfdlggfdlhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhjkkkkkkkkk  '.$e->getMessage().'///'. $a.'////'.$b;
                }
                
  $_POST['place']=0;

}




}