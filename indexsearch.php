<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Recherches</title>

<form id="search_barre" action="search.php" method="POST">
 <input type="search" name="search" maxlength="20" size="20" id="query" pattern=".{3,}" required title="Saisissez au moins 3 caractères" placeholder="Entrez votre Recherche"/>
<input type="submit" name="submit1" id="boutonrecherche" value="&#xf002" title="Partout">
<input type="submit" name="submit2" id="boutonrecherche" value="&#xf14e" title="Dans votre département">
</form>