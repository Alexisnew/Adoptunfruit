<?php 
require'header.php';

	if(isset($_POST['submit']))
	// Vérifie que l'utilisateur envoie le formulaire 
	{
		if(empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['pseudodeconnexion']) OR empty($_POST['motdepasse']) OR empty($_POST['confirmerlemotdepasse']) OR empty($_POST['region']) OR empty($_POST['departement']) OR empty($_POST['adresse']) OR empty($_POST['codepostal']) OR empty($_POST['courriel']) OR empty($_POST['telephone']) OR empty($_POST['checkbox'])) 
	// Vérifie que tous les champs sont remplis
		{
		echo 'Veuillez saisir tous les champs';
	// Sinon on affiche le message d'erreur ci-dessus
		}
		$req = $DB->getDB()->prepare('SELECT COUNT(pseudodeconnexion)  AS nbpse FROM users WHERE pseudodeconnexion = ?'); 
		// On prépare la une requête permettant de compter le nombre de pseudos présent dans la base de données qui sont semblables au pseudo qui vient d'être trouvé
		$req->execute(array($_POST['pseudodeconnexion']));
		$result = $req->fetch();
			
				if($result['nbpse'] >0) 
				// Si le pseudo existe déjà dans la base de données on affiche un message d'erreur
				{
					
					echo' Ce pseudo n\'est pas disponible'; 
				}
				// Sinon on répète la même action avec le courriel pour que celui-ci soit unique
				$req1 = $DB->getDB()->prepare('SELECT COUNT(courriel)  AS nbcou FROM users WHERE courriel = ?'); // On empêche la création de deux courriel semblablent
		        $req1->execute(array($_POST['courriel']));
		        $result1 = $req1->fetch();
				
						if($result1['nbcou'] >0) 
						// Si le courriel existe déjà dans la base de donnée on affiche une message d'erreur
						{
							
							echo' Ce courriel n\'est pas disponible';
						}
					
        elseif ($_POST['motdepasse'] != $_POST['confirmerlemotdepasse'])
		// Si les deux mots de passe ne sont pas identiques alors on affiche un message d'erreur
		{
		echo 'Les mots de passe ne correspondent pas';
		
	    }
		
		else 
		{
	    $req->closeCursor(); 
		$req1->closeCursor();
		$nom= htmlentities(trim($_POST['nom']));
        $prenom= htmlentities(trim($_POST['prenom']));
        $pseudodeconnexion= htmlentities(trim($_POST['pseudodeconnexion']));
        $motdepasse= md5(htmlentities(trim($_POST['motdepasse'])));
		$confirmerlemotdepasse= htmlentities(trim($_POST['confirmerlemotdepasse']));
		$region= htmlentities(trim($_POST['region']));
		$departement= htmlentities(trim($_POST['departement']));
		$adresse= htmlentities(trim($_POST['adresse']));
		$codepostal= htmlentities(trim($_POST['codepostal']));
		$courriel= htmlentities(trim($_POST['courriel']));
		$telephone=  htmlentities(trim($_POST['telephone']));

	    $req= $DB->getDB()->prepare('INSERT INTO users (nom,prenom,pseudodeconnexion,motdepasse,region,departement,adresse,codepostal,courriel,telephone) VALUES( :nom, :prenom, :pseudodeconnexion, :motdepasse, :region, :departement, :adresse, :codepostal, :courriel, :telephone)');
		// Si toutes les conditions précédentes sont respectées alors on considère que l'insciption est valide, on ajoute donc les informations collectées à la base de données 
		$req-> execute(array(
		'nom' => $nom,
		'prenom' => $prenom,
		'pseudodeconnexion' => $pseudodeconnexion,
		'motdepasse' => $motdepasse,
		'region' => $region,
		'departement' => $departement,
		'adresse' => $adresse,
		'codepostal' => $codepostal,
		'courriel' => $courriel,
		'telephone' => $telephone
		
		));
		$req->closeCursor();
		die('Inscription terminée <a href="login.php">connectez</a>vous !');
		// On propose ensuite à l'utilisateur de se connecter 
		
		} 
    }
	else{
		
		header('Localisation: register.php');
	}
	
?>
<form id="formulaire" method="POST" action="register.php">
<p>Nom: <input type="text" name="nom" pattern=".{3,}"   required title="Votre pseudo doit au moins contenir 3 caractères" > </p>
<p>Prénom: <input type="text" name="prenom" pattern=".{3,}"   required title="Votre pseudo doit au moins contenir 3 caractères"></p>
<p>Pseudo de connexion: <input type="text" name="pseudodeconnexion" pattern=".{6,}"   required title="Votre pseudo doit au moins contenir 6 caractères"></p>
<p>Mot de passe: <input type="password" name="motdepasse"  pattern=".{6,}"   required title="Votre mot de passe doit au moins contenir 6 caractères" maxlength="15"> <p/>
<p>Confirmer le mot de passe: <input type="password" name="confirmerlemotdepasse" ></p>
<p>Région: <select id="region" >
                <option value="0">- - - Sélectionnez une région - - -</option>
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
<p> Département : <select id="departement" >
                <option value="0">- - - Sélectionnez un département - - -</option>
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
<p>Adresse: <input type="text" name="adresse" > <p/>
<p>Code postal: <input type="text" name="codepostal" pattern=".{5,}"   required title="Votre code postal doit se composer de 5 chiffres" maxlength="5"><p/>
<p>Courriel: <input type="email" name="courriel" > <p/>
<p>Téléphone: <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"  required title="Votre numéro de téléphone doit se composer de 10 chiffres" maxlength="10"name="telephone" ><p/>
<p>J'accepte les<a href='conditions.html'> conditions générales</a> : <input type="checkbox" name="checkbox"></p></br>
<input type="submit" value="S'inscrire" name="submit">
</form>