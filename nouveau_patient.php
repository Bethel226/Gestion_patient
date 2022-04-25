<?php 
require_once './fonctions/base.php';
require_once 'autoload.php';

$bd= bd();
$patient_ctrl =new PatientController($bd);
if(isset($_POST['nom']) and $_POST['prenom'] and $_POST['genre'] and $_POST['addresse'] and $_POST['telephone'] and $_POST['age']
and $_POST['g_sanguin'] and $_POST['antecedant'] and $_POST['m_actuelle'])
{
    $patient_ctrl =new PatientController($bd);
    $patient=new Patient($_POST);
    $patient_ctrl->ajouter($patient);
    header("location: list.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include 'link.php'; ?>
        <title>Nouveau patient</title>
    </head>
    <body>
       <?php include 'header.php'; ?>
           <div class="container-fluid navbar navbar-light" style="background-color: #006666;">
        <div id='formulaire_bircof'>
                            <h4 class="titre_bircof text-center">Ajouter un patient</h4>
            <form class="form_bircof" method="post" action="nouveau_patient.php" enctype = "multipart/form-data">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Nom" name="nom"  required autofocus>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Prénom" name="prenom" required>
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                    <div class="form-group">
                            <select class="custom-select" name="genre" required >
                                <option value="">Genre</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                                <option value="Autre">Autre</option>
                            </select>
                    </div>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Age" name="age" required>
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Adresse" name="addresse">
                        </div>
                    </div>    
                    <div class="col">
                        <input type="tel" class="form-control" placeholder="Téléphone" name="telephone" required>
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <select class="form-control" name="g_sanguin" required>
                            <option>Groupe Sanguin</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                            <option>O+</option>
                            <option>0-</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Maladie actuelle" name="m_actuelle" required>
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">   
                        <div class="form-group">
                        <form class="was-validated">
                        <div class="mb-3">
                            <textarea class="form-control" id="validationTextarea" placeholder="Antecedants medicaux" name="antecedant" required></textarea>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
                <div class="buttons">
                <div class='button'>
                    <input class="btn btn-outline-success" id="btn-ajout" type="submit" value="Ajouter">
                </div>
                <div class='button'>
                   <a href=""> <button class="btn btn-outline-danger" type="reset" id="btn-ajout"> Retour </button></a>
                </div>
            </div>
            </form>
            </div>

        </div>    
           </div>
        <?php include 'foot.php'; ?>    
        
    </body>
</html>
<?php

?>
