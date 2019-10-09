<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Medecins</title>

   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     Bootstrap theme 
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
   

    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
      <script src="js/jquery-1.11.3.min.js"></script>

    

     
        
  </head>
<body>

<?php 
/* ajoutClient.php */
$titrePage = "Clinique Dougoun Centre- ajoutMedecin";
include 'connexion.php'; //entete HTML + header
include 'nav.php'; // menu navigation
include 'toolbox.php'; //controle MDP

// Mr Propre
$safe = array_map('strip_tags', $_POST);
print_r($safe);
//mot de passe complexe?
if(verifPassword($safe['password']))
    {
        //vérification si adresse mail déja dans la table
        $rqVerif = "SELECT COUNT(email)
                                FROM medecins
                                WHERE email = :email";
        //préparation
        $stmtVerif = $connect->prepare($rqVerif);
        //paramètres
        $params = [':email' => $safe['email']];
        //exécution
        $stmtVerif->execute($params);
        //récupération (valeur unique)
        $exists = $stmtVerif->fetchColumn();

        // l'adresse mail n'existe pas
            if($exists == 0)
            {
                // encodage MDP (blowfish + salt)
                $hash = password_hash($safe['password'], PASSWORD_DEFAULT);
                // consentement cliqué?
                /*if(isset($safe['consentement']))
                {
                    $consentement = 1;
                }
                else $consentement = 0;*/
                //requête ajout
                
        $rqMedecin=("INSERT INTO medecins (nom_medecins, prenom_medecins, 
                            sexe_medecins, adr_medecins, tel_medecins, fonction_medecins,email,password) 
                    VALUES (:nom_medecins, :prenom_medecins, :sexe_medecins, 
                        :adr_medecins, :tel_medecins, :fonction_medecins,:email,:password)");
                //préparation
                $stmtAjout = $connect->prepare($rqMedecin);
                
        //paramètres medecins
        $params = array(':nom_medecins' => $safe['nom_medecins'],
                        ':prenom_medecins' => $safe['prenom_medecins'],
                        ':prenom_medecins' => $safe['prenom_medecins'],
                        ':sexe_medecins' => $safe['sexe_medecins'],
                        ':adr_medecins'=> $safe['adr_medecins'],
                        ':tel_medecins' => $safe['tel_medecins'],
                        ':fonction_medecins'=> $safe['fonction_medecins'],
                        ':email'=> $safe['email'],
                        ':password' => $hash);

                //exécution
                
                
                if($stmtAjout->execute($params))
                {
                    echo '<p class="alert alert-success">
                                    Bienvenue chez nous.
                                </p>';
                }
                else echo '<p class="alert alert-danger">
                                        Oups...
                                    </p>';
                }
            else echo '<p class="alert alert-danger">
                                    Vous êtes déjà inscrit.
                                </p>';
}
else echo '<p class="alert alert-danger">
						Votre mot de passe est bidon!
                     </p>';
    
        

include 'piedPage.php'; //footer + fin HTML
?>