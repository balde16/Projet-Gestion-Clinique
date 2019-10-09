<?php
/* login.php */
// toujours en haut de page
session_start();

// Mr Propre
$safe = array_map('strip_tags', $_POST);
// boite à outils pour vérif mot de passe
include 'toolbox.php';
include 'nav.php';

if(verifPassword($safe['password']))
{
	//connexion BDD
	include 'connexion.php';
	//requete
	$rqVerif = "SELECT id_medecins,prenom_medecins,sexe_medecins,adr_medecins,
                        tel_medecins,fonction_medecins,email,password
                FROM medecins
                WHERE email=:email";
	//préparation
	$stmtVerif =$connect->prepare($rqVerif);
	//paramètres
	$params = [':email' => $safe['email']];
	//exécution
	if($stmtVerif->execute($params))
	{
		//récupération
		$medecin = $stmtVerif->fetch();
		print_r($medecin);
		
		//vérification mot de passe
		if(password_verify($safe['password'], 
											 $medecin['password']))
		{
			//régénération de session (securité)
			session_regenerate_id();
			$_SESSION['auth'] = 'ok';
			$_SESSION['medecin'] = $medecin;				

			$message = 'Welcome to the Clinic...';	
			$destination = 'index.php';
		}
		else
		{ 
			$message = 'mot de passe incorrect';
			$destination = 'connexion1.php';
		}
	}
	else
	{
		$message = 'inscrivez vous avant';
		$destination = 'medecins.php';
	}
}
else
{
	$message = 'mot de passe bidon';
	$destination = 'connexion1.php';
}
/* affichage du message et retour page index */
echo '<script>
				alert("'.$message.'");
				window.location.href="'.$destination.'";
			</script>';
?>




<?php
include 'piedPage.php'; //footer + fin HTML
?>