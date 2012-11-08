<?php
	
	require_once 'CurlClass.php';

    class RefreshTokenClass extends CurlClass{  
    	
    	var $result;
    	
    	
    	function __construct($refreshObj){
    	
    		print "<br>in RefreshTokenClass";
    	
    		$this->post = 'client_id='.$refreshObj->client_id.'&client_secret='.$refreshObj->client_secret.'&refresh_token='.$refreshObj->refresh_token.'&grant_type=refresh_token';
    		
    		$content_length = strlen($this->post);
						
		    $this->curlheader[] = "POST /o/oauth2/token HTTP/1.1";
		    $this->curlheader[] = "Host: accounts.google.com";
		    $this->curlheader[] = "Content-Type: application/x-www-form-urlencoded";
		   		   	
		    $this->url = "https://gdata.youtube.com/o/oauth2/token" ;
		    
		    $this->result = '';
		    $this->refreshToken();
	
		}
		
		function refreshToken(){
			
			$this->result = $this->curlFunction();
			return $this->result;
		
		}
		
				
		      
    }  


?>