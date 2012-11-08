<?php
	
	require_once 'CurlClass.php';

    class ShareVideoClass extends CurlClass{  
    	
    	var $result;
    	
    	
    	function __construct($contactObj){
    	
    		print "<br>in ShareVideoClass";
    		
    		$this->post = '<?xml version="1.0" encoding="UTF-8"?><entry xmlns="http://www.w3.org/2005/Atom" xmlns:yt="http://gdata.youtube.com/schemas/2007"><id>'.$contactObj->video_id.'</id><summary>'.$contactObj->share_message.'</summary></entry>';
    		
    		$content_length = strlen($this->post);
						
		    $this->curlheader[] = "POST /feeds/api/users/".$contactObj->contact."/inbox HTTP/1.1";
		    $this->curlheader[] = "Host: gdata.youtube.com";
		    $this->curlheader[] = "Content-Type: application/atom+xml";
		    $this->curlheader[] = "Content-Length: ".$content_length;
		    $this->curlheader[] = "Authorization: Bearer ".$contactObj->access_token;
		    $this->curlheader[] = "GData-Version: 2";
		    $this->curlheader[] = "X-GData-Key: key=".$contactObj->dev_key;
    
   
		   	
		    $this->url = "https://gdata.youtube.com/feeds/api/users/".$contactObj->contact."/inbox";
		    
		    $this->result = '';
		    $this->shareVideo();
	
		}
		
		function shareVideo(){
			
			$this->result = $this->curlFunction();
		
		}
		
				
		      
    }  


?>