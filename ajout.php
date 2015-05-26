<?php require'header.php' ; ?>
<?php
if(isset($_POST['submit']))
	// Vérifie que l'utilisateur envoie le formulaire 
	{
		if (isset($_SESSION['pseudodeconnexion'])) {
			
	$pseudodeconnexion = htmlentities(trim($_SESSION['pseudodeconnexion']));

		if( empty($_POST['name']) OR empty($_POST['price']) OR empty($_POST['format']) OR empty($_POST['quantity']))
	// Vérifie que tous les champs sont remplis
		{
		echo 'Veuillez saisir tous les champs';
	// Sinon on affiche le message d'erreur ci-dessus
		}

		
		
	
		$name= htmlentities(trim($_POST['name']));
		$price= htmlentities(trim($_POST['price']));
		$format= htmlentities(trim($_POST['format']));	
		$quantity= htmlentities(trim($_POST['quantity']));
	
		
		$req= $DB->getDB()->prepare('INSERT INTO ads (pseudodeconnexion,name,price,format,quantity) VALUES(:pseudodeconnexion,:name, :price, :format,:quantity)');
		$req-> execute(array(
		
		'pseudodeconnexion' => $pseudodeconnexion,
		'name' => $name,
		'price' => $price,
		'format' => $format,
		'quantity'=> $quantity

		
				));
		$req->closeCursor();
		die('Le produit a bien été ajouté <a href="membre.php">Revenir dans mon compte</a> !');
		
		} else {
			
			die('Vous devez être connecté pour ajouter un produit' .'</br> '. '<a href="login.php"> Connectez vous </a>!');
		}
	}
	
?>
 

 


 
 
<form id="formulaire" method="POST" action="ajout.php">
<p> Produit : <select id="produit" name='name'>
                <option value="none">- - - Sélectionnez un produit - - -</option>
 <?php                   
                  $connect= mysql_connect('localhost','root','');
                    mysql_select_db('site');
                    mysql_set_charset('utf8', $connect);
                    $query = mysql_query("SELECT * FROM products ORDER BY name");
                    while ($back = mysql_fetch_assoc($query)) {
                        echo "\t\t\t\t<option value=\""  . $back["name"] . "\">"  .$back["name"] . "</option>\n" ;
					
                    }
                ?>   
 </select>
<p>Prix : <input type="number" name="price" > </p>
<p> Format : <select id="format" name='format'>
                <option value="none">- - - Sélectionnez un format - - -</option>
 <?php                   
                  $connect= mysql_connect('localhost','root','');
                    mysql_select_db('site');
                    mysql_set_charset('utf8', $connect);
                    $query = mysql_query("SELECT format FROM format_product ORDER BY format");
                    while ($back = mysql_fetch_assoc($query)) {
                        echo "\t\t\t\t<option value=\""  . $back["format"] . "\">"  .$back["format"] . "</option>\n" ;
					
                    }
                ?>  
</select>				
<p> Quantité :  <input type="number" name="quantity" > </p>
<input type="submit" value="Ajouter" name="submit">
</form>

