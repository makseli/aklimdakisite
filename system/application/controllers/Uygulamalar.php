<?php
  
  class Uygulamalar extends  Controller
  {
  	
	function __construct(){
	  parent::Controller();
	 }
	 
	 function index(){
	 	
	  $this->load->view('view_uygulamalar'); // view/Uygulamalar.php Sayfası Gösterimi
		
	 }
	
	function Hee(){
		
				require('Ex/conf.php');
				
				$key = '7810fff5cd5b42d7bb95e2f3950575da';
				$secret = '6c7f1c1672014fcfad3c9dd24b451245edddafb6f09149a2bb5da5d5f08f6c1c';
				
				//$ff = new Friendfeed("makseli", "trail611ladle");
				$ff = new Friendfeed($key, $secret);
				$tokens = $ff->fetch_oauth_request_token();
				
				$authurl = $ff->get_oauth_authentication_url($tokens);
				
				$_SESSION['oauth_token_secret'] = $tokens['oauth_token_secret'];
				$_SESSION['oauth_token'] = $tokens['oauth_token'];
				
				$s = $tokens['oauth_token'];
				$t = $tokens['oauth_token_secret'];

				  $p = $ff->fetch_oauth_access_token(array('oauth_token'=>$s, 'oauth_token_secret'=>$t));
				  
				  echo 'asdas1111<br>';
				
				  $_SESSION['authenticated'] = 1;
				  $_SESSION['oa'] = $p;
				  //http://friendfeed-api.com/v2/feed/public?format=xml
				  $Yeni = $ff->post_entry("http://friendfeed-api.com/v2/entry?format=xml", "Deneme", array('oauth_token' => $_SESSION['oa']['oauth_token'], 'oauth_token_secret' => $_SESSION['oa']['oauth_token_secret']));

	}
	
  }
    
?>