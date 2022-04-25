<?php 
function bd()
{
try {
$bdd= new PDO('mysql:host=localhost;dbname=db_patient_extra','root','');

} catch (Exception $e) {
	$e->getMessage();
}
 return $bdd;
}
?>
