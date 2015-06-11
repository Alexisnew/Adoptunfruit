<?php
require'header.php';
?>
	<html>
	<body >
	<form method="POST" action="login.php" id="formulaire_login">
    <p>Pseudo : <input type="text" name="pseudodeconnexion" ></p>
	<p >Mot de passe: <input type="password" name="motdepasse" ></p></br>
 	<p><input type="submit" value="Se connecter" name="submit"  class="action-button shadow animate green"></p></br>
	
   </form>
   </body>
   <footer>
 <?php require'footer.php' ; ?>
  </footer>
   
	</html>
<?php
if(isset($_POST['submit'])){
	
$pseudodeconnexion= htmlentities(trim($_POST[ 'pseudodeconnexion']));
$motdepasse= md5(htmlentities(trim($_POST['motdepasse'])));

if($pseudodeconnexion&&$motdepasse){

$sql = $DB->getDB()->prepare("SELECT  * FROM  users WHERE pseudodeconnexion='$pseudodeconnexion' AND motdepasse='$motdepasse'");
$sql->execute();
$nb = $sql->rowCount();

if ($nb > 0) {
$_SESSION['pseudodeconnexion'] = $pseudodeconnexion;
header('Location: membre.php');

} else echo 'Pseudo ou mot de passe incorrect(s)';

} else echo 'Veuillez remplir tous les champs';

}

?>