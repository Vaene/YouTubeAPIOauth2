<?php

    class CurlClass {  
    
    	
    	var $curlheader;
    	var $post;
    	var $url;
    	
		function __construct(){
			$this->curlheader = array();
			$this->post = '';
			$this->url = '';
	
		}
		
		function curlFunction() {
		
			$ch = curl_init( );  
		    
		    curl_setopt_array($ch, array( 
		        CURLOPT_URL => $this->url , 
		        CURLOPT_HTTPHEADER =>  $this->curlheader,
		        CURLOPT_POST => true,
		        CURLOPT_SSL_VERIFYPEER => false ,
		        CURLOPT_POSTFIELDS => $this->post , 
		        CURLOPT_RETURNTRANSFER => true   ) ) ;
		    
		   
		    $auth = curl_exec($ch); 
		    curl_close($ch);
		   
		    $auth = trim($auth) ;
		    
		    return $auth;
		  		 
		}
		
		
		
		      
    }  


?>