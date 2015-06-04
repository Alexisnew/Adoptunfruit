<?php require'header.php'; 


if($_SESSION['pseudodeconnexion']){
$pseudodeconnexion = $_SESSION['pseudodeconnexion'];

$req=$DB->getDB()->prepare('SELECT * FROM users WHERE pseudodeconnexion LIKE :pseudodeconnexion');
$req->execute(array(
		'pseudodeconnexion'=> $pseudodeconnexion
		));
		
		$count=$req->rowCount();
				
				if ($count>=1){
			
					while($display=$req->fetch()) { 
				
					   
						?>
<body>
						<p id="bienvenue_membre"> Bienvenue <?= $display['prenom'] ?> !</p> </br>
						
						
			<div id="deuxpremiersbouttons">			
  <a href="page_annonces.php?action=add" class="action-button shadow animate blue">Mes Annonces</a></br></br></br></br>
  <a href="gestion_profil.php?action=modifyanddelete" class="action-button shadow animate red">Mon Profil</a>
			</div>
			<div id="deuxderniersbouttons">
  <a href="#" class="action-button shadow animate green">Mes Alertes</a></br></br></br></br>
  <a href="#" class="action-button shadow animate yellow">Mes Favoris</a>
			
</body>		
<?php
					}

}
}
else { header('Location: login.php') ;
	
}
?>



 
