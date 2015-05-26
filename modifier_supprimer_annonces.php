<?php require'header.php'; 

			
				
if($_SESSION['pseudodeconnexion']){
	
$pseudodeconnexion = $_SESSION['pseudodeconnexion'];

$req=$DB->getDB()->prepare('SELECT * FROM ads WHERE pseudodeconnexion LIKE :pseudodeconnexion');
		$req->execute(array(
		'pseudodeconnexion'=> $pseudodeconnexion
		));
		
		$count=$req->rowCount();
				
				if ($count>=1){
			
					while($display=$req->fetch()) { 
					?>
			
		    <p><?=$display['name']. ' '. $display['price'].'€'. ' '. $display['format']. ' '. $display['quantity'] ?> </p>

<?php

					}
				}
}

?>