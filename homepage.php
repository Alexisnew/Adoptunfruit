<?php require 'header.php';  ?>



<body>

	
<?php
						$req = $DB->getDB()->prepare("SELECT * FROM ads");
						$req->execute();
							
							while($ads=$req->fetch(PDO::FETCH_OBJ)){
?>
			
					
							<img src=" <?= $ads->name;?>.jpg">
									<p><?=$ads->name?></a><br><?=$ads->format?> : <?= number_format( $ads->price,2,',',' '); ?> €</br>
									Vendeur : <a href="modification_profil.php?action=show&amp;pseudodeconnexion=<?= $ads->pseudodeconnexion ?>"><?=$ads->pseudodeconnexion?></p></a>
									<a  href="addpanier.php?id=<?= $ads->id;?>">Ajouter au panier</a></p><li>
					
				
<?php  

							}

?>
				
		



 </body>
 
