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
				
					   
						?> <nav id="nav_membre">
     <ul id="menu">
         <li><a href="page_annonces.php?action=add">Mes annonces</a></li>
         <li><a href="Alertes.html">Alertes</a></li>
         <li><a href="Favoris.html">Favoris</a></li>
         <li><a href="modification_profil.php?action=modifyanddelete">Modifier mes Infos</a></li>
         <li><a href="Note_Vendeur.html">Note Vendeur</a></li>
     </ul>
</nav>
						<a  id="deconnexion_membre" href='logout.php'> Se déconnecter </a>	
						<p id="bienvenue_membre"> Bienvenue <?= $display['prenom'] ?> !</p> 
					
				
<?php
					}

}
}
else { header('Location: login.php') ;
	
}
?>



 
