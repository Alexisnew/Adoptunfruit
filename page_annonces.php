<?php require 'header.php'; 
  	if($_SESSION['pseudodeconnexion']){
	?>
 <div id="div_gestion_ad">

<p><a  class="action-button shadow animate green" href="gestion_annonces.php?action=add"> Ajouter une Annonce </a></p></br></br>
</p><a class="action-button shadow animate yellow" href="gestion_annonces.php?action=modifyanddelete">Gérer mes annonces </a></p>

 <?php 
	}   else { header( 'Location: login.php');
		
		}