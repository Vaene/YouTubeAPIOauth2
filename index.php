<?php
/*
 * Copyright 2011 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
 

set_time_limit(0);
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once('DBClass.php');

ini_set('display_errors', 'on');
require_once 'src/apiClient.php';
require_once 'src/contrib/apiOauth2Service.php';
session_start();

$dbObject = new DBClass();

$client = new apiClient();
$client->setApplicationName("Google UserInfo PHP Starter Application");
// Visit https://code.google.com/apis/console?api=plus to generate your
// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
$client->setClientId('insert_your_oauth2_client_id');
$client->setClientSecret('insert_your_oauth2_client_secret');
$client->setRedirectUri('insert_your_redirect_uri');
$client->setDeveloperKey('insert_your_developer_key');

$oauth2 = new apiOauth2Service($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
  return;
}

if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
 
 
}

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['token']);
  $client->revokeToken();
}

if ($client->getAccessToken()) {
  $user = $oauth2->userinfo->get();

  // These fields are currently filtered through the PHP sanitize filters.
  // See http://www.php.net/manual/en/filter.filters.sanitize.php
  $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
  $name = filter_var($user['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $personMarkup = "$email<div>$name</div>";

  // The access token may have been updated lazily.
  $_SESSION['token'] = $client->getAccessToken();
} else {
  $authUrl = $client->createAuthUrl();
}

function writeToken($objToken, $dbObject){

	print "<br>access_token: ".$objToken->access_token;
	print "<br>token_type: ".$objToken->token_type;
	print "<br>id_token: ".$objToken->id_token;
	print "<br>expires_in: ".$objToken->expires_in;
	print "<br>updated: ".$objToken->updated;
	
	$dbObject->query = "UPDATE account_details SET access_token = '".$dbObject->prodwrite->real_escape_string($objToken->access_token)."', token_type = '".$dbObject->prodwrite->real_escape_string($objToken->token_type)."', id_token = '".$dbObject->prodwrite->real_escape_string($objToken->id_token)."', expires_in = '".$dbObject->prodwrite->real_escape_string($objToken->expires_in)."', updated = '".$dbObject->dbObject->prodwrite->real_escape_string($objToken->updated)."' WHERE username = '".$dbObject->dbObject->prodwrite->real_escape_string($objToken->username)."';";
	
	$result = $dbObject->runQuery();
	
	


}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"></head>
<body>
<header><h1>Google UserInfo Sample App</h1></header>
<?php if(isset($personMarkup)): ?>
<?php print $personMarkup ?>
<?php endif ?>


<?php
  if(isset($authUrl)) {
    print "<a class='login' href='$authUrl'>Connect Me!</a>";
  } else {
	print "Token: ".$_SESSION['token']."<br>";
	//write token
	$objToken=json_decode($_SESSION['token']);
	$objToken->email = $email;
	writeToken($objToken, $dbObject);
	
	
	
  
 ?>
 
 
 <!--<iframe class="youtube-player" type="text/html" width="640" height="385" src="http://www.youtube.com/embed/e74ZtroKb40?autoplay=1" frameborder="0">
</iframe> -->
<?php
   print "<a class='logout' href='?logout'>Logout</a>";
  }
?>
</body></html>
