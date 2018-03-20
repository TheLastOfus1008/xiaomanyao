<?php

defined('IN_IA') or exit('Access Denied');
          
global $_GPC, $_W;
$this->authorization();

$list = pdo_fetchall("SELECT v.num,v.rid,u.nickname,u.avatar,v.title,v.introduction,v.phone,v.video_url,v.vote_num,v.last_vote_time,v.commend FROM " . tablename('tyzm_diamondvote_votevideo') . ' as v LEFT JOIN '.tablename('tyzm_diamondvote_voteuser')." as u on u.id = v.tid WHERE v.soft_delete = 0 AND v.status = 1 AND v.rid=10 ORDER BY vote_num DESC,num DESC LIMIT 0,5");

$new = [];
foreach ($list as $k => $v) {
	$list[$k]['ranking'] = $k + 1;
	if($list[$k]['commend'] == 1) {
		$new[] = $list[$k];
	}
}

echo '<pre>';
var_dump($list);
var_dump($new);