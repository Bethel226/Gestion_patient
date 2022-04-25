<?php

require_once "connection.php";

if(isset($_REQUEST['btn_insert']))
{

	$nom	= $_REQUEST['nom'];	
	$prenom	= $_REQUEST['prenom'];
	$genre	= $_REQUEST['genre'];	
	$telephone	= $_REQUEST['telephone'];
	$adresse	= $_REQUEST['adresse'];	
	$age	= $_REQUEST['age'];
	$g_sanguin	= $_REQUEST['g_sanguin'];	
	$m_actuelle	= $_REQUEST['m_actuelle'];
	$antecedant	= $_REQUEST['antecedant'];	

	if(empty($nom)){
		$errorMsg="Svp Entrez le nom";
	}
	else if(empty($prenom)){
		$errorMsg="Svp Entrez le prenom";
	}
	else if(empty($genre)){
		$errorMsg="Svp choisissez le genre";
	}
	else if(empty($telephone)){
		$errorMsg="Svp Entrez le telephone";
	}
	else if(empty($adresse)){
		$errorMsg="Svp Entrez l'adresse";
	}
	else if(empty($age)){
		$errorMsg="Svp Entrez l'age";
	}
	else if(empty($g_sanguin)){
		$errorMsg="Svp choisissez le groupe sanguin";
	}
	else if(empty($m_actuelle)){
		$errorMsg="Svp Entrez la maladie";
	}
	else if(empty($antecedant)){
		$errorMsg="Svp Entrez son antecedant";
	}
	else
	{
		try
		{
			if(!isset($errorMsg))
			{
				$insert_stmt=$db->prepare('INSERT INTO Patient(nom,prenom,genre,telephone,adresse,age,g_sanguin,m_actuelle,antecedant) 
				VALUES(:nom,:prenom,:genre,:telephone,:adresse,:age,:g_sanguin,:m_actuelle,:antecedant)'); 
				//sql insert query					
				$insert_stmt->bindParam(':nom',$nom);
				$insert_stmt->bindParam(':prenom',$prenom); 
				$insert_stmt->bindParam(':genre',$genre);
				$insert_stmt->bindParam(':telephone',$telephone);
				$insert_stmt->bindParam(':adresse',$adresse); 
				$insert_stmt->bindParam(':age',$age);
				$insert_stmt->bindParam(':g_sanguin',$g_sanguin);
				$insert_stmt->bindParam(':m_actuelle',$m_actuelle); 
				$insert_stmt->bindParam(':antecedant',$antecedant);
				if($insert_stmt->execute())
				{
					$insertMsg="Données insérees avec succès........"; 
					header("refresh:3;liste_pat.php"); 
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
	<link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <?php include 'style.php';?>
</head>
<body>
<?php include 'menu_page.php';?>  
	
<div class="nic_bg1 ">
<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div class="alert alert-success">
				<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}
		?> 
		<div style="text-align: center;"><h2>AJOUTER UN PATIENT</h2></div> 
		<div id='formulaire_bircof'>
            <form class="form_bircof" method="post" action="ajouter_pat.php" enctype = "multipart/form-data">
                <div class="form-row d-flex">
                    <div class="col md-6">
                        <input type="text" class="form-control" placeholder="Nom" name="nom"  required autofocus>
                    </div>
					&nbsp; &nbsp;&nbsp;
                    <div class="col md-6">
                        <input type="text" class="form-control" placeholder="Prénom" name="prenom" required>
                    </div>
                </div>

                <br>

                <div class="col md-12 d-flex">
                    <div class="col md-6">
                    
				<select class="form-select" type="text" aria-label="Default select example" name="genre"  value="<?php echo $genre; ?>">
                <option selected > Genre </option>
                <option value="Masculin">Masculin</option>
                <option value="Feminin">Feminin</option>
                </select>
                    </div>
					&nbsp; &nbsp;&nbsp;
                    <div class="col md-6">
                        <input type="number" class="form-control" placeholder="Age" name="age" required>
                    </div>
                </div>

                <br>

                <div class="col md-12 d-flex">
                    <div class="col md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Adresse" name="adresse">
                        </div>
                    </div> 
					&nbsp; &nbsp;&nbsp;
                    <div class="col md-6">
                        <input type="tel" class="form-control" placeholder="Téléphone" name="telephone" required>
                    </div>
                </div>

                <br>

                <div class="col md-12 d-flex">
                    <div class="col md-6">
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
					&nbsp; &nbsp;&nbsp;
                    <div class="col md-6">
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
                 

				<div class="col-sm-offset-3 col-sm-9 m-t-15">
					<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
Ajouter
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
    
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment ajoutez un patient?
      </div>
      <div class="modal-footer">
	   <button  class="btn btn-success" type="submit"  name="btn_insert" class="btn btn-danger " value="Ajouter" >Valider</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button> 
      </div>
    </div>
  </div>
</div>
		<a href="liste_pat.php" class="btn btn-dark">Supprimer</a>
		</div>
			</form>
			
		</div>
		
	</div>
			
	</div>
	<br>
</div>	
      <?php include 'pied.php';?>
      <?php include 'script.php';?>
	  <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
      <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
      <script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>									
	</body>
</html>