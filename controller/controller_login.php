<?php
include_once('../model/connexion_sql.php');



include_once('../model/model_login.php');

if(isset($_POST['Username'])){
  
    //si tous les champs ont été remplis
   // if(not_empty([ 'Username','password']) ){
        
     $user =new user();
    
     $a = $user->login($bdd,$_POST['Username'],$_POST['password']);
    
           //les sessions nous permette d'accéder (fetch ) de page en 
           if($a){
            session_start();
            
            $_SESSION['logged_in'] = true;
                      
            header("Location: http://localhost/extincteur/controller/controller_page_acc.php");
            die();
             //echo("helllo Lorem");
          //  redirect('../controller/controller_page_acc.php');
           // redirect('client/remboursement.php?id='.$user->id);

        
          }else{
      include_once('../views/view_login.php');
      
          }
          
    }else{
      include_once('../views/view_login.php');
    }
  

