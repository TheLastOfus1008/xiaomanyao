<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(IMS_VERSION<1) { ?>
<link href="<?php echo MODULE_URL;?>/template/static/css/wq1.0.css" rel="stylesheet">
<?php  } ?>
<style>

.setvotestatus{cursor:pointer;}
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{
white-space: normal;
word-wrap: break-word;
word-break: normal;
}
</style>
<div class="main1">
<div class="we7-page-title">投票数据</div>
    <ul class="we7-page-tab">
	<li<?php  if($_GPC['ty'] == '' && $_GPC['do'] == 'votelist' && $_GPC['ranking'] == ''  ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid']));?>">全部投票</a></li>

	<li<?php  if($_GPC['ty'] == 'votenum') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votedata',array('rid'=>$_GPC['rid'],'id'=>$_GPC['id'],'ty'=>'votenum'))?>">投票数据</a></li>	

</ul>

    
 

    <div class="we7-padding-bottom clearfix">
        <form action="./index.php" method="get" role="form" >
            <div class="input-group pull-left col-sm-4">
            <input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="tyzm_diamondvote" />
        	<input type="hidden" name="do" value="votedata" />
			<input type="hidden" name="rid" value="<?php  echo $_GPC['rid'];?>" />
			<input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>" />
            <input class="form-control" name="keyword" id="" placeholder="输入ip，昵称" type="text" value="<?php  echo $_GPC['keyword'];?>">
            <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
            </div>
        </form>
<!--         <div class="pull-right">
            <a class="btn btn-primary"href="<?php  echo $this->createWebUrl('downloadvote',array('id'=>$_GPC['id'],'rid'=>$_GPC['rid']));?>"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> 导出投票数据</a>
        </div> -->
    </div>


<!--   <div class="col-sm-6 col-md-1">
	<div class="thumbnail">
	  <img src="<?php  echo $voteuser['avatar'];?>" alt="...">
	</div>
  </div> -->

  <span class="label label-default"><?php  echo $video['title'];?></span>
  <button class="btn btn-primary" type="button"> 票数 <span class="badge"><?php  echo $total;?></span>
</button>

</div>
<!-- <div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 10px;" >
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>说明：</strong>票数可能和列表不符，因为 “票数=普通票数+礼物抵票”决定，还有可以编辑。
</div> -->



        <table class="table we7-table table-hover">
            <thead class="navbar-inner">
                <tr><th  width="100">ID</th>	
					<th   width="100">头像</th>	
                    <th>用户openid</th>	
					<?php  if($_GPC['ty']=="diamondnum" || $_GPC['ty']=="order" ) { ?>
					<th>钻石鸡蛋</th>
					<th>订单号</th>
					<?php  } ?>
					<?php  if($_GPC['ty']=="order") { ?>
					<th>状态</th>
					<th>兑换积分</th>
					<?php  } ?>
					<th>ip</th>
					<th>时间</th>
					<?php  if($_GPC['ty']=="votenum") { ?>
					<th>状态</th>
					<?php  } ?>
					<?php  if($reply['divideinto']!="" && $_GPC['ty']!="votenum") { ?>
					<th>红包状态</th>
					<?php  } ?>
					<th>操作</th>
                </tr>
            </thead> 
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td><?php  echo $row['id'];?></td>
					<td style="text-align:center"><img src="<?php  echo tomedia($row['avatar']);?>" width="48"></td>
					<td><?php  echo $row['nickname'];?><br />

					<?php  echo $row['openid'];?>

  <span class="label label-danger" onclick="addblack('<?php  echo $row['openid'];?>',0);">加入黑名单</span>
					</td>							
	                <?php  if($_GPC['ty']=="diamondnum"|| $_GPC['ty']=="order" ) { ?>
					<td><span class="label label-success"><?php  echo $row['fee'];?></span><br/><?php  if($row['votetype']==1) { ?><span class="label label-primary">钻石</span><?php  } ?><?php  if($row['votetype']==2) { ?><span class="label label-default">鸡蛋</span><?php  } ?></td>
					<td><?php  echo $row['ptid'];?></td>
					<?php  } ?>
					<?php  if($_GPC['ty']=="order") { ?>
					<td><?php  if($row['ispay']==0) { ?><span class="label label-danger">未付款</span><?php  } else { ?><span class="label label-success">已付款</span><?php  } ?></td>
					<td><?php  if($row['isdeal']==0) { ?><span class="label label-danger">未兑换积分</span><?php  } else { ?><span class="label label-success">已兑换积分</span><?php  } ?></td>
					<?php  } ?>
					<td><?php  echo $row['ipaddress'];?><br/><?php  echo $row['user_ip'];?>

<span class="label label-danger" onclick="addblack('<?php  echo $row['user_ip'];?>',1);">加入黑名单</span>

					</td>	
					<td><?php  echo date('Y-m-d H:i:s',$row['createtime'])?></td>
					<?php  if($_GPC['ty']=="votenum") { ?>
					<td><?php  if($row['status']==1) { ?><span class="label label-danger setvotestatus" data-id="<?php  echo $row['id'];?>" data-s="0">无效</span> <?php  } else { ?><span class="label label-success setvotestatus" data-id="<?php  echo $row['id'];?>" data-s="1">有效</span><?php  } ?></td>	
                    <?php  } ?>
					<?php  if($reply['divideinto']!="" && $_GPC['ty']!="votenum") { ?>
						<td>
						<?php  if($row['result_code']=="SUCCESS") { ?>
						<div class="alert alert-success"><?php  echo $row['return_msg'];?></div>
						
						<?php  } else { ?>
						<div class="alert alert-danger"><?php  echo $row['return_msg'];?></div>
						<?php  } ?>
						</td>	
					<?php  } ?>
					
                   <td>
				   <?php  if($reply['divideinto']!="" && $_GPC['ty']!="votenum") { ?>
						<?php  if($row['result_code']!="SUCCESS") { ?>
						
						<a href='<?php  echo $this->createWebUrl('otherset', array('ty' => 'retryredpack','rid' => $row['rid'],'id' => $row['id']))?>' class="btn btn-primary">重发</a>

						<?php  } ?>
					<?php  } ?>
				   
				   </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
      <div class="pull-right">
        <?php  echo $pager;?>
    </div>
    

</div>
<script>
$(function(){

            $(".check_all").click(function(){
            var checked = $(this).get(0).checked;
                    $("input[type=checkbox]").attr("checked", checked);
            });
                    $("input[name=deleteall]").click(function(){

            var check = $("input:checked");
                    if (check.length < 1){
            err('请选择要删除的记录!');
                    return false;
            }
            if (confirm("确认要删除选择的记录?")){
            var id = new Array();
                    check.each(function(i){
                    id[i] = $(this).val();
                    });
                    $.post('<?php  echo create_url('site/module', array('do' => 'deleteAll', 'name' => 'tyzm_pintu'))?>', {idArr:id}, function(data){
                    if (data.errno == 0)
                    {
                    location.reload();
                    } else {
                    alert(data.error);
                    }


                    }, 'json');
            }

            });
			
			

$(".setvotestatus").click(function(){
    var clickthis=$(this);
    var vid=clickthis.attr('data-id');
	var status=clickthis.attr('data-s');
	$.ajax({
		type : "post",
		url : "<?php  echo $this->createWebUrl('otherset',array('rid'=>$_GPC['rid'],'id'=>$_GPC['id'],'ty'=>'setvotestatus'))?>",
		data : {
			vid : vid,
			status : status,
		},
		dataType : "json",
		success : function(res) {
			if (res.status == 200) {
			    clickthis.attr('data-s',(1-status));
				if(clickthis.hasClass('label-success')){
				    clickthis.removeClass("label-success");
                    clickthis.addClass('label-danger');
					clickthis.html('无效');
                }else{
				    clickthis.removeClass("label-danger");
				    clickthis.addClass('label-success');
					clickthis.html('有效');
				}
			}
		}

	});
});		
			
});
</script>
<script>

function addblack(val,type){
   
	$.ajax({
		type : "post",
		url : "<?php  echo $this->createWebUrl('blacklist',array('op'=>'add'))?>"+"&val="+val+"&type="+type,
		dataType : "json",
		success : function(res) {
			if (res.type == 'success') { 
			    alert("添加成功");
			}else{
				alert("已添加"); 
		    }
		}
	});
};	
            function drop_confirm(msg, url){
            if (confirm(msg)){
            window.location = url;
            }
            }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>