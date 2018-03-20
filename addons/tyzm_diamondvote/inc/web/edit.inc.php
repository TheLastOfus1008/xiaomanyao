<?php

/**

 * 钻石投票模块-后台管理-编辑

 *

 * @author 天涯织梦

 * @url http://bbs.we7.cc/

 */



defined('IN_IA') or exit('Access Denied');



load()->func('file');

load()->func('tpl');

global $_W,$_GPC;

$uniacid = intval($_W['uniacid']);

$id = intval($_GPC['id']);

$rid=intval($_GPC['rid']);

$reply = pdo_fetch("SELECT * FROM " . tablename($this->tablereply) . " WHERE rid = :rid ORDER BY `id` DESC", array(':rid' => $rid));

$applydata=@unserialize($reply['applydata']);

//$votedata = pdo_fetch("SELECT * FROM " . tablename($this->tablevoteuser) . " WHERE  id = :id AND uniacid = :uniacid AND rid = :rid", array(':id' => $id,':uniacid' => $uniacid,':rid' => $rid));

//$formatdata=unserialize($votedata['formatdata']);	

$options=array('width'=>80,'height' => 80);



$votetotal = pdo_fetchcolumn('SELECT COUNT(id) FROM ' . tablename($this->tablevotedata) . " WHERE   rid = :rid   AND tid = :tid " , array(':rid' => $rid,':tid' => $id));



$video = pdo_fetch("SELECT * FROM " . tablename('tyzm_diamondvote_votevideo') . " WHERE  num = :id AND uniacid = :uniacid AND rid = :rid", array(':id' => $id,':uniacid' => $uniacid,':rid' => $rid));



if(($votedata['createtime']+259000) > time()){

  $nodownpic=1;

}



if ($_W['ispost']) {

	if (empty($_GPC['title'])) {

		message('标题不能为空');

	}

	if (empty($_GPC['introduction'])) {

		message('介绍不能为空');

	}

	if (empty($_GPC['phone'])) {

		message('手机不能为空');

	}

	$info = array(
		'title' => $_GPC['title'],
		'introduction' => $_GPC['introduction'],
		'phone' => $_GPC['phone'],
		'status' => $_GPC['status'],
		'commend' => $_GPC['commend']
	);
	pdo_update('tyzm_diamondvote_votevideo', $info, array('id' => $video['id']));

	if ($video['status'] != $_GPC['status'] && ($_GPC['status'] == 1 || $_GPC['status'] == 2)) {

		$info = sendMSG($video['phone'], array('title' => $video['title']));

		if ($info['code'] == 0) {
			message('状态更新成功！通知短信已发送！', $this->createWebUrl('votelist', array('name' => 'tyzm_diamondvote','rid'=>$rid)), 'success');
		} else {
			message('状态更新失败！', $this->createWebUrl('votelist', array('name' => 'tyzm_diamondvote','rid'=>$rid)), 'success');
		}
		
	}

	message('状态更新成功！', $this->createWebUrl('votelist', array('name' => 'tyzm_diamondvote','rid'=>$rid)), 'success');


}

$joindata=@unserialize($votedata['joindata']);



$tplappye=m('tpl')->tpl_inputweb($applydata,$joindata);

include $this->template('edit');





































