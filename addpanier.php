<?php
require '_header.php';
if(isset($_GET['id'])){
	$ad = $DB->query1('SELECT id FROM ads WHERE id=:id',array('id'=>$_GET['id']));
		if (empty($ad)){
			die('Ce produit n\'existe pas');
		}
		$panier->add($ad[0]->id);
	
		die('Le produit a bien été ajouté à votre panier!</br> <a href="javascript:history.back()">Retourner sur le catalogue</a>');
		
}else{  die('Vous n\'avez pas sélecionné de produit à ajouter au panier');
}
?>
