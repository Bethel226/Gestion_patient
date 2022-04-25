<?php
require_once './fonctions/base.php';
require_once 'autoload.php';

$bd=bd();
$patient_ctrl =new PatientController($bd);
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $value=$patient_ctrl->get((int)$id);
    //echo $id;
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include 'link.php'; ?>
        <title>Detail patient</title>
    </head>
    <body>
<?php include 'header.php'; ?>

            <h4 class="titre_bircof">Detail du patient N° <?= $id ?> </h4>
            
        <div id='formulaire_bircof'>
           
                    <label for="">Nom:</label> <span> <?= $value->getNom()?> </span> <br>
                    <label for="">Prenom:</label> <span><?= $value->getPrenom()?></span> <br>
                    <label for="">Sexe:</label><span> <?= $value->getGenre()?> </span>  <br>
                    <label for="">Addresse:</label> <span> <?= $value->getAddresse()?> </span>  <br>
                    <label for="">N° Telephone:</label><span> <?= $value->getTelephone()?> </span>  <br>
                    <label for="">Age:</label><span> <?= $value->getAge()?> </span>  <br>
                    <label for="">Groupe sanguin:</label><span> <?= $value->getG_sanguin()?> </span>  <br>
                    <label for="">Antecedants medicals:</label><span> <?= $value->getAntecedant()?> </span>  <br>
                    <label for="">Maladie actuelle:</label><span> <?= $value->getM_actuelle()?> </span>  <br>
        </div>    
                        <div class='button'>
                            <a href="list.php"> <button class="btn btn-outline-danger" id="btn-ajout"> Retour </button></a>
                        </div>
        <?php include 'foot.php'; ?>      
    </body>
</html>

