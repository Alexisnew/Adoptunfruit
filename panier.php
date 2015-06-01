<?php
require'header.php';

?>
 <tr>
			<td  colspan="6"> Votre Panier </td>
	</tr>
	<tr> <p>
			<td>  &nbsp  &nbsp Image du produit      &nbsp   &nbsp   &nbsp </td>
	        <td> Nom du Produit  &nbsp </td>
			<td> &nbsp  &nbsp Vendu par </td>
	        <td> &nbsp &nbsp &nbsp  Format  &nbsp  &nbsp  </td>
	        <td> &nbsp &nbsp  Prix      </td>
			<td>   &nbsp   &nbsp &nbsp &nbsp TVA </td>
		    <td> &nbsp &nbsp &nbsp Quantité     </td>
			<td> &nbsp &nbsp &nbsp Total </td> 
	        <td>   &nbsp   &nbsp   &nbsp   &nbsp Retirer </td></p>
	</tr>

<?php
$ids = array_keys($_SESSION['panier']);

if(empty($ids)){
	$ads=array();
	echo"Votre panier est vide.";
}else{
$ads = $DB->query1('SELECT * FROM ads WHERE id IN ('.implode(',',$ids).')');

} 	
foreach($ads as $ad):
?>

  	<td colspan="3"> </td>
	<tr>
	<td><img src=" <?= $ad->name;?>.jpg"></td>
	<td>  &nbsp &nbsp  &nbsp  <?= $ad->name; ?></td>
	<td>  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp  <?=$ad->pseudodeconnexion ; ?> </td>
	<td>     &nbsp  &nbsp  &nbsp  <?= $ad->format; ?></td>
    <td>   &nbsp &nbsp &nbsp <?= number_format( $ad->price,2,',',' '); ?> € </td> 
	<td>  &nbsp   &nbsp <?= number_format($ad->price * 1.196,2,',',' '); ?> € </td>
	<td>  &nbsp  &nbsp    &nbsp &nbsp &nbsp <?= $panier->count();?></td>
	<td>   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp  <?= number_format( $panier->total() * 1.196,2,',',' '); ?> €</td>
<td>     &nbsp   &nbsp    &nbsp   &nbsp<a href="panier.php?delPanier=<?= $ad->id;?>" class="del"><img src="trash.png"></a></td>
	
	</tr>

	<?php endforeach;?>

