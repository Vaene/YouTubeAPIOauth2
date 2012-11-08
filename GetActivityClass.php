<?php
	
	require_once 'CurlClass.php';

    class GetActivityClass extends CurlClass{  
    	
    	var $result;
    	
    	
    	function __construct($curlObject){
    	
    		print "<br>in GetActivityClass";
    		
    		

    	
    		
    								
		    $this->curlheader[] = "POST /feeds/api/users/batch HTTP/1.1";
		    $this->curlheader[] = "Host: gdata.youtube.com";
		    $this->curlheader[] = "Content-Type: application/atom+xml";
		    $this->curlheader[] = "Content-Length: $content_length";
		    $this->curlheader[] = "Authorization: Bearer ".$curlObject->access_token;
		    $this->curlheader[] = "GData-Version: 2";
		    $this->curlheader[] = "X-GData-Key: key=".$curlObject->dev_key;
    
   
		   	
		    $this->url = "https://gdata.youtube.com/feeds/api/events?author=$userIds" ;
		    
		    $this->result = '';
		    $this->getActivity();
	
		}
		
		function getActivity(){
			
			$this->result = $this->curlFunction();
			
		
		}
		
				
		      
    }  


?>