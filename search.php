<?php require'header.php'; 
require'indexsearch.php';

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
					
						echo $display['name'].' '.$display['price'], '€'.' '.$display['format'] ;
						?><img src="<?= $display['name']; ?>.jpg"/>
						



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