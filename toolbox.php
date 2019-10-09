<?php
/* toolbox.php */

/* Vérification de la complexité d'un mot de passe:
- 8 caractères minimum
- au moins un chiffre
- au moins une majuscule
*/
function verifPassword($mdp)
{
	//compteurs de majuscules et de chiffres
	$cptMaj = $cptInt = 0;
	// longueur du mot de passe
	$longueur = strlen($mdp);
	//boucle de lecture des caractères
	for($i = 0; $i < $longueur; $i++)
	{
		// numérique?
		if(is_numeric($mdp[$i])) $cptInt++;
		//majuscule?
		else if(strtoupper($mdp[$i]) === $mdp[$i]) $cptMaj++;
	}
	//controles complexité et retour
	if($longueur >= 8 AND $cptInt >= 1 AND $cptMaj >= 1)
	{
			return true;
	}
	else return false;
}