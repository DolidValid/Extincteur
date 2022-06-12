<?php


class extin{

private $id;
private $place;
private $type;
private $vol;
private $placeEx;
private $date_d;
private $date_p;




public function constructeur($id,$place,$type,$vol,$placeEx,$date_d, $date_p)
{

$this->id = $id;
$this->place = $place;
$this->type = $type;
$this->vol = $vol;
$this->placeEx = $placeEx;
$this->date_d = $date_d;
$this->date_p = $date_p;
}

public function getId(){
    return $this->id;
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

    $req = $bdd->prepare('SELECT*FROM extin');
    $req->execute();
    
    
return $req;

}

public function ExtinPerime ($bdd){
    $req = $bdd->prepare('SELECT*FROM extin where date_p <= now() ');
    $req->execute();
    
    
    
}

public function nbrExtinPerime($bdd)
{
    $count = 0;
    ExtinPerime($bdd);

    while($resultat = $req->fetch())
    {

    }
}



}