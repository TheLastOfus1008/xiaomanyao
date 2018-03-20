<?php
/**
 * 钻石投票模块-域名
 *
 * @author 天涯织梦
 * @url http://bbs.we7.cc/
 */

defined('IN_IA') or exit('Access Denied');
global $_GPC, $_W;

$uniacid=$_W['uniacid'];
$rid=intval($_GPC['rid']);



$condition = '';
//判断是否搜索关键字
if (!empty($_GPC['keyword'])) {

	$condition .= " AND CONCAT(`noid`,`nickname`) LIKE '%{$_GPC['keyword']}%'";

}
//分页
$pindex = max(1, intval($_GPC['page']));

$psize = 20;

//获取指定活动中有作品的用户id
$uidlist = pdo_fetchall("SELECT DISTINCT tid FROM ".tablename('tyzm_diamondvote_votevideo')." WHERE uniacid = {$uniacid}  AND rid = {$rid} AND soft_delete = 0 $condition");

//将用户id转换成字符串
if(!empty($uidlist) && is_array($uidlist)){
	foreach ($uidlist as $key => $value) {
		$uidlist[$key] = $uidlist[$key]['tid'];
	}
	$uidlist = implode(',', $uidlist);
}
//查询用户
$list = pdo_fetchall("SELECT id,openid,nickname,oauth_openid,avatar,createtime FROM ".tablename($this->tablevoteuser)." WHERE uniacid = {$uniacid} AND id in ({$uidlist}) $condition   LIMIT ".($pindex - 1) * $psize.",{$psize}");
$count = pdo_fetchcolumn("SELECT count(id) FROM ".tablename($this->tablevoteuser)." WHERE uniacid = {$uniacid} AND id in ({$uidlist}) $condition");

$pager = pagination($count, $pindex, $psize);

foreach ($list as $key => $value) {
	//查询用户目前未被删除的视频数
	$res = pdo_fetch("SELECT count(id) as count FROM ".tablename('tyzm_diamondvote_votevideo')." WHERE tid={$list[$key]['id']} AND rid = {$rid} AND soft_delete=0");
	 $list[$key]['showcount'] = $res['count'];
	//查询用户上传的总的视频数
	$res = pdo_fetch("SELECT count(id) as count FROM ".tablename('tyzm_diamondvote_votevideo')." WHERE tid={$list[$key]['id']} AND rid = {$rid}");
	 $list[$key]['allcount'] = $res['count'];
}
include $this->template('userlist');

