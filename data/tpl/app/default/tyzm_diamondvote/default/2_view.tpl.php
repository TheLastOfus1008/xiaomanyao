<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sider', TEMPLATE_INCLUDEPATH)) : (include template('sider', TEMPLATE_INCLUDEPATH));?>
<?php  if($reply['status']==0 || $reply['status']=="") { ?>
<div class="alert alert-warning" style="text-align:center;position: fixed;top:40%;z-index: 2; width:80%;margin:0 10%;">活动已禁用！</div>
<div class="weui-mask"></div>
<?php  } ?>


<img src="<?php  echo $voteuser['img1'];?>" alt="shareImg" width="0px" height="0px" style="display: block;" />

<div id="focus" class="focus focus2" style="">
	<div class="hd">
		<ul>
			<li class="on"></li>
		</ul>
	</div>
	<div class="bd">
		<ul>
   		</ul>
	</div>
</div>
<style>

<?php  if($reply['diamondmodel']==1 || $reply['isshowgift']>=3) { ?>
.divbottommenu .divitem{width:33.333%;}
<?php  } ?>
.carousel-control.left,.carousel-control.right{background-image:none;}
#viframe{border:1px #EFEFEF solid}
.view4{margin: 0 auto;    width: 94%;overflow: hidden;}
</style>

<div class="divbotuser">
      <h2>
	  <?php  if($voteuser['attestation']==1) { ?>
	   <img src="<?php echo MODULE_URL;?>/template/static/images/v.png" width="20"  />
	  <?php  } ?>
	   
	  <img src="<?php  echo tomedia($voteuser['avatar']);?>" width="25"/> <?php  echo $voteuser['name'];?>
	  <?php  if($voteuser['status']==0) { ?>
<span class="label label-danger">  待审核</span>
<?php  } ?></h2>

</div>

<div class="divbottommenu">
  
  <div class="divitem">
	  <span><i class="glyphicon glyphicon-user"></i> 编号</span>
	  <span><?php  echo $voteuser['noid'];?></span>
  </div>
  <div class="divitem">
	  <span><i class="glyphicon glyphicon-thumbs-up"></i> 票数</span>
	  <span class="votenum"><?php  echo $voteuser['votenum'];?></span>
  </div>
  <div class="divitem">
	  <span><i class="glyphicon glyphicon-fire"></i> 热度</span>
	  <span><?php  echo $pvtotal['pv_total'];?></span>
  </div>
  <?php  if($reply['diamondmodel']!=1 && $reply['isshowgift']<3) { ?>
  <div class="divitem">
	  <span><i class="glyphicon glyphicon-gift"></i> 礼物</span>
	  <span><?php  echo $voteuser['giftcount']*$reply['giftscale'];?><?php  echo $reply['giftunit'];?></span>
  </div>
  <?php  } ?>
</div>
<div class="divviewg">
<!--/*
  *
  * Revive Adserver Asynchronous JS Tag
  * - Generated with Revive Adserver v4.0.2
  *
  */--> 

<ins data-revive-zoneid="3" data-revive-id="cf5521a0c29a35de7f416d220fe367e7"></ins>
<script async src="//tyzm.gg.v.nowbeta.com/www/delivery/asyncjs.php"></script> 
</div>

<?php  if(!empty($voteuser['introduction'])) { ?>
<div class="divview2"> 
<span><i class="glyphicon glyphicon-bullhorn"></i> 宣言：<?php  echo $voteuser['introduction'];?></span>
</div>
<?php  } ?>
<?php  if(!empty($joininfo)) { ?>
<div class="panel panel-info view2">
  <div class="panel-heading">
    <h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> 选手信息</h3>
  </div>
  <div class="panel-body">      
   <?php  if(is_array($joininfo)) { foreach($joininfo as $rom) { ?>
      <?php  echo $rom['name'];?>：<?php  echo $rom['val'];?><br/>
   <?php  } } ?>
  </div>
</div>
<?php  } ?>
<?php  if(!empty($videourl)) { ?>
<div class="view4">
<iframe frameborder="0" id="viframe" width="100%" height="240" src="<?php  echo $videourl;?>" allowfullscreen  ></iframe>
</div>
<?php  } ?>
<div class="view2">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators" >
    <?php  if($voteuser['img1']!='') { ?><li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li><?php  } ?>
    <?php  if($voteuser['img2']!='') { ?><li data-target="#carousel-example-generic" data-slide-to="1"></li><?php  } ?>
    <?php  if($voteuser['img3']!='') { ?><li data-target="#carousel-example-generic" data-slide-to="2"></li><?php  } ?>
	<?php  if($voteuser['img4']!='') { ?><li data-target="#carousel-example-generic" data-slide-to="3"></li><?php  } ?>
	<?php  if($voteuser['img5']!='') { ?><li data-target="#carousel-example-generic" data-slide-to="4"></li><?php  } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" id="previewImage">
   <?php  if($voteuser['img1']!='') { ?>
    <div class="item active">
      <img src="<?php  echo $voteuser['img1'];?>">
      <div class="carousel-caption">
      </div>
    </div>
	<?php  } ?>
	<?php  if($voteuser['img2']!='') { ?>
    <div class="item">
      <img src="<?php  echo $voteuser['img2'];?>">
      <div class="carousel-caption">
      </div>
    </div>
    <?php  } ?>
	<?php  if($voteuser['img3']!='') { ?>
	    <div class="item">
      <img src="<?php  echo $voteuser['img3'];?>">
      <div class="carousel-caption">
      </div>
    <?php  } ?>
	<?php  if($voteuser['img4']!='') { ?>
    </div>
	    <div class="item">
      <img src="<?php  echo $voteuser['img4'];?>">
      <div class="carousel-caption">
      </div>
    </div>
    <?php  } ?>
	<?php  if($voteuser['img5']!='') { ?> 
	    <div class="item">
      <img src="<?php  echo $voteuser['img5'];?>">
      <div class="carousel-caption">
      </div>
    </div>
    <?php  } ?>
  </div>
  <?php  if(is_array($videos)) { foreach($videos as $video) { ?>
	      <video src="http://video-voting.test.upcdn.net<?php  echo $video['video_url'];?>"></video>
  	<?php  } } ?>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
</div> 
<?php  if($voteuser['details']!="") { ?>
<div class="tabtitle">
       <i class="glyphicon glyphicon-book"></i> 详情
</div>
<div class="view2">
<?php  echo $voteuser['details'];?>
</div>
<?php  } ?>
<div class="vsavz">  

<?php  if($voteuser['openid']!=$openid && $myvoteid!="") { ?>
		<div class='vsav'><div class='vbtn_tnk'><a href='<?php  echo $this->createMobileUrl('view', array('rid' =>  $reply['rid'],'id' => $myvoteid))?>'>我的投票</a></div></div>
<?php  } else { ?>
	    <?php  if($voteuser['openid']!=$openid && $aptime!=2) { ?>
        <div class='vsav'><div class='vbtn_tnk'><a href='<?php  echo $this->createMobileUrl('join', array('rid' => $reply['rid']))?>'>我也要参加</a></div></div>
		<?php  } ?>
		<?php  if($voteuser['openid']==$openid && $reply['isposter']==1) { ?>
        <div class='vsav'><div class='vbtn_gre'><a onclick='loadingToast("海报生成中");' href='<?php  echo $this->createMobileUrl('poster', array('rid' => $reply['rid'],'id' => $voteuser['id']))?>' >个人海报</a></div></div>
		<?php  } ?>
		
<?php  } ?>
</div> 


<?php  if($reply['diamondmodel']!=1  && ($reply['isshowgift']=="" || $reply['isshowgift']==0 || $reply['isshowgift']==2 || $reply['isshowgift']==4)) { ?>
<div class="zuanlist">
   <div class="tabtitle">
       <i class="glyphicon glyphicon-list"></i> 礼物列表
   </div>
   <ul>
   
   </ul>
   <div id="list_more" class="box" style="margin-top: 16px; text-align: center;margin-bottom: 40px;"><span class="am-text-secondary" onclick="get_list('0');">查看更多</span></div>
</div>
<?php  } ?>

<div style="height:80px;"></div>
<div class="lapiao">
	<a href="<?php  echo $this->createMobileUrl('index', array('rid' => $rid))?>" class='l'>回首页</a>
	<?php  if($reply['diamondmodel']==0) { ?>
	<a href="<?php  echo $this->createMobileUrl('gift', array('rid' => $reply['rid'],'id' => $voteuser['id']))?>"  class='r'>礼物</a>
	<?php  } else { ?>
	<a href="<?php  echo $this->createMobileUrl('ranking', array('rid' => $reply['rid']))?>"  class='b'>榜单</a>
	<?php  } ?>

	<?php  if($reply['diamondmodel']==2) { ?>
	<a href="<?php  echo $this->createMobileUrl('gift', array('rid' => $reply['rid'],'id' => $voteuser['id']))?>" ><div class="add"><div class="i"><i><img src="<?php echo MODULE_URL;?>/template/static/images/xin.png"></i>投票</div></a>
	<?php  } else { ?>
	<div class="add" <?php  if(!empty($reply['verifycode'])) { ?> onclick='showverify();' <?php  } else { ?> id="mytoupiao" <?php  } ?> ><div class="i"><i><img src="<?php echo MODULE_URL;?>/template/static/images/xin.png"></i>投票</div>
	<?php  } ?>
</div>
</div>


<!--  礼物end -->

<div class="follow" id="follow" style="display:none">
<div class="weui-mask"></div>
<div id="guanzhubox" >
	<div class="box1" onclick="hidemod('follow');">
	<span class="span1">提示</span> 
	<span class="span2" >关闭</span></div>
	<div class="divtxt">
	<p>长按下方二维码，长按，识别二维码</p>
	<p><img src="<?php  echo $_W['account']['qrcode'];?>" width="80%" ></p>
	<?php  echo $reply['followguide'];?>
	<?php  if($_W['account']['subscribeurl']!='') { ?>
	<a href="<?php  echo $_W['account']['subscribeurl'];?>" class="weui_btn weui_btn_primary">点击进入</a>
	<?php  } ?>
	</div>
</div>
</div>
<div class="share" id="share" style="display:none">
<img src="<?php echo MODULE_URL;?>/template/static/images/share.png" style="position: absolute;top: 0;right:0;z-index: 2;" onclick="hidemod('share');" width="100%"  />
<div class="weui-mask" onclick="hidemod('share');"></div>
</div>
<div class="succeed" id="succeed" style="display:none"onclick="hidemod('succeed');">
   <?php  if($reply['voteadimg']=="") { ?>
      
   <?php  } else { ?>
   <div class="voteadd" onclick="location='<?php  echo $reply['voteadurl'];?>&sourceid=<?php  echo $id;?>'"><img src="<?php  echo tomedia($reply['voteadimg']);?>"  class="adimg" width="100%"  /><p class="adtext"><?php  echo $reply['voteadtext'];?></p></div>
   <?php  } ?>
   <div class="votets ">投票成功，今天您还可以投5票。:-D</div>
<div class="weui-mask" onclick="hidemod('succeed');"></div>
</div>

<?php  if(!empty($reply['verifycode'])) { ?>


<style type="text/css">
	
#verifybox{opacity: 1;display:none}
#verifybox .weui-dialog__bd{padding: 1.2em 1.7em;}
#imgverify{width:100%;height: 45px;border: 1px solid rgba(0,0,0,.2); border-radius: 4px;}
#verifybox input{margin-bottom: 0;text-align: center;color: rgba(45, 137, 210, 0.79);}
#verifybox input::-webkit-input-placeholder{}
</style>

<div id="verifybox">
        <div class="weui-mask"></div>
        <div class="weui-dialog">
       <div class="weui-dialog__bd">
     
	  <a href="javascript:;" id="toggle" class="input-group-btn imgverify"><img id="imgverify" src="<?php echo MODULE_URL;?>/template/static/images/codeloading.gif"  title="点击图片更换验证码" /></a>
	  <br/>
	  <input name="verify" type="number" class="form-control" oninput="if(value.length>4)value=value.slice(0,4)" placeholder="请输入验证码">
            </div>
            <div class="weui-dialog__ft">
                <a id="mytoupiao" href="javascript:;" class="weui-dialog__btn weui-dialog__btn_primary">确认投票</a>
            </div>
        </div>
</div> 
<script>

function showverify(){
	$("#verifybox").show();
	$("input[name='verify']").val('');
	$("input[name='verify']").focus();
	$('#imgverify').prop('src', "<?php  echo $this->createMobileUrl('code')?>&r="+Math.round(new Date().getTime()));
	return false;
}


$('#toggle').click(function() {
	$('#imgverify').prop('src', "<?php  echo $this->createMobileUrl('code')?>&r="+Math.round(new Date().getTime()));
	return false;
});
</script>
<?php  } ?>

<?php  if($reply['isredpack']==1) { ?>
	<!-- 加入弹出框开始 -->
    <div class="prompt early" id="redpack" style="display:none">
    <div class="redpackbox" >
	  <span class="close"  onclick="hidemod('redpack');$('#lottery').show();" >关闭</span>
      <div class=" clearfix">
          <h2 class="redtishi">恭喜获得抽奖机会！</h2>
      </div>
      <div class="redpackimg">
        <p>
			<img src="<?php echo MODULE_URL;?>/template/static/images/redpack1.png">
        </p>
      </div>
	  <div class="redtirp">每次参加获得一次抽奖机会，点击下面按钮打开红包吧！</div>
      <div class="choujiang" ><a  href="javascript:;" id="lottery" voteid-data="0">抽奖</a></div>
	  
    </div>
	<div class="weui-mask"></div>
	</div> 
    <!-- 加入弹出框结束 -->
<?php  } ?>	 
<script>
 
$(document).ready(function(){
var latitude=0;
var longitude=0;
<?php  if((!empty($reply['area']) && empty($reply['locationtype'])) || $reply['redpackarea']!="") { ?>

	wx.ready(function (){
		wx.getLocation({
		type: 'gcj02', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
			success: function (res) {
				latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
				longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
				var speed = res.speed; // 速度，以米/每秒计
				var accuracy = res.accuracy; // 位置精度
				hidemod("loadingToast");
			},
			cancel: function (res) {
					hidemod("join");
					dialog2('拒绝授权获取地理位置，无法参加活动！请刷新后，同意再继续！');
					hidemod("loadingToast");
			},
		});   
	}); 
<?php  } ?>
    $("#mytoupiao").click(function(){
    
    var  verify=0;
    <?php  if(!empty($reply['verifycode'])) { ?>
	    var verify=$("input[name='verify']").val();
	    hidemod("verifybox");
    <?php  } ?>
	<?php  if(!empty($reply['area']) && empty($reply['locationtype'])) { ?>
	   if(latitude==0 || longitude==0){
	      loadingToast("获取位置...");return false;
	   }
	<?php  } ?>
	loadingToast("投票中");
   	$.ajax({
		type: "POST",
		url: "<?php  echo $this->createMobileUrl('vote', array('rid' => $reply['rid'],'id' => $vid))?>",
		data: {latitude:latitude,longitude:longitude,verify:verify},
	    dataType: "json",
	    success: function(str) {
		    hidemod("loadingToast");
			if(str!=null && str!=''){
				if(str.status == 1){
				    $(".votenum").html(Number($(".votenum").html())+1);
				    $(".votets").html(str.msg);
					<?php  if($reply['isredpack']=='1') { ?>
					  if(str.voteid){
						$("#lottery").attr('voteid-data',str.voteid); 
						$("#redpack").show();
					  }else{
						$("#succeed").show();
					  }
					<?php  } else if($reply['voteadimg']!="") { ?>
					   //window.setTimeout("$('#redpack').show();",500);
					   $("#succeed").show();
					<?php  } else { ?>
					   toast("投票成功");
					<?php  } ?>
					
				}else if(str.status == 0){
					dialog2(str.msg);
				}else if(str.status == 500){
					$("#follow").show();
				}else{
				    dialog2(str.msg);
				}
			}
	    },
	    error: function(err) {
		    hidemod("loadingToast");
	    	dialog2("发生错误，请刷新后重试！");
	    }
	});
	});




<?php  if($reply['isredpack']==1) { ?>
		$("#lottery").click(function(){
		$(this).hide();
		lottery("<?php echo MODULE_URL;?>/template/static/images/redpack3.png","红包在路上！","红包来的路上，请耐心等待...");
		$(".redpackimg img").addClass('rolls');
		var voteid=$(this).attr('voteid-data'); 
		$.ajax({
			type: "POST",
			url: "<?php  echo $this->createMobileUrl('lotteryredpack', array('rid' => $reply['rid']))?>",
			dataType: "json",
			data: {latitude:latitude,longitude:longitude,voteid:voteid},
			success: function(str) {
				if(str!=null && str!=''){
				    $(".redpackimg img").removeClass('rolls');
					if(str.status == 1){
						lottery("<?php echo MODULE_URL;?>/template/static/images/redpack5.png",str.msg,"请关注公众号或服务信息，领取现金红包！");
					}else if(str.status == 0){
						lottery("<?php echo MODULE_URL;?>/template/static/images/redpack2.png","哎哟，就差一点点","继续积累运气，等待下一次大奖的到来！");
					}
				}
			},
			error: function(err) {
				hidemod("loadingToast");
				dialog2("发生错误，请刷新后重试！");
			}
		});
	});
function lottery(img,t1,t2){
	$(".redpackimg img").attr('src',img); 
	$(".redtishi").html(t1);
	$(".redtirp").html(t2);
}
<?php  } ?>

	 $("#previewImage img").click(function(){
        var imgArray = [];
        var curImageSrc = $(this).attr('src');
        var oParent = $(this).parent();
        if (curImageSrc && !oParent.attr('href')) {
            $('#previewImage img').each(function(index, el) {
                var itemSrc = $(this).attr('src');
                imgArray.push(itemSrc);
            });
            wx.previewImage({
                current: curImageSrc,
                urls: imgArray
            });
        }
    });

});


<?php  if($reply['diamondmodel']!=1  && ($reply['isshowgift']=="" || $reply['isshowgift']==0 || $reply['isshowgift']==2|| $reply['isshowgift']==4)) { ?>
var limit = 1;
function get_list(){	
	$("#list_more").html('<div class="am-text-secondary"><span class="am-icon-spinner am-icon-spin"></span> 卖命加载中...</div>');
	$.ajax({
	    type : "post",
	    url : "<?php  echo $this->createMobileUrl('view',array('rid'=>$rid,'id'=>$id))?>",
	    data : {
	    	limit:limit,
	    },
        dataType : "json",		
	    success : function(data) {
	    	if(data.status==200){
						var list = data.content;
						var content = '';
						$(".zuanlist ul").append(list);
						for(var i=0; i<list.length; i++){
							  content = '<li><img src="'+list[i]['avatar']+'"><p>'+list[i]['cont']+'<br/><span>'+list[i]['createtime']+'</span></p></li>';
							$(".zuanlist ul").append(content);
						}
						if(list.length==10){
							$("#list_more").html('<span class="am-text-secondary" onclick="get_list();">查看更多</span>');
						}else{
							$("#list_more").html('<span></span>');
						}
						limit++;		
		    }else if(data.status==-103){
	    		$("#list_more").html('<span>没有更多记录！</span>');
	    	}else{
			    $("#list_more").html('<span>没有更多记录！</span>');
			}    	
	    },
	    error : function(xhr, type) {

	    }
	});
}
get_list();

<?php  } ?>

function GetRandomNum(Min,Max)
{   
var Range = Max - Min;   
var Rand = Math.random();   
return(Min + Math.round(Rand * Range));   
}  
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>