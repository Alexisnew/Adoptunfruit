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
						<p id="bienvenue_membre"> Bienvenue </p>
							<p id ="prenom_membre"> &nbsp <?= $display['prenom'] ?> ! </p>
<?php 
$req = $DB->getDB()->prepare("SELECT COUNT(id) as row FROM notifications WHERE lu=:lu AND pseudo='$pseudodeconnexion'");
$req->execute(array(':lu'=>false));

$data = $req->fetch(PDO::FETCH_OBJ);

$count = $data->row;

?>						
  
				<div class="quatreboutons">		
			<div id="deuxpremiersbouttons">			
  <a href="page_annonces.php?action=add" class="action-button shadow animate orange">Mes Annonces</a></br></br></br></br>
 <a href="gestion_profil.php?action=modifyanddelete" class="action-button shadow animate red">  Mon Profil</a>
			</div>
			<div id="deuxderniersbouttons">
  <a  <?php if($count>0):?>  data-notification="<?php echo $count;?>" <?php endif;?> href="messages.php?action=showanddelete" class="action-button notification shadow animate green">Boite de Récéption </a></br></br></br> </br>
  <a href="send.php" class="action-button shadow animate yellow"> Envoyer un Message </a>
			</div>
			</div>
</body>		

<?php
					}

}
}
else { header('Location: login.php') ;
	
}
?>
 <footer>
 <?php require'footer.php' ;?>
</footer>

 
