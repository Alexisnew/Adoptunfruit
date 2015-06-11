<?php require'header.php'; 


function search($DB){
	
	global $req , $search , $count, $display;
	
	if(!empty($_POST['search'])){
		
		if(isset($_POST['submit1'])) {
		$search='%'.$_POST['search'].'%';
		
		$req=$DB->getDB()->prepare('SELECT * FROM ads WHERE name LIKE :search');
		$req->execute(array(
		'search'=> $search
		));
		
		$count=$req->rowCount();
				
				if ($count>=1){
?>
<body >
<div id="div_search">
<?php
					echo "<p id='result_r1'>$count résultat(s) trouvé(s) pour <srong> $search </strong></p> "; ?>
</div>
<?php
					while($display=$req->fetch()) { 
					
					?>
					<div id="srh">
	<div id="div_search1">
					
	
					<div class="vendeur_homepage">
					Vendeur : <a id="link"href="gestion_profil.php?action=show&amp;pseudodeconnexion=<?= $display['pseudodeconnexion']  ?>"><?= $display['pseudodeconnexion'] ?></a><br/>
				</div>	
			<div>
				<a href="gestion_annonces.php?action=show&amp;id=<?= $display['id']?>"><img   class="annonce_img" src="images/<?= $display['name'];?>.jpg"></a>
				</div>
				
				<div class="infos_homepage">
			
							<a  id="link" href="gestion_annonces.php?action=show&amp;id=<?= $display['id'] ?>"><?=$display['name']?></a><br/>
							<?=$display['format']?> :  <?= number_format( $display['price']  * 1.196 ,2,',',' '); ?> €<br/>
							Ajouté le : <?=$display['add_date']?><br/></br>
								 <a class=" button add" href="addpanier.php?id=<?= $display['id'];?>" onClick="alert('Produit ajouté avec succès !')">Ajouter au Panier</a>
	
								 </div></br>
				
				</div>
				</div>
						



<?php
					}
						
				} else {
				?> <div id="div_search"> 
<?php
					echo "<p id='result_r2'>0 résultats trouvés pour <srong>$search</strong></p>" ; ?>
					</div>
					</body>
<?php
					
					}
				
		} 		if(isset($_POST['submit2'])) {
			if(isset($_SESSION['pseudodeconnexion'])) {
						    $pseudodeconnexion = $_SESSION['pseudodeconnexion'] ;
							$req = $DB->getDB()->prepare("SELECT * FROM users  WHERE pseudodeconnexion='$pseudodeconnexion'");
									$req->execute();
									$use = $req->fetch(PDO::FETCH_OBJ);
	 
									
										
									$departement = $use->departement;
							
		$search='%'.$_POST['search'].'%';
		
		$req=$DB->getDB()->prepare("SELECT * FROM ads WHERE pseudodeconnexion <> '$pseudodeconnexion' AND departement='$departement' AND  name LIKE :search");
		$req->execute(array(
		'search'=> $search
		));
		
		$count=$req->rowCount();
				
				if ($count>=1){
?>
<body >
<div id="div_search">
<?php
					echo "<p id='result_r'>$count résultat(s) trouvé(s) pour <srong> $search </strong> dans votre département</p> "; ?>
</div>
<?php
					while($display=$req->fetch()) { 
					
					?>
					<div id="srh">
	<div id="div_search1">
					
	
					<div class="vendeur_homepage">
					Vendeur : <a id="link"href="gestion_profil.php?action=show&amp;pseudodeconnexion=<?= $display['pseudodeconnexion']  ?>"><?= $display['pseudodeconnexion'] ?></a><br/>
				</div>	
			<div>
				<a href="gestion_annonces.php?action=show&amp;id=<?= $display['id']?>"><img   class="annonce_img" src="images/<?= $display['name'];?>.jpg"></a>
				</div>
				
				<div class="infos_homepage">
			
							<a  id="link" href="gestion_annonces.php?action=show&amp;id=<?= $display['id'] ?>"><?=$display['name']?></a><br/>
							<?=$display['format']?> :  <?= number_format( $display['price']  * 1.196 ,2,',',' '); ?> €<br/>
							Ajouté le : <?=$display['add_date']?><br/></br>
								 <a class=" button add" href="addpanier.php?id=<?= $display['id'];?>" onClick="alert('Produit ajouté avec succès !')">Ajouter au Panier</a>
	
								 </div></br>
				
				</div>
				</div>
						



<?php
					}
						
				} else {
				?> <div id="div_search"> 
<?php
					echo "<p id='result_r3'> 0 résultat trouvé pour <srong>$search</strong> dans votre département </p>" ; ?>
					</div>
					</body>
<?php
					
					}
			}	else { header( 'Location: login.php');
		
		}
		
		}
		
	}
}

search($DB);



?>
<footer>

<?php require'footer.php' ; ?>
</footer>