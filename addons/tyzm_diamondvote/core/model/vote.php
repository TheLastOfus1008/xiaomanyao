<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
} 
class Tyzm_Vote{

	public $tablereply = 'tyzm_diamondvote_reply';
	public $tablevoteuser = 'tyzm_diamondvote_voteuser';
	public $tablevotedata = 'tyzm_diamondvote_votedata';
	public $tablegift = 'tyzm_diamondvote_gift';
	public $tablecount = 'tyzm_diamondvote_count';
	public $table_fans = 'tyzm_diamondvote_fansdata';

	public function __construct() {
		global $_W;
	}


    function setvote($userinfo,$rid,$id,$latitude,$longitude,$type=0){
		//投票start
		global $_W , $_GPC;
		$nickname=$userinfo['nickname'];
		$openid=$userinfo['openid'];
		$avatar=$userinfo['avatar'];
		$oauth_openid=$userinfo['oauth_openid'];
		$follow=$userinfo['follow'];

		if(empty($openid) && empty($oauth_openid)){
			return array('status' => '500', 'msg' => "没有关注");
		}
		//查询指定的活动信息
		$reply = pdo_fetch("SELECT starttime,endtime,votestarttime,voteendtime,config,area,status FROM " . tablename($this->tablereply) . " WHERE uniacid=:uniacid AND rid = :rid AND soft_delete =0", array(':uniacid'=>$_W['uniacid'],':rid' => $rid));

		if(empty($reply)){
			return array('status' => '0', 'msg' => "没有该活动，错误代码（1）");
		}

		$reply=@array_merge ($reply,unserialize($reply['config']));unset($reply['config']);
		//活动已结束
		if($reply['starttime']>time()){
			return array('status' => '0', 'msg' => "活动还没有开始");
		}

		//活动未开始
		if($reply['endtime']<time()){
			return array('status' => '0', 'msg' => "活动已经结束");
		}

		//活动未开始
		if(empty($reply['status'])){
			return array('status' => '0', 'msg' => "活动已禁用");
		}

		//是否关注
		if($follow!=1 &&($reply['isfollow']==1||$reply['isfollow']==3)){
			return array('status' => '500', 'msg' => "没有关注");
		}

		//投票时间
		if($reply['votestarttime']> time()){
			return array('status' => '0', 'msg' => "未开始投票！");
		}elseif($reply['voteendtime']<time()){
			return array('status' => '0', 'msg' => "已结束投票！");
		}

		//查询出被投票的视频信息
		$video = pdo_fetch("SELECT * FROM " . tablename('tyzm_diamondvote_votevideo') . " WHERE num = :id AND uniacid=:uniacid AND rid = :rid AND soft_delete =0", array(':id' => $id,':uniacid'=>$_W['uniacid'],':rid' => $rid));
		//查询出被投票视频所属用户的信息
		$voteuser = pdo_fetch("SELECT * FROM " . tablename($this->tablevoteuser) . " WHERE id = :id AND uniacid=:uniacid AND rid = :rid AND soft_delete =0", array(':id' => $video['tid'],':uniacid'=>$_W['uniacid'],':rid' => $rid));

		if(empty($video)){
			return array('status' => '0', 'msg' => "没有该编号视频，请检查后再输入！");
		}

		//判断黑名单
        $blacklist=pdo_get('tyzm_diamondvote_blacklist', array('value IN' =>  array($_W['clientip'],$openid,$oauth_openid),'uniacid'=>$_W['uniacid']));
        if($blacklist){
        	return array('status' => '0', 'msg' => "系统检到您投票异常，暂时无法投票！");
        }

		//未审核过程不能投票
		if($video['status']==0){
			return array('status' => '0', 'msg' => "审核中暂时无法投票");
		}

		//审核未通过不能投票
		if($video['status']==2){
			return array('status' => '0', 'msg' => "该视频审核未通过，无法投票");
		}
		
		//不能给自己投票
		if($voteuser['openid']==$openid && empty($reply['isoneself'])){
			return array('status' => '0', 'msg' => "不能给自己投票。");
		} 
		//每人最多投
		$everyonevotetotal = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->tablevotedata) . " WHERE rid = :rid AND openid = :openid AND votetype=0 AND soft_delete =0", array(':rid' => $rid,':openid'=>$openid));
			
		if($everyonevotetotal>=$reply['everyonevote']){
			return array('status' => '0', 'msg' => "您总共已投了".$everyonevotetotal."票，超过最大投票次数，感谢你参与我们的活动");
		}
		//每日每人投票次数
		$dailystarttime=mktime(0,0,0);//当天：00：00：00
		$dailyendtime = mktime(23,59,59);//当天：23：59：59
		$dailytimes = '';
		$dailytimes .= ' AND createtime >=' .$dailystarttime;
		$dailytimes .= ' AND createtime <=' .$dailyendtime;
		$dailyvotetotal = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->tablevotedata) . " WHERE rid = :rid   AND openid = :openid AND votetype=0 AND soft_delete =0".$dailytimes, array(':rid' => $rid,':openid'=>$openid));
		
		if($dailyvotetotal>=$reply['dailyvote']){
			return array('status' => '0', 'msg' => "每人每日只能投".$reply['dailyvote']."票，明天再来吧");
		}
		$dailyusertotal = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->tablevotedata) . " WHERE tid = :tid   AND rid = :rid   AND openid = :openid AND votetype=0 AND soft_delete =0".$dailytimes, array(':tid' => $id,':rid' => $rid,':openid'=>$openid));  
		if($dailyusertotal>=$reply['everyoneuser']){
			return array('status' => '0', 'msg' => "今天只能给 TA 投".$reply['everyoneuser']."票，明天再来吧");
		} 
			
		//投票start
		$votedata = array(
				'rid'=>$rid, 
				'tid'=>$id,
				'uniacid'=>$_W['uniacid'],
				'oauth_openid'=>$oauth_openid,
				'openid'=>$openid,
				'avatar' =>$avatar,
				'nickname'=>$nickname,
				'user_ip'=>$_W['clientip'],
				'votetype'=>0,
				'status'=>0,
				'createtime'=>time()
		);
		
		//插入投票数据
		pdo_insert($this->tablevotedata, $votedata);  
		$voteinsertid=pdo_insertid();
		if($voteinsertid){
			//插入成功后更新票数
			$setvotesql = 'update ' . tablename('tyzm_diamondvote_votevideo') . ' set vote_num=vote_num+1,last_vote_time='.time().' where num = '.$id.' AND rid ='.$rid.' AND soft_delete =0';
			if(pdo_query($setvotesql)){
				//今日票数
				$dailynum=($reply['everyonevote']-$everyonevotetotal-1)<($reply['dailyvote']-$dailyvotetotal-1)?($reply['everyonevote']-$everyonevotetotal-1):($reply['dailyvote']-$dailyvotetotal-1);
				
				if(empty($reply['isvotemsg'])){
					//$uservoteurl=$_W['siteroot'].'app/'.murl('entry/module/view',array('m' => 'tyzm_diamondvote','rid'=>$rid,'id' => $id,'i' => $_W['uniacid']));

					$uservoteurl=$_W['siteroot']."app/index.php?i=".$_W['uniacid']."&c=entry&rid=".$rid."&id=".$id."&do=view&m=tyzm_diamondvote";
					$content='您的好友【'.$nickname.'】给你（'.$video['num'].'）号【'.$video['title'].'】投了一票！目前'.($video['vote_num']+1).'票。<a href=\"'.$uservoteurl.'\">点击查看详情<\/a>';
					m('user') ->sendkfinfo($voteuser['openid'],$content);	
				}

				return array('status' => '1', 'msg' => "投票成功！");
			}else{
				//投票失败，删除刚插入的数据
				pdo_delete($this->tablevotedata, array('id' => $voteinsertid));
				return array('status' => '0', 'msg' => "投票失败，请重试！");
			}
		}else{
			return array('status' => '0', 'msg' => "发生错误，请重试！");
		}
		//投票结束
	}	
}