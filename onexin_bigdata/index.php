<?php
/**
 * ONEXIN BIG DATA For Other 5.5+
 * ============================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * @package    onexin_bigdata
 * @module	   api
 * @date	   2018-01-04
 * @author	   King
 * @copyright  Copyright (c) 2018 Onexin Platform Inc. (http://www.onexin.com)
 */

/*
//--------------Tall us what you think!----------------------------------
*/
error_reporting(0);
@header("content-Type: text/html; charset=utf-8");
if( !isset( $_SESSION ) ) session_start();

	include_once dirname(__FILE__).'/load.other.php';

//----------------CHECK ADMIN--------------------------------------
    
$options = bigdata_getcache( 'onexin_bigdata_options' );
$username = !empty($options['oid']) ? $options['oid'] : '10000'; //初始用户名
$password = !empty($options['token']) ? $options['token'] : 'd7aeb864648b'; //初始密码

if ($_SESSION['obd'] != '1') {
    $_GET['op'] = 'login';
}

//----------------FUNCTION--------------------------------

$translations = bigdata_getcache('onexin-bigdata-zh_CN');

//if(!function_exists('__')) {
function __($string = "", $id = ""){
	global $translations;
	return isset($translations[$string]) ? $translations[$string] : $string;	
}
//}

//----------------ACTION----------------------------------

	include_once dirname(__FILE__).'/onexin_bigdata.inc.php';