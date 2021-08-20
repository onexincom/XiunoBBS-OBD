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

$sql = "DROP TABLE IF EXISTS {$tablepre}plugin_onexin_bigdata;";
$r = db_exec($sql);

$r === FALSE AND message(-1, '卸载表失败');

?>