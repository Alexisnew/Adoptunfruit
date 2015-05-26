<?php
class DB {                                                             // classe contient variable de configuration 
	                                                                         // On utilise private car pas besoin d'y accéder depuis l'exterieur
private $host='localhost';                                      //différentes infos de connexion
private $username='root';
private $password='';
private $database='site';
private $db;

	
	public function __construct($host=null, $username=null, $password=null, $database=null) {
		
		if($host!=null) {
			
			$this->host=$host;
			$this->username=$username;
			$this->password=$password;
			$this->database=$database;
			
		}
		try{ // En cas d'echec de connexion à la base de donnée, on affiche une erreur moins moche
		$this->db=new PDO ('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password, array(PDO :: MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES UTF8',
		PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING));
		
		} catch(PDOException $e) {
			
			die('<h1> Erreur : impossible de se connecter à la base de données</h1>');
	
		}
	
	}
	public function query1($sql, $data=array()){
	   $req=  $this->db->prepare($sql) ;
       $req->execute($data);
	   return $req->fetchAll(PDO :: FETCH_OBJ);
	}
	

	public function getDB(){
    return $this->db;	
	}
	

}





?>
