<?php require'_header.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css"/>
<title>Adopt'UnFruit.com</title>

</head>
	<header id="hea">
	
			<div id="div1">
			<nav>
				<ul id="menu">
		
			  <li><a href="login.php">Connexion</a></li>
			  <li><a href="register.php">Inscription</a></li>
			  <li><a href="logout.php"  class="logout_button"> &#xF011;</a></li>
			   </ul>
			   </nav>
			</div>
			
			<div id="div2">
				 <nav>
                    <ul id="menu">
                        <li><a href="membre.php">Mon Compte</a></li>
					    <li><a href="panier.php">Mon Panier</a></li>	
						<li><a id="adopt" href="homepage.php">Adopt'UnFruit</a></li>
					    <li><a href="forum.php">Forum</a></li>
						<li><a href="all_annonces.php">Toutes les annonces</a></li>
							
                    </ul>
                </nav>
				</div>
				<div id="cart">
					 Nombre d'articles : <?= $panier->count();?></br>
					Montant  Total :  <?= number_format( $panier->total() * 1.196,2,',',' '); ?> € 
				<div>

					</header>
			
	

	<body>
				<p id="div_logo">
				<img src="images/logo-2.png" />
				<p>
				<?php include'indexsearch.php' ; ?>
                   <div id="fonds"> 
                    
                    <h2>Vente en Ligne de Fruits et Légumes </h2>
					
          
                 </div>
               
   


           

</body>

