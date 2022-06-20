<?php
include_once('../model/connexion_sql.php');
include_once('../model/model_extin.php');




$extincteur = new extin();

if (isset( $_POST['place']) && isset( $_POST['type']) && isset( $_POST['volume']) &&
 isset( $_POST['Exact_location']) && isset( $_POST['date_d']) && isset( $_POST['date_p'])  ) {


    
  //  $nvxExtin = new extin($_POST['place'],$_POST['type'],$_POST['volume'],$_POST['Exact_location'],$_POST['date_d'],$_POST['date_p']);
   
 //$date1= '2022-02-02';
 $date11=date('y-m-d',strtotime($_POST['date_d']));

 // $date2= '2022-02-02';
  $date22=date('y-m-d',strtotime($_POST['date_p']));

 // $ins= $bdd->prepare('INSERT INTO extin(id,date_d,date_p,place,typeE,vol,placeEx) VALUES (:id, :date_d, :date_p, :place, :typeE, :vol, :placeEx)');
   //           $ins->execute(array(
     //             'id' => '',
       //           'date_d' =>  $date11,
         //         'date_p' => $date22,
           //       'place' =>$_POST['place'],
             //     'typeE' =>$_POST['type'],
               //   'vol' =>$_POST['volume'],
                 // 'placeEx' =>$_POST['Exact_location']
              //));


              try {
        
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $idid=22;

               
  $ins= $bdd->prepare('INSERT INTO extin(id,date_d,date_p,place,typeE,vol,placeEx) VALUES (:id, :date_d, :date_p, :place, :typeE, :vol, :placeEx)');
              $ins->execute(array(
                  'id' => $idid,
                  'date_d' =>  $date11,
                  'date_p' => $date22,
                  'place' =>$_POST['place'],
                 'typeE' =>$_POST['type'],
                  'vol' =>$_POST['volume'],
                 'placeEx' =>$_POST['Exact_location']
              ));
                
                echo "New record created successfully";
              } catch(PDOException $e) {
                echo  $e->getMessage();
              }
              
              $conn = null;







  //  $nvxExtin->addExtin($bdd);
} 

//$bdd->exec('INSERT INTO extin(id,date_d,date_p,place,typeE,vol,palceEx) VALUES(,\'\', \'2022-02-02\',\'2022-02-02\',\'ايض\',\'ابتي\',\'hfdj\',\'بنسيابني\')');

$extine= $extincteur->afficher($bdd);
$nbrPerime = $extincteur-> nbrExtinPerime($bdd); 



include_once('../views/view_accuille.php');
