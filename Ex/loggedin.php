<?
require(dirname(__FILE__).'/conf.php');


function sort_likes($a, $b){
    if (count($a) == count($b)) {
        return 0;
    }
    return (count($a) > count($b)) ? -1 : 1;
}


  $ff = new FriendFeed($key, $secret, array('oauth_token' => $_SESSION['oa']['oauth_token'], 'oauth_token_secret' => $_SESSION['oa']['oauth_token_secret']));
  // me authentice olan kullanıcı için kısaltma, isterseniz başka bir userın datasını da çekebilirsiniz.
  //$feed = $ff->fetch_feed('me',array('num'=>500));