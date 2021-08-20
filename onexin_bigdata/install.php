<?php
/**
 * ONEXIN BIG DATA For Other 5.5+
 * ============================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * @package    onexin_bigdata
 * @module	   api
 * @date	   2015-03-21
 * @author	   King
 * @copyright  Copyright (c) 2015 Onexin Platform Inc. (http://www.onexin.com)
 */


/*
//--------------Tall us what you think!----------------------------------
*/

!defined('DEBUG') AND exit('Forbidden');

$tablepre = $db->tablepre;


$sql = "CREATE TABLE IF NOT EXISTS {$tablepre}plugin_onexin_bigdata (
  `bid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` text NOT NULL,
  `k` varchar(32) NOT NULL DEFAULT '',
  `catid` varchar(20) NOT NULL DEFAULT '',
  `i` varchar(32) NOT NULL DEFAULT '',
  `resid` varchar(20) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `cronpublishdate` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";
$r = db_exec($sql);

$r === FALSE AND message(-1, '创建表结构失败');

?>