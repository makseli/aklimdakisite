<?php
require('conf.php');
//
$ff = new FriendFeed($key, $secret);
$s = $_GET['oauth_token'];

try {
  $p = $ff->fetch_oauth_access_token( array('oauth_token'=>$s, 'oauth_token_secret'=>$_SESSION['oauth_token_secret'] ) );

  $_SESSION['authenticated'] = 1;
  $_SESSION['oa'] = $p;
  
//  header('Location: /loggedin.php');


} catch (Exception $e){
   echo 'oops, sorry an error occured';
}


?>