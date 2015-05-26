<?php
		class panier{
			private $DB;
			
			public function __construct($DB){
				if(! isset ($_SESSION)){
					session_start(); 
				}
					if(! isset($_SESSION['panier'])){
						$_SESSION['panier']=array();
					}
					$this->DB= $DB;
					if(isset($_GET['delPanier'])){
						$this->del($_GET['delPanier']);
					}
		}
			public function count(){
				return array_sum($_SESSION['panier']);
			}
			public function total	(){
				$total=0;
				$ids = array_keys($_SESSION['panier']);
				if(empty($ids)){
					$ads=array();

				}else{
					$ads = $this->DB->query1('SELECT id, price FROM ads WHERE id IN ('.implode(',',$ids).')');
				} 	
				foreach($ads as $ad) {
					$total += $ad->price * $_SESSION['panier'][$ad->id];
				}
				return $total;
			}
			public function add($ad_id){
				 if(isset($_SESSION['panier'][$ad_id])){
						$_SESSION['panier'][$ad_id]++;
				 }else{
					$_SESSION['panier'][$ad_id]=1;
				 }
			}
			public function del($ad_id){
				unset($_SESSION['panier'][$ad_id]);
			}
		}
?>