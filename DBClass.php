<?php
	
		

    class DBClass{  
    	
    	var $prodwrite;
    	var $query;
    	var $line;
    	var $result;
    	
    	
    	function __construct(){
    		//print "<br>in DBClass";
    		
    		require_once('init_info.php');
    		$this->query = '';
    		$this->result = '';
    		$this->prodwrite = new mysqli($prodserverwrite, $user, $pass, $base);
    		
	
		}
		
		function runQuery(){
		
			
			$this->result = $this->prodwrite->query($this->query);
			
			if($this->result == true) {

			} else {
				
				$this->result = $this->prodwrite->error;
			}

			return $this->result;
		
		}
		
				
		      
    }  


?>