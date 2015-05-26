<?php
require'header.php';
?>
	<html>
	<body id="log">
    <div class='cadre'> 
	<form method="POST" action="login.php">
    <p>Pseudo : <input type="text" name="pseudodeconnexion" ></p>
	<p >Mot de passe: <input type="password" name="motdepasse" ></p>
 	<p><input type="submit" value="Se connecter" name="submit" ></p></br>
	 <a href ="mdp.oublie.php" > Mot de passe oublié? </a></br>
	 <a href ="register.php" class="ins"> S'inscrire </a>
	</div>
   </form>
   </body>
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


