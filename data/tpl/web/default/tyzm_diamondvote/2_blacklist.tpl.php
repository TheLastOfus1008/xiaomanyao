<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(IMS_VERSION<1) { ?>
<link href="<?php echo MODULE_URL;?>/template/static/css/wq1.0.css" rel="stylesheet">
<?php  } ?>
	<div class="we7-page-title">黑名单</div>
	<ul class="we7-page-tab">
	    <li<?php  if($type == '0' || $type == '' ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('blacklist',array('type'=>0));?>">黑名单用户</a></li>
		<li<?php  if($type == 1 ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('blacklist',array('type'=>1));?>">黑名单IP</a></li>
	</ul>
	<div class="we7-padding-bottom clearfix">
		<form action="./index.php" method="get" role="form" >
			<div class="input-group pull-left col-sm-4">
				<input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="tyzm_diamondvote" />
            <input type="hidden" name="do" value="blacklist" />
            <input type="hidden" name="type" value="<?php  echo $type;?>" />
				<input type="text" name="keyword" value="<?php  echo $keyword;?>" class="form-control" placeholder="请输入黑名单名称"/>
				<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
			</div>
		</form>
		<div class="pull-right" style="width:400px;">
			<form action="./index.php" method="get" role="form" >
				<div class="input-group pull-right">
					<input type="hidden" name="c" value="site" />
	            <input type="hidden" name="a" value="entry" />
	            <input type="hidden" name="m" value="tyzm_diamondvote" />
	            <input type="hidden" name="do" value="blacklist" />
	            <input type="hidden" name="type" value="<?php  echo $type;?>" />
	            <input type="hidden" name="op" value="add" />
					<input type="text" name="val"  class="form-control" placeholder="请输入黑名单名称"/>
					<span class="input-group-btn"><button class="btn btn-primary"><i class="fa fa-plus"></i> 添加黑名单</button></span>
				</div>
			</form>
		</div>
	</div>
	<table class="table we7-table table-hover vertical-middle" id="js-qr-list" ng-controller="QrDisplay" ng-cloak>

		<tr>
			<th width="100">黑名单</th>
			<th class="text-left"></th>
			<th>值</th>
			<th class="text-left">加入时间</th>
			<th class="text-left" width="100">操作</th>
		</tr>
		<?php  if(is_array($list)) { foreach($list as $row) { ?>
		<tr>
			<td>
            <?php  if($row['type']==0) { ?>
<i class="fa fa-wechat"  style=" width: 60px;height: 60px;font-size: 60px;color: #ccc;"></i>
            <?php  } else { ?>
<i class="fa fa-globe"  style=" width: 60px;height: 60px;font-size: 60px;color: #ccc;"></i>
            <?php  } ?>
			</td>
			<td title="<?php  echo $row['value'];?>"><?php  echo $row['value'];?></td>
			<td title="<?php  echo $row['content'];?>"><?php  echo $row['content'];?></td>
			<td class="text-left"><?php  echo date('Y-m-d <br /> H:i:s', $row['createtime']);?></td>
			<td class="text-left">
				<div class="link-group">
						<a href="<?php  echo $this->createWebUrl('blacklist',array('op'=>'delete','id'=>$row['id']));?>"  onclick="return confirm('您确定要删除该二维码以及其统计数据吗？')">删除</a>
				</div>
			</td>
		</tr>
		<?php  } } ?>
	</table>
	<div class="help-block">
		
	</div>
	<div class="pull-right">
		<?php  echo $pager;?>
	</div>
</div>
<script>
	angular.bootstrap($('#js-qr-list'), ['qrApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>