<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(IMS_VERSION<1) { ?>
<link href="<?php echo MODULE_URL;?>/template/static/css/wq1.0.css" rel="stylesheet">
<?php  } ?>
<style>

.setvotestatus{cursor:pointer;}
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{
white-space: normal;
word-wrap: break-word;
}
</style>
<div class="main1">
<div class="we7-page-title">投票管理</div>
 <ul class="we7-page-tab">
 <?php  if($_GPC['id']=="" ) { ?>
 
		<li<?php  if($_GPC['ty'] == '' && $_GPC['do'] == 'votelist' && $_GPC['ranking'] == ''  ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid']));?>">全部投票</a></li>
    <li<?php  if($_GPC['ty'] == '2') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ty'=>2));?>">待审核</a></li>
	<li<?php  if($_GPC['ty'] == '1') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ty'=>1));?>">已审核</a></li>
	<li<?php  if($_GPC['ranking'] == '0') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ranking'=>0));?>">票数排行</a></li>
	<li<?php  if($_GPC['ranking'] == '1') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ranking'=>1));?>">礼物排行</a></li>
	<li<?php  if($_GPC['do'] == 'giftlist') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('giftlist',array('rid'=>$_GPC['rid']));?>">全部订单</a></li>
	<li<?php  if($_GPC['do'] == 'votedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('edit',array('id'=>$_GPC['id'],'rid'=>$_GPC['rid']));?>"><?php  if($_GPC['id'] > 0) { ?>编辑投票用户<?php  } else { ?>添加投票用户<?php  } ?></a></li>
	<?php  } else { ?>
	<li<?php  if($_GPC['ty'] == '' && $_GPC['do'] == 'votelist' && $_GPC['ranking'] == ''  ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid']));?>">全部投票</a></li>

	<li<?php  if($_GPC['ty'] == 'votenum') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votedata',array('rid'=>$_GPC['rid'],'id'=>$_GPC['id'],'ty'=>'votenum'))?>">投票数据</a></li>
	<li<?php  if($_GPC['do'] == 'giftlist') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('giftlist',array('rid'=>$_GPC['rid'],'id'=>$_GPC['id']))?>">礼物数据</a></li>
	<?php  } ?>

</ul>

<?php  if($_GPC['id']=="" ) { ?>
    <div class="we7-padding-bottom clearfix">
        <form action="./index.php" method="get" role="form" >
            <div class="input-group pull-left col-sm-4">
            <input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
			<input type="hidden" name="m" value="tyzm_diamondvote" />
			<input type="hidden" name="do" value="giftlist" />
			<input type="hidden" name="rid" value="<?php  echo $_GPC['rid'];?>" />
			<input type="hidden" name="id" value="<?php  echo $_GPC['id'];?>" />
            <input class="form-control" name="keyword" id="" placeholder="输入ip，昵称，商户订单号" type="text" value="<?php  echo $_GPC['keyword'];?>">
            <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
            </div>
        </form>
        <div class="pull-right">
            <button class="btn btn-de" type="button">  所有金额：  <span class="badge"><?php  echo $ztotal;?></span></button>
            <a class="btn btn-primary"href="<?php  echo $this->createWebUrl('orderverify',array('rid'=>$_GPC['rid']));?>"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> 订单校验</a>
        </div>
    </div>
<?php  } ?>
<?php  if($_GPC['id']!="" ) { ?>

  <div class="col-sm-6 col-md-1">
	<div class="thumbnail">
	  <img src="<?php  echo tomedia($voteuser['img1']);?>" alt="...">
	</div>
  </div><span class="label label-default"><?php  echo $voteuser['name'];?></span>
  <button class="btn btn-primary" type="button">  票数 <span class="badge"><?php  echo $voteuser['votenum'];?></span>
</button> <button class="btn btn-primary" type="button">  礼物 <span class="badge"><?php  echo $voteuser['giftcount'];?></span>
</button>

<a class="btn btn-primary"href="<?php  echo $this->createWebUrl('downloadvote',array('id'=>$_GPC['id'],'rid'=>$_GPC['rid']));?>"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> 导出投票数据</a>

 
</div>
<div class="alert alert-warning alert-dismissible" style="margin-top: 10px;" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>说明：</strong>票数可能和列表不符，因为 “票数=普通票数+钻石数量*倍数”决定，还有可以编辑。
</div>
    
<?php  } ?> 

        <table class="table we7-table table-hover">
            <thead class="navbar-inner">
                <tr><th width="100">ID</th>	
					<th width="100">头像</th>	
                    <th>订单信息</th>	
					<th>礼物</th>
					<th>时间／ip</th>
					<th>操行</th>
                </tr>
            </thead> 
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td   class="text-left vertical-middle"><?php  echo $row['id'];?></td>
					<td   class="text-left vertical-middle"><img src="<?php  echo $row['avatar'];?>" width="48"><br /><?php  echo $row['nickname'];?></td>
					<td  class="text-left vertical-middle">
					<p>openid：<?php  echo $row['openid'];?></P>
<p>订单号：<?php  echo $row['ptid'];?></P>
<p>商户订单号：<?php  echo $row['uniontid'];?></P>

<p><?php  if($row['ispay']==0) { ?><span class="label label-danger">未付款</span><?php  } else { ?><span class="label label-success">已付款</span><?php  } ?></p>
					<p><?php  if($row['isdeal']==0) { ?><span class="label label-danger">未处理</span><?php  } else { ?><span class="label label-success">已处理</span><?php  } ?></p>
					</td>	
                    <td  class="text-left vertical-middle"><p>
                    <img src="<?php  echo tomedia($row['gifticon']);?>" width="48"></p><p><span class="label label-success"><?php  echo $row['gifttitle'];?></span></p>

<p><span class="label label-success"><?php  echo $row['fee'];?>元</span></p>
                    </td>
					<td  class="text-left vertical-middle"><?php  echo date('Y-m-d H:i:s',$row['createtime'])?>

<p><?php  echo $row['user_ip'];?></p>
					</td>
					
					<td  class="text-left vertical-middle"><?php  if($row['status']==1) { ?><span class="label label-danger setvotestatus" data-id="<?php  echo $row['id'];?>" data-s="0">不显示</span> <?php  } else { ?><span class="label label-success setvotestatus" data-id="<?php  echo $row['id'];?>" data-s="1">显示</span><?php  } ?></td>	
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
      <div class="pull-right">
        <?php  echo $pager;?>
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
		url : "<?php  echo $this->createWebUrl('otherset',array('rid'=>$_GPC['rid'],'id'=>$_GPC['id'],'ty'=>'setgiftstatus'))?>",
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
					clickthis.html('不显示');
                }else{
				    clickthis.removeClass("label-danger");
				    clickthis.addClass('label-success');
					clickthis.html('显示');
				}
			}
		}

	});
});		
                    });</script>
<script>
            function drop_confirm(msg, url){
            if (confirm(msg)){
            window.location = url;
            }
            }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>