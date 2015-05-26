<?php
require'header.php';


$ids = array_keys($_SESSION['panier']);

if(empty($ids)){
	$ads=array();
	echo"Votre panier est vide.";
}else{
$ads = $DB->query1('SELECT * FROM ads WHERE id IN ('.implode(',',$ids).')');

} 	
foreach($ads as $ad):
?>

  
	
	<span  class="pict"><img src=" <?= $ad->name;?>.jpg"><?= $ad->name; ?> </span>
    <span  class="price"> <?= number_format( $ad->price,2,',',' '); ?> € </span>
	<span class ="quantity"><?= $_SESSION['panier'][$ad->id]?></span>
	<span class="subtotal"><?= number_format($ad->price * 1.196,2,',',' '); ?> € </span>
	<span class="add"><a href="panier.php?delPanier=<?= $ad->id;?>" class="del"><img src="trash.png"></a></span>
	</p>
	

	<?php endforeach;?>

<?php include'footer.php' ; ?>