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


<div class="container main" style="margin-top: 120px;margin-bottom:60px">
<?php 

$dir    = '../install/';
//si le fichier install alors le message d'erreur
if (is_dir($dir))  {
   echo "<div class='alert alert-warning' style='margin: auto;'>
    <h3>Bienvenue dans Application !</h3>
    <p>Nous vous remercions de votre choix :) Vous pouvez maintenant commencer à courir votre établissment..!</p>
    <br>
    <span style='font-size: 14px;'' class='label label-default'>Mais avant cela pour des raisons de sécurité, vous devez supprimer le dossier d'installation nommé [install] </span>
    <p>Vous le trouverez dans le dossier principal.</p>
    
</div><br><br>";
}

 ?>



<div class="row">

<?php 
  $stmt_count_produit = $connect->prepare("SELECT * FROM consulte");
  $stmt_count_produit->execute();
  $count_produit= $stmt_count_produit->rowCount();

  $stmt_count_teachers = $connect->prepare("SELECT * FROM traitement");
  $stmt_count_teachers->execute();
  $count_teachers = $stmt_count_teachers->rowCount();



   ?>
<div class="col-md-12" id="status"style="margin-top:10px;">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box yellow-bg">
            <i class="fa fa-trademark"></i>
            <div class="count"><?php echo $count_produit; ?></div>
            <div class="title">Le nombre de traitements effectués</div>           
          </div><!--/.info-box-->     
        </div><!--/.col-->
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="info-box orange-bg">
            <i class="fa fa-contao"></i>
            <div class="count"><?php echo $count_teachers; ?></div>
            <div class="title">le Nombre de consultation </div>            
          </div><!--/.info-box-->     
        </div><!--/.col-->  
        
       
</div>
 <div class="clear"></div><br>


    <div class="col-md-4">
      <a href="malade.php">
          <div class="link">
            <i class="fa fa-users"></i>
            <div class="clear"></div><span>Ajouter un Patient</span>
         </div>
      </a>
    </div>
    
     <div class="col-md-4">
      <a href="consultation.php">
          <div class="link">
            <i class="fa fa-plus"></i>
            <div class="clear"></div><span>Effectuer une consulation</span>
         </div>
      </a>
    </div>
    
    <div class="col-md-4">
      <a href="traitement.php">
          <div class="link">
            <i class="fa fa-ambulance"></i>
            <div class="clear"></div><span>Traitement</span>
         </div>
      </a>
    </div>
    <div class="col-md-4">
      <a href="laboratoire.php">
          <div class="link">
            <i class="fa fa-medkit"></i>
            <div class="clear"></div><span>Laboratoire</span>
         </div>
      </a>
    </div>
    
     <div class="col-md-4">
      <a href="medecins.php">
          <div class="link">
            <i class="fa fa-user"></i>
            <div class="clear"></div><span>Ajouter un Medecin</span>
         </div>
      </a>
    </div>
    
     <div class="col-md-4">
      <a href="operation.php">
          <div class="link">
            <i class="fa fa-cog"></i>
            <div class="clear"></div><span>Operation</span>
         </div>
      </a>
    </div>

       

    

   


    

</div>
</div>        
                           

<?php include 'piedPage.php'; ?>             

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!--placer à la fin du document -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>



  </body>
</html>

