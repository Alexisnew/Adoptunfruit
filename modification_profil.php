<?php require 'header.php'; 

		if($_SESSION['pseudodeconnexion']){
		    $pseudodeconnexion= $_SESSION['pseudodeconnexion'] ;
	

			if($_GET['action']){
				
			
			}if ($_GET['action'] =='modifyanddelete'){
						
							$req = $DB->getDB()->prepare("SELECT * FROM users");
							$req->execute();
							
							while($use=$req->fetch(PDO::FETCH_OBJ)){

												   echo $use->nom . '</br> '. $use->prenom .' </br>'. $use->adresse .'</br>' .$use->region .'</br>'; 
								?>
								
								<a href="?action=modify&amp;id=<?php echo $use->id ?>"> Modifier </a></br>
							
<?php
							}
						
			}elseif ($_GET['action'] =='modify'){ 
						 
						 		$id=$_GET['id'];
								
					if(isset($_POST['submit'])) {
	
							if ($_POST['motdepasse'] != $_POST['confirmerlemotdepasse']){
		
	
	    $nom= htmlentities(trim($_POST['nom']));
        $prenom= htmlentities(trim($_POST['prenom']));
    
        $motdepasse= md5(htmlentities(trim($_POST['motdepasse'])));
		$confirmerlemotdepasse= htmlentities(trim($_POST['confirmerlemotdepasse']));
		$region= htmlentities(trim($_POST['region']));
		$departement= htmlentities(trim($_POST['departement']));
		$adresse= htmlentities(trim($_POST['adresse']));
		$codepostal= htmlentities(trim($_POST['codepostal']));
	
		$telephone=  htmlentities(trim($_POST['telephone']));
									

											$req = $DB->getDB()->prepare("UPDATE users SET nom='$nom', prenom='$prenom', motdepasse='$motdepasse', region='$region', departement='$departement', adresse='$adresse', codepostal='$codepostal', telephone='$telephone' WHERE id=$id");
							                $req->execute();
							die('Votre profil a bien été modifié <a href="membre.php"> Cliquez sur ce lien pour retourner dans votre espace membre </a>') ;
							
	}
					}
					
		
				$req = $DB->getDB()->prepare("SELECT * FROM users WHERE  id=$id");
				$req->execute();
				
				$data=$req->fetch(PDO:: FETCH_OBJ);
				
?>							
<form  action=" " method="POST" >
<p>Nom: <input type="text" name="nom" pattern=".{3,}"   required title="Votre pseudo doit au moins contenir 3 caractères"  value="<?=$data->nom ?>"> </p>
<p>Prénom: <input type="text" name="prenom" pattern=".{3,}"   required title="Votre pseudo doit au moins contenir 3 caractères" value="<?=$data->prenom ?>"></p>
<p>Mot de passe: <input type="password" name="motdepasse"   pattern=".{6,}"   required title="Votre mot de passe doit au moins contenir 6 caractères" maxlength="15"> <p/>
<p>Confirmer le nouveau mot de passe: <input type="password" name="confirmerlemotdepasse" ></p>
<p>Région: <select id="region"  name="region">
                <option value="<?= $data->region ?>"><?=$data->region ?></option>
 <?php                   
                  $connect= mysql_connect('localhost','root','');
                    mysql_select_db('site');
                    mysql_set_charset('utf8', $connect);
                    $query = mysql_query("SELECT region_nom FROM region ORDER BY region_nom");
                    while ($back = mysql_fetch_assoc($query)) {
                        echo "\t\t\t\t<option value=\"" . $back["region_nom"] . "\">" . $back["region_nom"] . "</option>\n";
                    }
                ?>   
 </select>																																																	  
<p> Département : <select id="departement" name="departement">
                <option value="<?= $data->departement ?>"><?= $data->departement ?></option>
 <?php                   
                  $connect= mysql_connect('localhost','root','');
                    mysql_select_db('site');
                    mysql_set_charset('utf8', $connect);
                    $query = mysql_query("SELECT departement_nom FROM departement ORDER BY departement_nom");
                    while ($back = mysql_fetch_assoc($query)) {
                        echo "\t\t\t\t<option value=\"" . $back["departement_nom"]. "\">" . $back["departement_nom"] . "</option>\n";
                    }
                ?>   
 </select>
<p>Adresse: <input type="text" name="adresse"  value="<?= $data->adresse ?>" ><p/>
<p>Code postal: <input type="text" name="codepostal" pattern=".{5,}"   required title="Votre code postal doit se composer de 5 chiffres" maxlength="5" value="<?= $data->codepostal ?>"><p/>
<p>Téléphone: <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"  required title="Votre numéro de téléphone doit se composer de 10 chiffres" maxlength="10"name="telephone"  value="<?= $data->telephone ?>"><p/>

<input type="submit" value="Modifier" name="submit">
</form>

<?php
} else {  
			
			die ('Une erreur s\'est produite.') ;
			}


			}  
		 else { header( 'Location: homepage.php');
	
		}
	
		
		

?>