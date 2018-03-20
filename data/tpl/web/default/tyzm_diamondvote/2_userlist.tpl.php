<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(IMS_VERSION<1) { ?>
<link href="<?php echo MODULE_URL;?>/template/static/css/wq1.0.css" rel="stylesheet">
<?php  } ?>

	<div class="we7-page-title">【<?php  echo $reply['title'];?>】用户管理</div>
	<ul class="we7-page-tab">
	    <li class="active" >用户列表</li>
	</ul>
	<div class="we7-padding-bottom clearfix">
		<form action="./index.php" method="get" role="form" >
			<div class="input-group pull-left col-sm-4">
				<input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="tyzm_diamondvote" />
            <input type="hidden" name="do" value="userlist" />
            <input type="hidden" name="rid" value="<?php  echo $rid;?>" />
            <input type="hidden" name="type" value="<?php  echo $type;?>" />
				<input type="text" name="keyword" value="<?php  echo $keyword;?>" class="form-control" placeholder="请输入用户id或昵称"/>
				<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
			</div>
		</form>
	</div>

	<table class="table we7-table table-hover vertical-middle" id="js-qr-list" ng-controller="QrDisplay" ng-cloak>

		<tr>
			<th>用户id</th>
			<th>昵称</th>
			<th>头像</th>
			<th>openid</th>
			<th>oauth_openid</th>
			<th class="text-left">加入时间</th>
			<th>作品数/作品总数</th>
			<th>操作</th>
		</tr>
		<?php  if(is_array($list)) { foreach($list as $row) { ?>
		<tr>
			<td><?php  echo $row['id'];?></td>
			<th><?php  echo $row['nickname'];?></th>
			<td  class="text-left vertical-middle"><img src="<?php  echo $row['avatar'];?>" width="48"></td>
			<th><?php  echo $row['openid'];?></th>
			<td class="text-left"><?php  echo $row['oauth_openid'];?></td>
			<td><?php  echo date('Y-m-d <br /> H:i:s', $row['createtime']);?></td>
			<td><?php  echo $row['showcount'];?>/<?php  echo $row['allcount'];?></td>
			<td><p>
					<a class="color-default we7-margin-right" title="查看作品" href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$rid,'uid'=>$row['id']))?>" ><i class="fa fa-edit"></i> 查看作品</a>
					</p></td>
		</tr>
		<?php  } } ?>
	</table>
	<div class="pull-right">
		<?php  echo $pager;?>
	</div>
</div>
<script>
	angular.bootstrap($('#js-qr-list'), ['qrApp']);
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>