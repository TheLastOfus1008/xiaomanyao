<?php
header('Access-Control-Allow-Origin: *');
defined('IN_IA') or exit('Access Denied');

global $_W,$_GPC;

is_weixin();

if (empty($_GPC['rid'])) {
	echo json_encode(array('code' => 0, 'msg' => '没有指定活动'));
	return;
}


if (!empty($_GPC['page']) && !empty($_GPC['limit'])) {
	$list = pdo_fetchall("SELECT v.num,v.rid,u.nickname,u.avatar,v.title,v.introduction,v.phone,v.video_url,v.vote_num,v.last_vote_time,v.commend FROM " . tablename('tyzm_diamondvote_votevideo') . ' as v LEFT JOIN '.tablename('tyzm_diamondvote_voteuser')." as u on u.id = v.tid WHERE v.soft_delete = 0 AND v.commend = 0 AND v.status = 1 AND v.rid={$_GPC['rid']} ORDER BY vote_num DESC,num DESC LIMIT " . ($_GPC['page'] - 1)*$_GPC['limit'] . ',' . $_GPC['limit']);
}



if (!empty($_GPC['commend'])) {
	$list = pdo_fetchall("SELECT v.num,v.rid,u.nickname,u.avatar,v.title,v.introduction,v.phone,v.video_url,v.vote_num,v.last_vote_time,v.commend FROM " . tablename('tyzm_diamondvote_votevideo') . ' as v LEFT JOIN '.tablename('tyzm_diamondvote_voteuser')." as u on u.id = v.tid WHERE v.soft_delete = 0 AND v.commend = 1 AND v.status = 1 AND v.rid={$_GPC['rid']} ORDER BY vote_num DESC,num DESC");
}



if (!empty($_GPC['keywords'])) {
	$list = pdo_fetchall("SELECT v.num,v.rid,u.nickname,u.avatar,v.title,v.introduction,v.phone,v.video_url,v.vote_num,v.last_vote_time,v.commend FROM " . tablename('tyzm_diamondvote_votevideo') . " as v LEFT JOIN ".tablename('tyzm_diamondvote_voteuser')." as u on u.id = v.tid WHERE v.soft_delete = 0 AND v.status = 1 AND (v.tid = :keywords OR u.nickname = :keywords) AND v.rid= :rid ORDER BY vote_num DESC,num DESC", array(':keywords' => $_GPC['keywords'], ':rid'=>$_GPC['rid']));
}

if(!empty($list)){
	foreach ($list as $key => $value) {
		$list[$key]['video_url'] = 'http://video-voting.test.upcdn.net'.$list[$key]['video_url'];
	}
	echo json_encode(array('code' => 1, 'msg' => 'ok', 'data' => $list));
} else {
	echo json_encode(array('code' => 1, 'msg' => 'ok', 'data' => []));
}

