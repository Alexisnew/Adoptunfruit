<?php
require'header.php';
date_default_timezone_set('Europe/London'); 
$indent_date = date("d-m-Y");

	if($_SESSION['pseudodeconnexion']){
		$pseudodeconnexion = $_SESSION['pseudodeconnexion'];

$ids = array_keys($_SESSION['panier']);
?>
<div class="table-title">

<h3>Votre Panier</h3>
</div>
<?php
if(empty($ids)){
	$ads=array();
	echo' <p id="panier_vide">Votre panier est vide !</p>';


	
 

  

	die; }else

?> 
<body>
	 <form action=" " method="POST">

<table class="table-fill">

<tr>
<th class="text-left">Image du produit  </th>
<th class="text-left">  Produit </th>
<th class="text-left">  Format</th>
<th class="text-left">Quantité</th>
<th class="text-left">Prix</th>
<th class="text-left">TVA</th>
<th class="text-left">Actions</th>
</tr>
<?php		{
$ads = $DB->query1('SELECT * FROM ads WHERE id IN ('.implode(',',$ids).')');
}


 foreach($ads as $ad):

 $id= $ad->id;
$name= $ad->name;
$pseudo = $_SESSION['pseudodeconnexion'];

  
						 ?>
						

<form method="POST" action =" ">
<div class="table-hover">
<tr>
<td class="text-left"><a href="gestion_annonces.php?action=show&amp;id=<?= $ad->id ?>"><img src=" images/<?= $ad->name;?>.jpg"></a></td>
<td class="text-left"> <?= $ad->name;?></td>
<td class="text-left"> <?= $ad->format; ?></td>
<td class="text-left"> <input  type="number" min="1" name="panier[quantity][<?= $ad->id; ?>]" value="<?= $_SESSION['panier'][$ad->id]?>"></td>
<td class="text-left"><?= number_format( $ad->price,2,',',' '); ?> €</td>
<td class="text-left"> <?= number_format($ad->price * 1.196,2,',',' '); ?> € </td>
<td class="text-left"><a href="panier.php?delPanier=<?= $ad->id;?>" class="button middle1">Supprimer</a></br>
</td>
</div>

 


<?php  



endforeach; ?>


<?php
 if(isset($_POST['Commander'])) {
	 

	 

 
	 $req = "INSERT INTO indent ( id,pseudodeconnexion,pseudo,name,quantity,indent_date) VALUES ";
	 
$fullsub = '';

	 foreach($ads as $cmd)  {
	
$qty =  $_SESSION['panier'][$cmd->id] ;		
	

$sub= "'".$cmd->id ."'"  .','. "'".$cmd->pseudodeconnexion."'" .','. "'".$pseudo."'" .','. "'".$cmd->name . "'" .','. "'".$qty." '".','. "'".$indent_date." '" ;

$fullsub = $fullsub .  '('  .$sub . ')'.',';



 
	 }
 $req= $req . rtrim($fullsub, ','.')' ) . ')';
 $query= $DB->getDB()->prepare($req);
 $query->execute(); 
 unset($_SESSION['panier'] );
 die(' <div id="cmd_save"><p id="cmd_save1">Votre Commande a bien été enregistrée</p> <br/> <br/> <br/><a  class="action-button shadow animate yellow" href="membre.php"> Mon Compte</a></div></br></br>');

 }
	} else { header( 'Location: login.php');
		
		} 

?>
</table>
 <p id="total_amount">Montant  Total :  <?= number_format( $panier->total() * 1.196,2,',',' '); ?> € </p>

<input type="submit" value="Recalculer" id="recalculer">
 <input type="submit"  name="Commander" value="Valider" id="btn_cmd">

	</form>


    
</body>
<footer>
<?php require'footer.php' ;?>
</footer>
	