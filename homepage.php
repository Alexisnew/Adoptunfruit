<?php require 'header.php'; 


if(!isset($_SESSION['pseudodeconnexion']))  {



?>
<body>

					
			<p id="last_news"> Dernières Actualités<p>
<section>
					<article>
<?php
			
					
						$req = $DB->getDB()->prepare("SELECT * FROM ads  ORDER BY id DESC LIMIT 0, 3");
						$req->execute();																																								

							while($ads=$req->fetch(PDO::FETCH_OBJ)){
?>
					
					<div class="vendeur_homepage">
					Vendeur : <a id="link"href="gestion_profil.php?action=show&amp;pseudodeconnexion=<?= $ads->pseudodeconnexion ?>"><?=$ads->pseudodeconnexion?></a><br/>
				</div>	
			<div>
				<a href="gestion_annonces.php?action=show&amp;id=<?= $ads->id ?>"><img   class="annonce_img" src="images/<?= $ads->name;?>.jpg"></a>
				</div>
				
				<div class="infos_homepage">
			
							<a  id="link" href="gestion_annonces.php?action=show&amp;id=<?= $ads->id ?>"><?=$ads->name?></a><br/>
							<?=$ads->format?> :  <?= number_format( $ads->price  * 1.196 ,2,',',' '); ?> €<br/>
							Ajouté le : <?=$ads->add_date?><br/></br>
								 <a class=" button add" href="addpanier.php?id=<?= $ads->id;?>" onClick="alert('Produit ajouté avec succès !')">Ajouter au Panier</a>
	
								 </div></br>
								
					
			
<?php  


							}

?>


					</article>
		 <aside>
                  <h3>Le saviez vous??</h3>
                  
<?php
						$req = $DB->getDB()->prepare("SELECT * FROM savezvous ORDER  BY RAND() DESC LIMIT 2");
						$req->execute();
							
							while($savezvous=$req->fetch(PDO::FETCH_OBJ)){
?>
					
					<div class="title">
							<a id="title" "title=<?= $savezvous->title ?>"><?=$savezvous->title?></a><br/>
					</div>	
					</br>
					<div>
							<a id="description" > <?=$savezvous->description?> </a>
					</div>
					</br></br></br>
				
<?php  

							}

?>
                   
                  <a href="https://www.facebook.com/pages/Adoptun-fruit/1595622670725730?fref=ts"/> <img id="fb" src="images/FB.png" alt="facebook" /></a>
					<a  href="https://twitter.com/?lang=fr"> <img id="tw" src="images/TW.png" alt="twitter"/></a>


					</aside>
				</section>

 </body>
 	
<footer>
 <?php require'footer.php' ;?>
</footer>
<?php  } else {
	

 ?>
<body>

					
			<p id="last_news"> Dernières Actualités Près de Chez Vous !<p>
<section>
					<article>
<?php
			
						  $pseudodeconnexion = $_SESSION['pseudodeconnexion'] ;
						$req1 = $DB->getDB()->prepare("SELECT * FROM users  WHERE pseudodeconnexion='$pseudodeconnexion'");
						$req1->execute();
						$use = $req1->fetch(PDO::FETCH_OBJ);
						$departement = $use->departement;
					
						$req = $DB->getDB()->prepare("SELECT * FROM ads  WHERE pseudodeconnexion <> '$pseudodeconnexion' AND departement='$departement' ORDER BY id DESC LIMIT 0, 3");
						$req->execute();																																								

							while($ads=$req->fetch(PDO::FETCH_OBJ)){
?>
					
					<div class="vendeur_homepage">
					Vendeur : <a id="link"href="gestion_profil.php?action=show&amp;pseudodeconnexion=<?= $ads->pseudodeconnexion ?>"><?=$ads->pseudodeconnexion?></a><br/>
				</div>	
			<div>
				<a href="gestion_annonces.php?action=show&amp;id=<?= $ads->id ?>"><img   class="annonce_img" src="<?= $ads->name;?>.jpg"></a>
				</div>
				
				<div class="infos_homepage">
			
							<a  id="link" href="gestion_annonces.php?action=show&amp;id=<?= $ads->id ?>"><?=$ads->name?></a><br/>
							<?=$ads->format?> :  <?= number_format( $ads->price  * 1.196 ,2,',',' '); ?> €<br/>
							Ajouté le : <?=$ads->add_date?><br/></br>
								 <a class=" button add" href="addpanier.php?id=<?= $ads->id;?>" onClick="alert('Produit ajouté avec succès !')">Ajouter au Panier</a>
	
								 </div></br>
								
					
			
<?php  


							}

?>


					</article>
		 <aside>
                  <h3>Le saviez vous??</h3>
                  
<?php
						$req = $DB->getDB()->prepare("SELECT * FROM savezvous ORDER  BY RAND() DESC LIMIT 2");
						$req->execute();
							
							while($savezvous=$req->fetch(PDO::FETCH_OBJ)){
?>
					
					<div class="title">
							<a id="title" "title=<?= $savezvous->title ?>"><?=$savezvous->title?></a><br/>
					</div>	
					</br>
					<div>
							<a id="description" > <?=$savezvous->description?> </a>
					</div>
					</br></br></br>
				
<?php  

							}

?>
                   
                  <a href="https://www.facebook.com/pages/Adoptun-fruit/1595622670725730?fref=ts"/> <img id="fb" src="images/FB.png" alt="facebook" /></a>
					<a  href="https://twitter.com/?lang=fr"> <img id="tw" src="images/TW.png" alt="twitter"/></a>


					</aside>
				</section>

 </body>
 	
 <footer>
 <?php require'footer.php' ;?>
</footer>
<?php } 
