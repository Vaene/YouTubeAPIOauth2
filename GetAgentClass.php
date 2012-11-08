<?php
	
		

    class DBClass{  
    	
    	var $prodwrite;
    	var $query;
    	var $line;
    	var $result;
    	
    	
    	function __construct(){
    		
    		require_once('init_info.php');
    		$this->query = '';
    		$this->result = '';
    		$this->prodwrite = new mysqli($prodserverwrite, $user, $pass, $base);
    		
	
		}
		
		function runQuery(){
		
			//print "<br>query: ".$this->query;
			$this->result = $this->prodwrite->query($this->query);
			
			if($this->result == true) {
				//echo "<br>Successfully fetched Records for: ".$this->CampNid;
				//Make playlists
			} else {
				//echo "<br>Some Error Occured While Inserting Records";
				//printf("<br><br>There has been an error from MySQL: %s <br>",$this->prodwrite->error);
				$this->result = $this->prodwrite->error;
			}

			return $this->result;
		
		}
		
				
		      
    }  


?>