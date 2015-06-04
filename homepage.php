<?php require 'header.php';  ?>



<body>

					
			<p id="last_news"> Dernières Actualités<p></br>

<?php
						$req = $DB->getDB()->prepare("SELECT * FROM ads ORDER BY id DESC LIMIT 0, 4");
						$req->execute();
							
							while($ads=$req->fetch(PDO::FETCH_OBJ)){
?>
					<section>
					<article>
					<table>
					<tr>
							<td>Vendeur : <a id="link"href="gestion_profil.php?action=show&amp;pseudodeconnexion=<?= $ads->pseudodeconnexion ?>"><?=$ads->pseudodeconnexion?></a><a href="gestion_annonces.php?action=show&amp;id=<?= $ads->id ?>"><img class="annonce_img" src="<?= $ads->name;?>.jpg"></a></td>
									<td><p  class="description"><a  id="link" href="gestion_annonces.php?action=show&amp;id=<?= $ads->id ?>"><?=$ads->name?></a><br><?=$ads->format?> : <?= number_format( $ads->price,2,',',' '); ?> €</br> Ajouté le :<?=$ads->add_date?></br></br>

									 &nbsp  &nbsp <a class=" button add" href="addpanier.php?id=<?= $ads->id;?>">Ajouter au Panier</a></p></td>
					</tr>
					</table>
				</article>
<?php  

							}

?>
				
		 <aside>
                    <h3>À propos du site</h3>
                  
                   
                    <p>Eodem tempore Serenianus ex duce, cuius ignavia populatam in Phoenice Celsen ante rettulimus, pulsatae maiestatis imperii reus iure postulatus ac lege, incertum qua potuit suffragatione absolvi, aperte convictus familiarem suum cum pileo, quo caput operiebat, incantato vetitis artibus ad templum misisse fatidicum, quaeritatum expresse an ei firmum portenderetur imperium, ut cupiebat, et cunctum.

Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.

Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac Constantinus iunxerat pater, Megaera quaedam mortalis, inflammatrix saevientis adsidua, humani cruoris avida nihil mitius quam maritus; qui paulatim eruditiores facti processu temporis ad nocendum per clandestinos versutosque rumigerulos conpertis leviter addere quaedam male suetos falsa et placentia sibi discentes, adfectati regni vel artium nefandarum calumnias insontibus adfligebant.

In his tractibus navigerum nusquam visitur flumen sed in locis plurimis aquae suapte natura calentes emergunt ad usus aptae multiplicium medelarum. verum has quoque regiones pari sorte Pompeius Iudaeis domitis et Hierosolymis captis in provinciae speciem delata iuris dictione formavit.

</p>
                   
                    
                </aside
				
				></section>
	

 </body>
 
