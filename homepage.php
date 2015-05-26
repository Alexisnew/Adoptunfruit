<?php require 'header.php';  ?>



<body>

	<section>

		<article>
					
					<?php $ads = $DB-> query1('SELECT * FROM ads');?> 
					<?php foreach ( $ads as $ad) :?>
					
							<ul>
								
						
									<li><p><img src=" <?= $ad->name;?>.jpg">
									<p><?=$ad->name?><br><?= number_format( $ad->price,2,',',' '); ?> €
									<a  href="addpanier.php?id=<?= $ad->id;?>">Ajouter au panier</a></p></li>
							</ul>
					
					<?php  endforeach; ?>
				
		</article>
			<aside>

					<div id="div4">
					<a href="panier.php"><h1 id="titre_panier">Votre Panier</h1></a>
					
						<p>Nombre de produits : <?= $panier->count();?></br>
						 Total : <?= number_format( $panier->total(),2,',',' '); ?> €</br>
						</p>
					</div>

			</aside>

	</section>



 </body>
 
