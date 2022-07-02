<?php

session_start();

//include('filters/guest_filter.php');
require('includes/functions.php');
require('config/database.php');
require('includes/constante.php');



if(isset($_POST['submit'])){
    //si tous les champs ont été remplis
    if(not_empty([ 'nom','prenom','email','adresse','motdepasse','conmotdepasse','numero','ville',
    'datenaissance','sexe']) ){
        
        $errors= [];//tableau contenant l'ensemble des erreurs
        

        extract($_POST);
        //validation des donnees  saisies par l'utilisateur
        //verifier le nombre de caractere
        if(mb_strlen($motdepasse)<6){
            $errors[]="Le mot de passe trop court! (minimum 6 caractere";

        }else{
        //si le mot de passe de confirmation se correspond au mot de passe
            if($motdepasse != $conmotdepasse)
            $errors[]="les deux mots de passe ne concordent pas!";
        }
            if(mb_strlen($numero)<10){
                $errors[]="Entrez un numéro identique (10 chiffre)!!";
    
            }
        

        //verifiation si l'adresse email est valide
        if(!filter_var($email. FILTER_VALIDATE_EMAIL)){
            $errors[]="Adresse email invalide!";
        }

        /*vérification si le nom est déja utilisé!
        if(is_already_in_use('nom' ,$nom, 'banque')){
            $errors[] = "nom deja utiliser";
        }*/
        
        //vérification si l'adresse email est déja utilisé!
        if(is_already_in_use('email' ,$email, 'inscription')){
            $errors[] = "L'adresse Email deja utiliser";
        }

        if(count($errors)==0){
            //envoi d'un mail d'activation
            $to = $email;
            $sujet = " - ACTIVATION DE COMPTE";
            $token = sha1($nom.$email.$motdepasse);
            
            //recuperation d'email deja formate
            ob_start(); 
            require('templates/email/activation.tmlp.php');
            $content=ob_get_clean();

            $hearders ='MIME-Version: 1.0' . "\r\n";
            $hearders .='Content-type: text/html; charset=iso-8859-1' . "\r\n";

            //envoi du mail d'activation
            mail($to, $sujet, $content, $hearders);


            //enregistrement des informations dans la base de données
            $q = $db->prepare('INSERT INTO inscription ( nom , prenom , email , adresse, motdepasse, conmotdepasse, numero,ville,datenaissance, sexe)
            VALUES (:nom, :prenom, :email, :adresse, :motdepasse, :conmotdepasse, :numero, :ville, :datenaissance, :sexe)');

          
            $q->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'adresse' => $adresse,
                'motdepasse' => sha1($motdepasse),
                'conmotdepasse' => sha1($conmotdepasse),
                'numero' => $numero,
                'ville' =>$ville,
                'datenaissance' => $datenaissance,
                'sexe' => $sexe));



                $q = $db->prepare('SELECT id 
                           FROM  inscription
                           ');

        $q->execute();

        
        while($user = $q-> fetch()){
        $s=$user['id'];



        }




                 
                $q = $db->prepare('INSERT INTO comptebancaire ( solde,id)
                VALUES ( :solde,:id)');
    
              
                $q->execute(array(
                    'solde' => 0,
                    'id' => $s
                ));







            //informer l'utilisateur de verifier sa boite de reception

            set_flash( "Mail d'activation envoyé!!",'success');
            redirect('connexion.php');
            
            
        }else{
            $errors[] ="Veuillez svp remplir tous les champs";
            save_input_data();//on stocke les inputs de formulaire pour que les champs  soient pre-remplis la next fois 

        }

    }}
   else{
    clear_input_data();//si on revient de nouveau a la page les champs seront vides!

}
?>

<?php

require('views/inscription.view.php');
