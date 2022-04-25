<?php 
require_once './fonctions/base.php';
require_once 'autoload.php';

$bd= bd();
$patient_ctrl =new PatientController($bd);
$list_patient=$patient_ctrl->afficher_list();

if(isset($_GET['id']))
{
    $patient_ctrl->supprimer($_GET['id']);
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>index</title>
        <?php include 'link.php'; ?>
    </head>
<body>
  <?php include 'header.php'; ?>
<div class="row col-12" style="background-color: #006666;">
    <div class="col-6 p-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="picture/a.jpeg" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="picture/b.webp" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="picture/c.webp" class="d-block w-100" alt="">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
    <div class="bg-light col-6 p-3">
          <h4 class="text-center mb-5" style="font-family: 'Lobster', 'cursive'; font-size: 4rem;">Bienvenue dans la gestion des patients!
          </h4>
          <p class="text-center text-danger" style="font-family: 'Lobster', 'cursive'; font-size: 2rem;">La solution pour un meilleur suivi de votre santé!
          </p> 
      </div>
</div>

  <?php include 'foot.php'; ?> 
  <?php include 'script_js.php'; ?>     
 </body>
</html>