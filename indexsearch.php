<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Recherches</title>

<form id="search_barre" action="search.php" method="POST">
 Entrez votre recherche : <input type="search" name="search" maxlength="20" size="20" id="query" pattern=".{3,}" required title="Saisissez au moins 3 caractères"/>
<input type="submit" value="Rechercher">

</form>