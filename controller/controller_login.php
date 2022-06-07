<?php
include_once('../model/connexion_sql.php');

include_once('../views/view_login.php');

include_once('../model/model_login.php');

if(isset($_POST['Username'])){
    //si tous les champs ont été remplis
   // if(not_empty([ 'Username','password']) ){
        
     $user =new user();
    // $a=false;
     $a=$user->login($_POST['Username'],$_POST['password']);
           //les sessions nous permette d'accéder (fetch ) de page en 
           if($a){
              
            $_SESSION['Username']= $_POST['Username'];

            redirect('../controller/controller_page_acc.php');
           // redirect('client/remboursement.php?id='.$user->id);

           }
          


            

            
        
    }



//require('../model/model_login.php');