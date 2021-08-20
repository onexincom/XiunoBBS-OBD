<?php
/**
 * ONEXIN BIG DATA For Discuz!X 2.0+
 * ============================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * @package    onexin_bigdata
 * @module	   portal
 * @date	   2019-04-24
 * @author	   King
 * @copyright  Copyright (c) 2019 Onexin Platform Inc. (http://www.onexin.com)
 */

/*
//--------------Tall us what you think!----------------------------------
*/
//set_time_limit(60);
ignore_user_abort();

//-----------------------------VEST--------------------------------------------
$vest = addslashes(bigdata_randone($_OBD['portal_users']));
$member = $db->fetch_first("SELECT uid,username FROM {$table}user WHERE `username` = '$vest' LIMIT 1");
$userid = $member['uid'];
$author = $vest;//$member['username'];

//-----------------------------FROM URL/SITENAME--------------------------------------------

	//if($_OBD['from_style2']){
		$_OBD['from_style2'] = str_replace(
			array('{occurl}', '{occsite}', '{occtitle}'), array($_POST['occurl'], $_POST['occsite'], $_POST['title']), 
				$_OBD['from_style2']);
		$_POST['content'] = str_replace('{OCC}', $_OBD['from_style2'], $_POST['content']);
	//}
	
//-----------------------------SUBMIT--------------------------------------------
		// video	
		$_POST['content'] = preg_replace("/\[video\](.*?\.mp4.*?)\[\/video\]/", '<video class="obd-video" width="685" height="400" src="\\1" controls></video>', $_POST['content']);	
		$_POST['content'] = preg_replace("/\[video\](.*?)\[\/video\]/", '<iframe class="html5video" height="685" width="400" src="\\1" frameborder=0 allowfullscreen></iframe>', $_POST['content']);	
        	
		// <hr style="page-break-after:always;" class="ke-pagebreak" />
		$_POST['content'] = preg_replace("/\<hr\>$/", '', $_POST['content']);	
		//if(!$_OBD['isdelimiter'])
		$_POST['content'] = str_replace('<hr>', '', $_POST['content']);
		
		// views
		$views = '1';
		if($_OBD['origviews']){
			if(preg_match("/^(\d+).*?(\d+)$/", $_OBD['origviews'], $match)){
				$origviews = rand($match[1], $match[2]);
				$views = intval($origviews);
			}
		}

//----------------------------------------------------------------------
$catid = explode('|', $_POST['catid']);
    
		$time           = time();
        $title          = addslashes(htmlspecialchars($_POST['title']));
		$content        = addslashes(trim($_POST['content']));
		$uid            = $userid;
		$fid            = intval($catid[0]);
		$create_date    = $time;
		$last_date      = $time;
		$top            = 0;
		
		// thread
		$sql = "INSERT INTO {$table}thread (subject,uid,fid,create_time,last_date,top) VALUES ('$title','$uid','$fid','$create_date','$last_date','$top')";
		$res = $db->query($sql);
        $art_id = $db->insert_id();
        
		// post
		$sql = "INSERT INTO {$table}post (tid,uid,isfirst,create_time,message,message_fmt) VALUES ('$art_id','$uid','1','$create_date','$content','$content')";
		$db->query($sql);
        $firstpid = $db->insert_id();
		
		// firstpid
		$db->query("UPDATE {$table}thread SET `firstpid` = '$firstpid' WHERE `tid` ='$art_id'");
        
	if($art_id) {
		DB::query("UPDATE ".DB::table('plugin_onexin_bigdata')." SET `status` = '1', `ip` = 'forum|".$art_id."' WHERE `k` = '$_POST[k]'");
	}
				
bigdata_output("200", array("id"=>$art_id));
exit;

//-----------------------------End--------------------------------------------

