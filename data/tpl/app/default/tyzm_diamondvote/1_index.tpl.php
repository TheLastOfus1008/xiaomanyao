<?php defined('IN_IA') or exit('Access Denied');?>﻿<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<?php  if($reply['isindexslide']==1) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sider', TEMPLATE_INCLUDEPATH)) : (include template('sider', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
<style type="text/css">
	.slide{    border-bottom: 1px solid #000;}
</style>
<?php  if($reply['topimg']!="") { ?>
<div class="divmain1"><img src="<?php  echo tomedia($reply['topimg']);?>" alt="shareImg"></div>
<?php  } ?>
<div class="num_box assa">
	<ul class="num_box_ul">
		<li><span class="text"><i class="glyphicon glyphicon-paperclip"></i> 已报名</span> <span><?php  echo $jointotal;?></span></li>
		<li><span class="text"> <i class="glyphicon glyphicon-thumbs-up"></i> 累计投票</span> <span><?php  echo $votetotal;?></span></li>
		<li><span class="text"><i class="glyphicon glyphicon-eye-open"></i> 访问量</span> <span><?php  echo $pvtotal;?></span></li>

    </ul>
	
<div class="time-item">
    <div class="day">活动结束倒计时</div>
	<strong id="day_show">0天</strong>
	<strong id="hour_show">0时</strong>
	<strong id="minute_show">0分</strong>
	<strong id="second_show">0秒</strong>
</div>
	
<div class='join-item'>
<?php  if($voteuser['id']!="") { ?>
<div class='join_us'><a href='<?php  echo $this->createMobileUrl('view', array('rid' => $reply['rid'],'id'=>$voteuser['id']))?>'>我的投票</a></div>
<?php  } else { ?>
	<?php  if($aptime!=2) { ?>
	<div class='join_us'><a href='<?php  echo $this->createMobileUrl('join', array('rid' => $reply['rid']))?>'>我要报名</a></div>
	<?php  } ?>
<?php  } ?>

</div>

</div>
<div class="search">
<div class="joinsearch clearfix">
  <input type="text" value="" name="sci" placeholder="请输入编号或姓名" class="inputtxt">
  <div class="divsub" onclick="get_list(1);">搜&nbsp;索</div>
</div>
</div>
<?php  if($reply['infoorder']==1) { ?>
<div class="divmain10 ">
  <div class="divcon">
  <?php  if($reply['eventrule']=="") { ?>
     请至后台编辑活动，设置活动规则内容，支持HTML！
  <?php  } else { ?>
	 <?php  echo $reply['eventrule'];?>
  <?php  } ?>
  </div>
</div>
<?php  } ?>
<section class="content" id="toupiao">
<div id="pageCon">
<ul class="list_box clearfix" id="list_box" style="position: relative;"></ul>
<div id="list_more" class="box"><span class="am-text-secondary" onclick="get_list(0);">查看更多</span></div>
<?php  echo m('tpl')->AdPiece('tyzm_diamondvote_index',$reply['index_ad']);?>
</div>
</section>
<div style="clear:both;"></div>

<?php  if($reply['infoorder']==0) { ?>
<div class="divmain10 eventrule">
  <div class="tabtitle macol">
       <i class="fa fa-file-text-o"></i> 活动规则
   </div>
  <div class="divcon">
  <?php  if($reply['eventrule']=="") { ?>
     请至后台编辑活动，设置活动规则内容，支持HTML！
  <?php  } else { ?>
	 <?php  echo $reply['eventrule'];?>
  <?php  } ?>
  </div>
</div>
<?php  } ?>
<div class="copyright"></div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('nav_footer', TEMPLATE_INCLUDEPATH)) : (include template('nav_footer', TEMPLATE_INCLUDEPATH));?>

<script type="text/javascript">
var limit = 1;
function get_list(ty){
    
    if(ty==1){
	   var keyword=$("input[name='sci']").val();
	   if(keyword==""){
	      dialog2("请输入编号或姓名");
		  return false;
	   }
	   $("#pageCon .list_box").html('');
	}else{
	   $("#list_more").html('<div class="am-text-secondary"><span class="am-icon-spinner am-icon-spin">卖命加载中...</span> </div>');
	   var keyword="";
	}
	
	$.ajax({
	    type : "post",
	    url : "<?php  echo $this->createMobileUrl('Index',array('rid'=>$rid))?>",
	    data : {
	    	limit:limit,
			keyword:keyword
	    },
        dataType : "json",		
	    success : function(data) {
	    	if(data.status==200){
						var list = data.content;
						var content = '';
						for(var i=0; i<list.length; i++){
							content += '<li class="picCon"><div>'
							+'<i class="number">'+list[i]['noid']+'号，'+list[i]['votenum']+'票</i>'
							+'<a href="'+list[i]['url']+'" class="img"><img src="'+list[i]['img1']+'"></a>'
							+'<div class="clearfix"><p>'+list[i]['name']+'</p>'
							+'<a href="'+list[i]['url']+'" class="vote">投票</a></div>'
							+'</div></li>';
							
						}
                        $("#pageCon .list_box").append(content);
						if(list.length==10){
							$("#list_more").html('<span class="am-text-secondary" onclick="get_list(0);">查看更多</span>');
						}else{
							$("#list_more").html('');
						}		
	                    limit++;

						

waterfall();
		    }else if(data.status==-103){
	    		$("#list_more").html('<span>没有更多记录！</span>');
	    	}else if(data.status==301){
	    		$("#list_more").html('<span>没有搜索到内容！</span>');
	    	}else{
			    $("#list_more").html('<span>没有更多记录！</span>');
			}    	
	    },
	    error : function(xhr, type) {

	    }
	});
	    

}
get_list(0);

function waterfall(limit){
$container = $('#list_box');
$container.masonry('reload');
	$container.imagesLoaded(function() {
		$container.masonry({
			itemSelector: '.picCon',
			gutter: 20,
			isAnimated: true,
			});
		});
}

<?php  if($reply['indexsound']) { ?>
			$("body").append('<div class="video_exist play_yinfu" id="audio_btn" style="display: block;"><div id="yinfu" class="rotate"></div><audio preload="auto" autoplay="autoplay" id="media" src="<?php  echo tomedia($reply['indexsound']);?>" loop></audio></div>');
			$("#media")[0].play();
			document.addEventListener("WeixinJSBridgeReady", function () {$("#media")[0].play();}, false);
			$("#audio_btn").click(function() {
				$(this).hasClass("off") ? ($(this).addClass("play_yinfu").removeClass("off"), $("#yinfu").addClass("rotate"), $("#media")[0].play()) : ($(this).addClass("off").removeClass("play_yinfu"), $("#yinfu").removeClass("rotate"), $("#media")[0].pause())
			})
<?php  } ?>
    
</script>
<script type="text/javascript">
var intDiff = parseInt(<?php  echo $reply['endtime']-time();?>);//倒计时总秒数量
function timer(intDiff){
	window.setInterval(function(){
	var day=0,
		hour=0,
		minute=0,
		second=0;//时间默认值		
	if(intDiff > 0){
		day = Math.floor(intDiff / (60 * 60 * 24));
		hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
		minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
		second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
	}
	if (minute <= 9) minute = '0' + minute;
	if (second <= 9) second = '0' + second;
	$('#day_show').html(day+"天");
	$('#hour_show').html('<s id="h"></s>'+hour+'时');
	$('#minute_show').html('<s></s>'+minute+'分');
	$('#second_show').html('<s></s>'+second+'秒');
	intDiff--;
	}, 1000);
} 

$(function(){
	timer(intDiff);
});	
</script>
<script src="//cdn.bootcss.com/masonry/2.1.08/jquery.masonry.min.js"></script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>