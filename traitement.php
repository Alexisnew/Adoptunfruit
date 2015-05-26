<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
 
<body>

<form method="post" action="traitement.php">
 <select id="editorsSelect" onchange="request(this);">
                <option value="none">Selection</option>
 <?php                   
                  $connect= mysql_connect('localhost','root','');
                    mysql_select_db('site');
                    
                    $query = mysql_query("SELECT * FROM products ORDER BY name");
                    while ($back = mysql_fetch_assoc($query)) {
                        echo "\t\t\t\t<option value=\"" . $back["id"] . "\">" . $back["name"] . "</option>\n";
                    }
                ?>   
 </select>
</form>
</body>
</html>