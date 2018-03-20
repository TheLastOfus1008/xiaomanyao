<?php

/**

 * 钻石投票模块-投票列表

 *

 * @author 天涯织梦

 * @url http://bbs.we7.cc/

 */



defined('IN_IA') or exit('Access Denied');

		global $_GPC, $_W;

        $this->authorization();

		$videos=pdo_get('tyzm_diamondvote_votevideo', array('uniacid' => $_W['uniacid'],'rid'=>$_GPC['rid']), array('id'));

		$pindex = max(1, intval($_GPC['page']));

        $psize = 20;

		$condition=" AND soft_delete = 0";

		if (!empty($_GPC['keyword'])) {

			$condition .= " AND CONCAT(`title`,`phone`,`num`) LIKE '%{$_GPC['keyword']}%'";

		}

		if (!empty($_GPC['uid'])) {

			$condition .= " AND tid={$_GPC['uid']}";

		}

		if($_GPC['ty']==2){	

			$condition .= " AND status=0";

		}elseif($_GPC['ty']==1){

			$condition .= " AND status=1";

		}elseif($_GPC['ty']==3){

			$condition .= " AND status=2";

		}

		if ($_GPC['commend']==1) {
			$condition .= " AND commend=1";
		}

		if($_GPC['ranking']==""){

			$condition .= " ORDER BY num DESC ";

		}elseif($_GPC['ranking']==0){
			$condition .= " ORDER BY vote_num DESC ";
		}

		
		$list = pdo_fetchall("SELECT * FROM ".tablename('tyzm_diamondvote_votevideo')." WHERE uniacid = '{$_W['uniacid']} ' AND rid = '{$_GPC['rid']} ' $condition   LIMIT ".($pindex - 1) * $psize.",{$psize}");

		if (!empty($list)){

             $total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('tyzm_diamondvote_votevideo') . " WHERE uniacid = '{$_W['uniacid']}' AND rid = '{$_GPC['rid']} ' $condition");

             $pager = pagination($total, $pindex, $psize); 

			 foreach ($list as $key =>&$item) {   			

				$pvtotal=pdo_fetchcolumn("SELECT pv_total FROM ".tablename($this->tablecount)." WHERE rid = :rid AND tid=:tid AND soft_delete = 0", array(':rid' => $item['rid'],':tid' => $item['id']));

				$item['pvtotal']=empty($pvtotal)?0:$pvtotal;

				$sharetotal=pdo_fetchcolumn("SELECT share_total FROM ".tablename($this->tablecount)." WHERE rid = :rid AND tid=:tid AND soft_delete = 0", array(':rid' => $item['rid'],':tid' => $item['id']));

				$item['sharetotal']=empty($sharetotal)?0:$sharetotal;

				$item['joindata']=@unserialize($item['joindata']);

				$item['voteuser'] = pdo_fetch("SELECT openid,avatar,nickname FROM ".tablename($this->tablevoteuser)." WHERE id=:id ", array(':id' => $item['tid']));
		     }

         }

include $this->template('votelist');

