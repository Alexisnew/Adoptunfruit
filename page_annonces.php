<?php require 'header.php'; 
  	if($_SESSION['pseudodeconnexion']){
	?>
<body>
 <div id="div_gestion_ad">
 
<p> <a  class="action-button shadow animate orange" href="sales.php">   &nbsp &nbsp &nbsp Mes Ventes  &nbsp &nbsp &nbsp </a></p></br></br>
<p><a  class="action-button shadow animate green" href="gestion_annonces.php?action=add"> Ajouter une Annonce </a></p></br></br>
</p> &nbsp <a class="action-button shadow animate yellow" href="gestion_annonces.php?action=modifyanddelete">Gérer mes annonces </a></p>
</div>
 <?php 
	}   else { header( 'Location: login.php');
		
		}
?>
</body>
<footer>
<?php require'footer.php' ;?>
</footer>