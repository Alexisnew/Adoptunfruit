<?php
require '_header.php';
if(isset($_GET['id'])){
	$ad = $DB->query1('SELECT id FROM ads WHERE id=:id',array('id'=>$_GET['id']));
		if (empty($ad)){
			die('Ce produit n\'existe pas');
		}
		$panier->add($ad[0]->id);
	
		header( 'Location: homepage.php');
		
}else{  die('Vous n\'avez pas sélecionné de produit à ajouter au panier');
}
?>
