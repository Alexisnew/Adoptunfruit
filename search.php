<?php require'header.php'; 


function search($DB){
	
	global $req , $search , $count, $display;
	
	if(!empty($_POST['search'])){
		
		$search='%'.$_POST['search'].'%';
		
		$req=$DB->getDB()->prepare('SELECT * FROM ads WHERE name LIKE :search');
		$req->execute(array(
		'search'=> $search
		));
		
		$count=$req->rowCount();
				
				if ($count>=1){
?>
<div id="div_search">
<?php
					echo "<p>$count résultat(s) trouvé(s) pour <srong> $search </strong></p> "; ?>
</div>
<?php
					while($display=$req->fetch()) { 
					?><img src="<?= $display['name']; ?>.jpg"/>
<?php						echo $display['name'].' '.$display['price'], '€'.' '.$display['format'] ;
						?>
					<a href="gestion_annonces.php?action=show&amp;id=<?= $display['id'] ?>">Détails de l'annonce</a>
						



<?php
					}
						
				} else {
				?> <div id="div_search"> 
<?php
					echo "0 résultats trouvés pour <srong>$search</strong>" ; ?>
					</div>
<?php
					
					}
				
		
		
	}
}

search($DB);



?>