<?php

/**

 * 钻石投票-报名

 *

 * @author 天涯织梦

 * @url http://bbs.we7.cc/

 */



defined('IN_IA') or exit('Access Denied');

global $_W,$_GPC;

is_weixin();



$uniacid = intval($_W['uniacid']);

$rid=intval($_GPC['rid']);

$reply = pdo_fetch("SELECT * FROM " . tablename($this->tablereply) . " WHERE rid = :rid ORDER BY `id` DESC", array(':rid' => $rid));

$reply['style']=@unserialize($reply['style']);

$reply=@array_merge ($reply,unserialize($reply['config']));unset($reply['config']);

if(empty($reply['status'])){message("活动已禁用");}

//$addata=@unserialize($reply['addata']);	


//是否关注

if(($this->oauthuser['follow']!=1 && $reply['isfollow']>=2 ) || empty($this->oauthuser['openid'])){

	$nofollow=1;

}

if($reply['endtime']<time()){

	message('活动已经结束！', $this->createMobileUrl('index', array('rid' => $rid)),'error');

}



//活动未开始

if(empty($reply['status'])){

	message('活动已禁用', $this->createMobileUrl('index', array('rid' => $rid)),'error');

}



if($reply['apstarttime']> time()){

	message('未开始报名！', $this->createMobileUrl('index', array('rid' => $rid)),'error');

}elseif($reply['apendtime']<time()){

	message('已结束报名！', $this->createMobileUrl('index', array('rid' => $rid)),'error');

}



$applydata=@unserialize($reply['applydata']);


//通过openid和活动id获取用户信息
$voteuser = pdo_get($this->tablevoteuser, array('oauth_openid' => $this->oauthuser['oauth_openid']), array('id'));

//判断是否为表单提交
if($_W['ispost']){
	//判断活动是否结束
	if($reply['endtime']<time()){

		exit(json_encode(array('status' => '0', 'msg' => "活动已经结束")));

	}



	//活动未开始

	if(empty($reply['status'])){

		exit(json_encode(array('status' => '0', 'msg' => "活动已禁用")));

	}



	if($reply['apstarttime']> time()){

		exit(json_encode(array('status' => '0', 'msg' => "未开始报名！")));

	}elseif($reply['apendtime']<time()){

		exit(json_encode(array('status' => '0', 'msg' => "已结束报名！")));

	}

	//是否关注

	if($this->oauthuser['follow']!=1 && $reply['isfollow']>=2 || empty($this->oauthuser['openid'])){

		exit(json_encode(array('status' => '500', 'msg' => "没有关注")));

	}

	//获取最后一个视频的编号
	$lastnum = pdo_getall('tyzm_diamondvote_votevideo', array('rid' => $_GPC['rid'], 'uniacid' => $_W['uniacid']), array('num') , '' , 'num DESC' , array(1));
	$num = (!empty($lastnum[0]['num']) ? ($lastnum[0]['num']+1) : 1);

	if(empty($voteuser)){


		$joindata=array();

		foreach ($applydata as $row) {

			$joindata[]=array(

				'name'=>$row['infoname'],

				'val'=>$_GPC[$row['infotype']],

			);

			if($row['notnull'] && empty($_GPC[$row['infotype']])){

				exit(json_encode(array('status' => '0', 'msg' => $row['infoname']."不能为空")));

			}

		}	

		$lastid = pdo_get($this->tablevoteuser, array('rid' => $rid, 'uniacid' => $_W['uniacid']), array('noid') , '' , 'noid DESC' , array(1));



		if($reply['ischecked']){

			$status=1;

		}else{

			$status=0;

		}

		$joininfo = array(

		    'noid'=>$lastid['noid']+1,

			'rid'=>$rid,

			'uniacid'=>$_W['uniacid'], 

			'oauth_openid'=>$this->oauthuser['oauth_openid'],

			'openid'=>$this->oauthuser['openid'],

			'avatar' =>$this->oauthuser['avatar'],

			'nickname'=>$this->oauthuser['nickname'],

			'user_ip'=>$_W['clientip'],

			'name' =>$_GPC['name'],

			'introduction' =>$_GPC['introduction'],

			'img1'=>'',

			'img2'=>'',

			'img3'=>'',

			'img4'=>'',

			'img5'=>'',

			'joindata'=>iserializer($joindata),

			'formatdata'=>iserializer($_GPC['picturearr']),

			'votenum'=>0,

			'giftcount'=>0,

			'status'=>$status,

			'createtime'=>time()

		);

		pdo_insert($this->tablevoteuser,$joininfo);

		$insertid=pdo_insertid();

		//file_put_contents(MODULE_ROOT."/data.txt",json_encode($insertid));exit;



		if(!empty($insertid)){
			//保存视频入库
		    $videoinfo = array(
		        'title' => $_GPC['name'],
		        'introduction' => $_GPC['introduction'],
		        'phone' => $_GPC['mobile'],
		        'video_url' => $_GPC['video'],
		        'rid' => $rid,
		        'uniacid' => $uniacid,
		        'tid' => $insertid,
		        'num' => $num,
		        'create_time' => time()
		    );

		    pdo_insert('tyzm_diamondvote_votevideo',$videoinfo);
		    //$lastvideoid=pdo_insertid();

			if(empty($status)){

				$uservoteurl=$_W['siteroot']."app/".$this->createMobileUrl('view', array('id' =>$num,'rid' => $rid));

				$content='您已成功报名【'.$reply['title'].'】活动，待审核官方审核通过后，即可开始拉票。<a href=\"'.$uservoteurl.'\">点击进入详情页面<\/a>';

			}else{

				$uservoteurl=$_W['siteroot']."app/".$this->createMobileUrl('view', array('id' =>$num,'rid' => $rid));

				$content='您已成功报名【'.$reply['title'].'】活动，开始拉票吧！<a href=\"'.$uservoteurl.'\">点击进入详情页面<\/a>';

			}

			m('user')->sendkfinfo($this->oauthuser['openid'],$content);	


			//奖励end			

			exit(json_encode(array('status' => '1', 'errmsg' => "上传成功",'userid'=>$insertid, 'vid'=>$num)));

		}else{

			exit(json_encode(array('status' => '0', 'errmsg' => "发生错误，请重试！")));

		}

	}else{

		//保存视频入库
	    $videoinfo = array(
	        'title' => $_GPC['name'],
	        'introduction' => $_GPC['introduction'],
	        'phone' => $_GPC['mobile'],
	        'video_url' => $_GPC['video'],
	        'rid' => $rid,
	        'uniacid' => $uniacid,
	        'tid' => $voteuser['id'],
	        'num' => $num,
	        'create_time' => time()
	    );

	    pdo_insert('tyzm_diamondvote_votevideo',$videoinfo);
	    //$lastvideoid=pdo_insertid();
		exit(json_encode(array('status' => '1', 'errmsg' => "上传成功",'userid'=>$voteuser['id'], 'vid'=>$num)));

	}



}

$tplappye=m('tpl')->tpl_input($applydata);

$_W['page']['sitename']="作品上传";


	load()->func('tpl'); 

include $this->template(m('tpl')->style('join',$reply['style']['template']));




