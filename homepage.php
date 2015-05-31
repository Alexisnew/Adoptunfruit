<?php require 'header.php';  ?>



<body>

	
<?php
						$req = $DB->getDB()->prepare("SELECT * FROM ads");
						$req->execute();
							
							while($ads=$req->fetch(PDO::FETCH_OBJ)){
?>
					<nav >
						<ul id="menu">
							<li><a href="modifier_supprimer_annonces.php?action=show"><img src=" <?= $ads->name;?>.jpg"></a>
									<p><a href="modifier_supprimer_annonces.php?action=show"><?=$ads->name?></a><br><?=$ads->format?> : <?= number_format( $ads->price,2,',',' '); ?> €</br>
									Vendeur : <?=$ads->pseudodeconnexion?></p>
									<a  href="addpanier.php?id=<?= $ads->id;?>">Ajouter au panier</a></p><li>
							</ul>
					</div>
					</nav>
				
<?php  }

?>
				
		



 </body>
 
