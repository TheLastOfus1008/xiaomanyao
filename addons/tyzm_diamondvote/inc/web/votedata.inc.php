<?php
/**
 * 钻石投票模块-投票数据
 *
 * @author 天涯织梦
 * @url http://bbs.we7.cc/
 */

defined('IN_IA') or exit('Access Denied');
global $_GPC, $_W;
$rid=intval($_GPC['rid']);
$id=intval($_GPC['id']);
$uniacid=$_W['uniacid'];
$this->authorization();
$reply = pdo_fetch("SELECT config FROM " . tablename($this->tablereply) . " WHERE uniacid=:uniacid AND rid = :rid AND soft_delete = 0 ORDER BY `id` DESC", array(':uniacid' => $uniacid,':rid' => $rid));
$reply=unserialize($reply['config']);
$video = pdo_fetch("SELECT * FROM " . tablename('tyzm_diamondvote_votevideo') . " WHERE  num = :id AND uniacid = :uniacid AND rid = :rid soft_delete = 0", array(':id' => $id,':uniacid' => $uniacid,':rid' => $rid));
$pindex = max(1, intval($_GPC['page']));
$psize = 20;
$condition=" AND soft_delete = 0";
if (!empty($_GPC['keyword'])) {
	$condition .= " AND tid = '{$id} ' AND CONCAT(`nickname`,`openid`,`user_ip`) LIKE '%{$_GPC['keyword']}%'";
}
if($_GPC['ty']=="votenum"){
	$condition .= " AND votetype=0  AND tid = '{$id} '";
}
$condition .=" ORDER BY id DESC ";

// if($_GPC['ty']=="order"){
// 	$ztotal=pdo_fetchcolumn("SELECT sum(fee) FROM ".tablename($this->tablevotedata)." WHERE rid = :rid AND votetype=:votetype AND ispay=:ispay soft_delete = 0", array(':rid' => $rid,':votetype' =>1,':ispay' =>1));
// }

$list = pdo_fetchall("SELECT * FROM ".tablename($this->tablevotedata)." WHERE uniacid = '{$uniacid} ' AND rid = '{$rid} ' $condition   LIMIT ".($pindex - 1) * $psize.",{$psize}");
if (!empty($list)) {
	 $total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename($this->tablevotedata) . " WHERE uniacid = '{$uniacid}' AND rid = '{$rid} '  $condition");
	 $pager = pagination($total, $pindex, $psize); 
 }
foreach ($list as $key => &$item) {
	$item['ipaddress']=ip2address($item['user_ip']);
}	 
include $this->template('votedata');

