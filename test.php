<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Recherches</title>


<?php
require'header.php';
// Initialisation de la variable contenant les résultats
$resultats="";

// traitement requete
if(isset($_POST['query']) && !empty($_POST['query'])){ // On traite la requete ssi qqc est entré
	
$query = preg_replace("#[^a-z ?0-9]#i", "", $_POST['query']);
 // tout ce qui n'est pas compris dans a-z et 0-9 est transformé en chaine vide, i= insensible à la casse -> pas de != entre majuscules et minuscules

 $sel="SELECT name  FROM ads WHERE name LIKE %'.$query.'%";



 $req = $DB->getDB()->prepare($sel);
 $req->execute(array('%'.$query.'%'));
 
 $count = $req->rowCount();
 
		if($count >=1){
			$sel1=$DB->getDB()->prepare"SELECT*FROM ads";
			$sel1->execute(array());
			echo "$count résultat(s) trouvé(s) pour <srong> $query </strong><hr/> ";
						while($data= $req->fetch(PDO:: FETCH_OBJ)){
				echo ' Produit: '. $data->nm .'  ';
				}
		} else {
			
			echo "0 résultats trouvés pour <srong>$query</strong><hr/>" ;
		}
	
}




?>


<form action="test.php" method="POST">
<label for="query"> Entrez votre recherche : </label>
<input type="search" name="query" maxlength="40" size="40" id="query" pattern=".{3,}" required title="Saisissez au moins 3 caractères"/>
<input type="submit" value="Rechercher">
</form>

<?= $resultats; ?>