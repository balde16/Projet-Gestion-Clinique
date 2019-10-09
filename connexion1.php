<?PHP 
require 'connexion.php'; 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    

    <title>Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
   

    
     <link rel="stylesheet" href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" href="css/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">


   

      <script src="js/jquery-1.11.3.min.js"></script>

        
  </head>
<body>

<?php include 'nav.php'; ?> 

<!--Formulaire de connexion acces a la page login.php-->
<div class="container main" style="margin-top: 250px;">
<div class="row">
	<form method="post" action="login.php"
				class="offset-3 col-md-6">
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" 
						 class="form-control">
		</div>
		<div class="form-group">
			<label>Mot de Passe</label>
			<input type="password" name="password" 
						 class="form-control">
		</div>
		<div class="form-group text-center">
			<input type="submit" name="btnSub"
						 value="Entrer" class="btn btn-success"><br/>
			<a href="perdu.php">Mot de passe perdu</a>
		</div>
	</form>
</div>
<?php
include 'piedPage.php'; //footer + fin HTML
?>