<?php

!defined('DEBUG') AND exit('Access Denied.');


http_location("../plugin/onexin_bigdata/");

exit;

include_once APP_PATH.'plugin/onexin_bigdata/load.other.php';
/*
http_location(url('forum'));
*/
	$_GET['op'] = 'settings';
	
	include APP_PATH.'plugin/onexin_bigdata/onexin_bigdata.inc.php';

if($method == 'GET') {
}


