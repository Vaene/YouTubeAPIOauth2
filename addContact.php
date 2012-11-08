<?php


set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'on');
//require_once('DBClass.php');
require_once('AddContactClass.php');
require_once('RefreshTokenClass.php');

$ClientId = '251040221796-rf9ldc7lducdedh6trrt2osrh9m7ietn.apps.googleusercontent.com';
$ClientSecret = 'PumMFjsg5smHD_f7Ajymbk67';
$DeveloperKey = 'AI39si4OQUIRvYA5HjrlD-x-fB2soW6uRkqpWO7X3RaGNgzebf5wuJciTLguh1q4iF2n2g6OgkLUz8ovNQ_U_9fi8PgyYt-qnA';
$RedirectUri = 'http://www.digitalpassenger.com/oauth2';

$contacts = array("Bertyfinn", "HugeHugoHouse", "MissCatherWoods", "JeweledGlasses", "AlexSuperQueen", "ASpringSprig", "CrispPeriwinkle", "0o0AdalineMakeUp0o0", "SmashTheBlueWorld", "jacqulyng", "densye", "TheWandaAndCosmoShow", "milarondo", "TinyBabyShrew", "babarses", "dottysin", "jilianlight", "DarleenRendean", "erlinemur", "PocketComet", "shirkmic", "Hardstylenyc", "MeekMeeking", "mittiemilb", "cecilewot", "BulaBula813", "PeggingTarsha", "CurtainCallOfTheWild", "DharmaArrow", "LizzeDome", "lenitahynes", "SlowJordan", "BlueEyedMonsters", "FannyPants9", "denishali", "eloisagal", "vasilikicla", "colorenhancement", "VanillaNola", "SoftSummerRain", "RadTomIs", "AveretteBagette", "jayezirk", "dariastephan", "delicialu");

$agents = array


$curlObject = new stdClass();

/*$prodwrite = new mysqli($prodserverwrite, $user, $pass, $base); 
$query_token = "SELECT * from content_type_agent WHERE field_email_value = 'machinetester1@gmail.com';";
print "<br>query_token: ".$query_token;
$result1 = $prodwrite->query($query_token);

if($result1 == true) {
	//echo "<br>Successfully fetched Records for: ".$this->CampNid;
	//Make playlists
} else {
	//echo "<br>Some Error Occured While Inserting Records";
	printf("<br><br>There has been an error from MySQL: %s <br>",$prodwrite->error);
	exit;
}*/
//$dbObject = new DBClass();
exit("exiting");
$dbObject->query = "SELECT * from content_type_agent WHERE field_email_value = 'machinetester1@gmail.com';";
$result = $dbObject->runQuery();

while($line = $result->fetch_object()){
	
	$curlObject->id_key = $DeveloperKey;
	$curlObject->access_token = $line->access_token;
	$curlObject->token_type = $line->token_type;
	$curlObject->id_token = $line->id_token;
	$curlObject->expires_in = $line->expires_in;
	$curlObject->refresh_token = $line->refresh_token;
	$curlObject->created = $line->created;
	$curlObject->dev_key = $DeveloperKey;
	$curlObject->client_id = $ClientId;
	$curlObject->client_secret = $ClientSecret;
	


}

//target username
$curlObject->target = "macta10014";
$refreshObject = new stdClass();

$contactAdd = new AddContactClass($curlObject);
//var_dump($contactAdd);

//Check for errors
if(strpos(trim($contactAdd->result), "Token invalid")=== false){
	//success
	print $contactAdd;

} else {

	$refreshToken = new RefreshTokenClass($curlObject);
	print $refreshToken->result;
	$refreshObject = json_decode($refreshToken->result);
	$refreshObject->username = "machinetester1";
	$refreshObject->updated = time();
	writeToken($refreshObject, $prodwrite);

}


function writeToken($objToken, $prodwrite){

	print "<br>access_token: ".$objToken->access_token;
	print "<br>token_type: ".$objToken->token_type;
	print "<br>id_token: ".$objToken->id_token;
	print "<br>expires_in: ".$objToken->expires_in;
	print "<br>updated: ".$objToken->updated;
	
	$query_token = "UPDATE content_type_agent SET access_token = '".$prodwrite->real_escape_string($objToken->access_token)."', token_type = '".$prodwrite->real_escape_string($objToken->token_type)."', id_token = '".$prodwrite->real_escape_string($objToken->id_token)."', expires_in = '".$prodwrite->real_escape_string($objToken->expires_in)."', updated = '".$prodwrite->real_escape_string($objToken->updated)."' WHERE username = '".$objToken->username."';";
	print "<br>query_token: ".$query_token;
	$result1 = $prodwrite->query($query_token);
	
	if($result1 == true) {
		//echo "<br>Successfully fetched Records for: ".$this->CampNid;
		//Make playlists
	} else {
		//echo "<br>Some Error Occured While Inserting Records";
		printf("<br><br>There has been an error from MySQL: %s <br>",$prodwrite->error);
		exit;
	}



}






  
    