<?php
	
	require_once 'CurlClass.php';

    class AddContactClass extends CurlClass{  
    	
    	var $result;
    	
    	
    	function __construct($contactObj){
    	
    		print "<br>in AddContactClass";
    	
    		$this->post = '<?xml version="1.0" encoding="UTF-8"?><entry xmlns="http://www.w3.org/2005/Atom" xmlns:yt="http://gdata.youtube.com/schemas/2007"><yt:username>'.$contactObj->contact.'</yt:username></entry>';
    		
    		$content_length = strlen($this->post);
						
		    $this->curlheader[] = "POST /feeds/api/users/default/contacts HTTP/1.1";
		    $this->curlheader[] = "Host: gdata.youtube.com";
		    $this->curlheader[] = "Content-Type: application/atom+xml";
		    $this->curlheader[] = "Content-Length: $content_length";
		    $this->curlheader[] = "Authorization: Bearer ".$contactObj->access_token;
		    $this->curlheader[] = "GData-Version: 2";
		    $this->curlheader[] = "X-GData-Key: key=".$contactObj->dev_key;
    
   
		   	
		    $this->url = "https://gdata.youtube.com/feeds/api/users/default/contacts" ;
		    
		    $this->result = '';
		    $this->addContact();
	
		}
		
		function addContact(){
			
			$this->result = $this->curlFunction();
			
		
		}
		
				
		      
    }  


?>