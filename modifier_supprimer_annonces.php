<?php require 'header.php'; 

		if($_SESSION['pseudodeconnexion']){
		    $pseudodeconnexion = $_SESSION['pseudodeconnexion'] ;
	

			if($_GET['action']){
				
		
					
					if($_GET['action'] =='add'){
						
						if(isset($_POST['submit'])) {
							
							
									$name = $_POST['name'];
									$format = $_POST['format'];
									$price = $_POST['price'];
									$quantity = $_POST['quantity'];
						
										if($name&&$format&&$price&&$quantity) {
											
											$req = $DB->getDB()->prepare("INSERT INTO ads VALUES(' ' ,'$pseudodeconnexion','$name','$format','$price','$quantity')");
											$req->execute();
											
										} else { 
										
										echo'Veuillez remplir tous les champs' ;
										
										}
						
						}
						
?>
<form action=" " method="POST">
<p> Nom du produit : </p> <select id="nom_produit" name="name" >
                <option value="0">- - - Sélectionnez un produit- - -</option>
 <?php                   
                  $connect= mysql_connect('localhost','root','');
                    mysql_select_db('site');
                    mysql_set_charset('utf8', $connect);
                    $query = mysql_query("SELECT name FROM products ORDER BY name");
                    while ($back = mysql_fetch_assoc($query)) {
                        echo "\t\t\t\t<option value=\"" . $back["name"] . "\">" . $back["name"] . "</option>\n";
                    }
                ?>   
 </select>							
<p> Format du produit: </p> <select id="format_produit" name="format">
                <option value="0">- - - Sélectionnez un format- - -</option>
 <?php                   
                  $connect= mysql_connect('localhost','root','');
                    mysql_select_db('site');
                    mysql_set_charset('utf8', $connect);
                    $query = mysql_query("SELECT format FROM format_product ORDER BY format");
                    while ($back = mysql_fetch_assoc($query)) {
                        echo "\t\t\t\t<option value=\"" . $back["format"] . "\">" . $back["format"] . "</option>\n";
                    }
                ?>   
 </select>							
<p> Prix : </p><input type="number" name="price"/>
<p> Quantité du produit : </p><input type="number" name="quantity"/>
<p><input type="submit" name="submit" value="Ajouter"/></p>

<?php
				
				
			}elseif ($_GET['action'] =='modifyanddelete'){

?>
    <tr>
    <td  colspan="6">  Vos Annonces </td>
	</tr>
	<tr> <p>
			<td>  &nbsp  &nbsp Image du produit      &nbsp   &nbsp   &nbsp </td>
	        <td> Nom du Produit  &nbsp </td>
	        <td> &nbsp &nbsp &nbsp  Format  &nbsp  &nbsp  </td>
	        <td> &nbsp &nbsp  Prix      </td>
			<td>   &nbsp   &nbsp &nbsp &nbsp TVA </td>
	        <td>   &nbsp   &nbsp   &nbsp   &nbsp Actions </td></p>
	</tr>
<?php	
							$req = $DB->getDB()->prepare("SELECT * FROM ads WHERE pseudodeconnexion='$pseudodeconnexion'");
							$req->execute();
						
							while($ads=$req->fetch(PDO::FETCH_OBJ)){
							
?>
	<p>
  	<td colspan="3"> </td>
	<tr>
	<td><img src=" <?= $ads->name;?>.jpg"></td>
	<td>  &nbsp &nbsp  &nbsp  <?= $ads->name; ?></td>
	<td>  &nbsp   &nbsp  &nbsp  &nbsp  &nbsp  <?= $ads->format; ?></td>
    <td> &nbsp &nbsp &nbsp &nbsp &nbsp <?= number_format( $ads->price,2,',',' '); ?> € </td> 
	<td>  &nbsp &nbsp   &nbsp <?= number_format($ads->price * 1.196,2,',',' '); ?> € </td>
	<td>  &nbsp  &nbsp <a href="?action=modify&amp;id=<?php echo $ads->id ?>"> Modifier </a></td>
	<td> / <a href="?action=delete&amp;id=<?php echo $ads->id ?>"> Supprimer </a></td>
	</tr>
     </p>
<?php



							
							}
					
							
							
			} elseif ($_GET['action'] =='modify'){ 
						 
						 		$id=$_GET['id'];
								
					if(isset($_POST['submit'])) {

							       $name = $_POST['name'];
									$format = $_POST['format'];
									$price = $_POST['price'];
									$quantity = $_POST['quantity'];

											$req = $DB->getDB()->prepare("UPDATE ads SET name='$name',format='$format',price='$price',quantity='$quantity' WHERE id=$id");
							                $req->execute();
							die('Votre annonce a bien été modifiée <a href="modifier_supprimer_annonces.php?action=modifyanddelete"> Cliquez sur ce lien pour retourner dans la gestion de vos annonces </a>') ;
					}
					
		
				$req = $DB->getDB()->prepare("SELECT * FROM ads WHERE id=$id");
				$req->execute();
				
				$data=$req->fetch(PDO:: FETCH_OBJ);
				
?>							
<form action=" " method="POST">
<p> Nom du produit : </p> <select id="nom_produit" name="name" >
                <option value="<?= $data->name ?>"><?= $data->name ?></option>
 <?php                   
                  $connect= mysql_connect('localhost','root','');
                    mysql_select_db('site');
                    mysql_set_charset('utf8', $connect);
                    $query = mysql_query("SELECT name FROM products ORDER BY name");
                    while ($back = mysql_fetch_assoc($query)) {
                        echo "\t\t\t\t<option value=\"" . $back["name"] . "\">" . $back["name"] . "</option>\n";
                    }
                ?>   
 </select>							
<p> Format du produit: </p> <select id="format_produit" name="format">
                <option value="<?= $data->format ?>"><?= $data->format ?></option>
 <?php                   
                  $connect= mysql_connect('localhost','root','');
                    mysql_select_db('site');
                    mysql_set_charset('utf8', $connect);
                    $query = mysql_query("SELECT format FROM format_product ORDER BY format");
                    while ($back = mysql_fetch_assoc($query)) {
                        echo "\t\t\t\t<option value=\"" . $back["format"] . "\">" . $back["format"] . "</option>\n";
                    }
                ?>   
 </select>							
<p> Prix : </p><input type="number" name="price" value="<?= $data->price ?>"/>
<p> Quantité du produit : </p><input type="number" name="quantity" value="<?= $data->quantity ?>"/>
<p><input type="submit" name="submit" value="Modifier"/></p>

<?php
				
			}elseif ($_GET['action'] =='delete'){
							
							$id=$_GET['id'];
							$req = $DB->getDB()->prepare("DELETE  FROM ads WHERE id=$id");
							$req->execute();
				
					
			} else {  
			
			die ('Une erreur s\'est produite.') ;
			}


			}  
		 else { header( 'Location: homepage.php');
	
		}
	
		}
		

?>


