<?php 
require_once './fonctions/base.php';
require_once 'autoload.php';

$bd= bd();
$patient_ctrl =new PatientController($bd);
$list_patient=$patient_ctrl->afficher_list();

if(isset($_GET['id']))
{
    $patient_ctrl->supprimer($_GET['id']);
    header("location: list.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Liste des patients</title>
    </head>
    <body onload print ()>
<div class="global" style="background-color: #006666;">
            <h4 class="text-center text-light">LISTE DES PATIENTS</h4>
            <div class="cont-table" id="header mb-3">
            <table id="myTable" class="table table-bordered table-responsive-sm">
            <thead>
                            <tr>
                                <th class="text-center">
                                    N°
                                </th>
                                <th class="text-center">
                                    Nom
                                </th>
                                <th class="text-center">
                                    Prénom
                                </th>
                                <th class="text-center">
                                    Genre
                                </th>

                                <th class="text-center">
                                    Age
                                </th>

                                <th class="text-center">
                                    Groupe sanguin
                                </th>

                                <th class="text-center">
                                    Téléphone
                                </th>

                                <th class="text-center">
                                    Adresse
                                </th>
                            </tr>
                            </thead>
                           <tbody>
                           <tr>             
                                       <?php    
                                       foreach($list_patient as $key => $value) {
                                       ?>
                                         <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$value->getNom()?></td>
                                            <td><?=$value->getPrenom()?></td>
                                            <td><?=$value->getGenre()?></td>
                                            <td><?=$value->getAge()?></td>
                                            <td><?=$value->getG_sanguin()?></td>
                                            <td><?=$value->getTelephone()?></td>
                                            <td><?=$value->getAddresse()?></td>
                                         </tr>
                                        <?php
                                        }
                                        ?>   
                                    </tr>
                            </table> 
                </div>
        
</div> 
    </body>
</html>
