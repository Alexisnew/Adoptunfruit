<?php
require'header.php';


	if($_SESSION['pseudodeconnexion']){
		$pseudodeconnexion = $_SESSION['pseudodeconnexion'];

$ids = array_keys($_SESSION['panier']);

if(empty($ids)){
	$ads=array();
	echo"Votre panier est vide.";
}else{
$ads = $DB->query1('SELECT * FROM ads WHERE id IN ('.implode(',',$ids).')');

} 	
 
?> <body>
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
		    <td> &nbsp   &nbsp &nbsp &nbsp &nbsp Quantité     </td>
		<td>   &nbsp   &nbsp &nbsp &nbsp Ajouté le  </td>
	        <td>   &nbsp   &nbsp   &nbsp   &nbsp Retirer </td></p>
	</tr>

<?php foreach($ads as $ad):

$id= $ad->id;
$name= $ad->name;
$quantity = $_SESSION['panier'][$ad->id];

if (isset($_POST['submit'])){


				
						$req = $DB->getDB()->prepare("INSERT INTO indent (id, pseudodeconnexion, name, quantity) VALUES('$id','$pseudodeconnexion','$name','$quantity')");
						
						$req->execute();
				
								unset($_SESSION['panier']);
						die('Votre commande a bien été prise en compte, cliquez <a href="homepage.php"> ici </a> pour retourner à l\'accueil');
		
				
  }
  
						 ?>
						
						
	<p>
  	<td colspan="3"> </td>
	<tr>
	<td><img src=" <?= $ad->name;?>.jpg"></td>
	<td>  &nbsp &nbsp  &nbsp  <?= $ad->name; ?></td>
	<td> &nbsp   &nbsp &nbsp   &nbsp   &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp  <?=$ad->pseudodeconnexion ; ?> </td>
	<td>     &nbsp  &nbsp  &nbsp  <?= $ad->format; ?></td>
    <td>   &nbsp &nbsp &nbsp <?= number_format( $ad->price,2,',',' '); ?> € </td> 
	<td> &nbsp   &nbsp  &nbsp   &nbsp <?= number_format($ad->price * 1.196,2,',',' '); ?> € </td>
	 <td>  &nbsp  &nbsp    &nbsp &nbsp &nbsp <?= $_SESSION['panier'][$ad->id]?></td>
	<td>           &nbsp   &nbsp    &nbsp   &nbsp &nbsp &nbsp  <?= $ad->add_date; ?>  </td>
<td> &nbsp  &nbsp &nbsp   &nbsp    &nbsp   &nbsp <a href="panier.php?delPanier=<?= $ad->id;?>" class="del"><img src="trash.png"></a></td>
	
	</tr>
</p></br>
</body>
						<?php 

 endforeach;
 

	} else { header( 'Location: login.php');
		
		} ?>

	<td>Nombre de produits : <?= $panier->count();?></td>
	<td>  &nbsp  &nbsp  &nbsp  &nbspTotal :  <?= number_format( $panier->total() * 1.196,2,',',' '); ?> €</td> 

	
<form action=" " method="POST">
<input type="submit" name="submit" value="Valider la Commande">
</form>
	