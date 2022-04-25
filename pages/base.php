<?php 
function bd()
{
try {
$bdd= new PDO('mysql:host=localhost;dbname=app_gest_patient','root','');

} catch (Exception $e) {
	$e->getMessage();
}
 return $bdd;
}
?>
