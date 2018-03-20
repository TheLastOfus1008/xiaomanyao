<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(IMS_VERSION<1) { ?>
<link href="<?php echo MODULE_URL;?>/template/static/css/wq1.0.css" rel="stylesheet">
<?php  } ?>

<?php  if($op=="display") { ?>
	<div class="we7-page-title">【<?php  echo $reply['title'];?>】域名管理</div>
	<ul class="we7-page-tab">
	    <li class="active" ><a href="<?php  echo $this->createWebUrl('domainlist');?>">活动备选域名</a></li>
	</ul>
	<div class="we7-padding-bottom clearfix">
		<form action="./index.php" method="get" role="form" >
			<div class="input-group pull-left col-sm-4">
				<input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="tyzm_diamondvote" />
            <input type="hidden" name="do" value="domainlist" />
            <input type="hidden" name="rid" value="<?php  echo $rid;?>" />
            <input type="hidden" name="type" value="<?php  echo $type;?>" />
				<input type="text" name="keyword" value="<?php  echo $keyword;?>" class="form-control" placeholder="请输入域名名称"/>
				<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
			</div>
		</form>
		<div class="pull-right" >
			<a class="btn btn-primary" href="<?php  echo $this->createWebUrl('domainlist',array('op'=>'post','rid'=>$rid));?>">+ 添加域名</a>
		</div>
	</div>
	<div class="alert alert-success" role="alert">
	<strong>随机域名作用：尽量减少主域名暴露给用户，结合泛域名，每位用户访问的域名都不一样，被举报时，官方收到的域名不一样，减少被封的可能，被封时，也是封其中一个随机域名，保障主域名的安全。但是不是保障主域名不被封，被封的随机域名也无法打开，但是通过修改后台的随机域名，活动正常运行。</strong>
	<br />
1，启动随机域名，必须设置主域名，主域名不能设置为泛域名；<br>
2，主域名主要用户支付使用；<br>
3，必须设置oAuth独立域名（订阅号借权，认证服务号都需要设置）；<br>
4，其他随机域名可以任意加；<br>
5，泛域名设置时，随机生成多级域名，每位用户每次访问随机一个域名，例如：设置泛域名为 wx.xxx.com，随机域名为：jsad23.wx.xxx.com； <br>
6，其中的域名被封时，可以禁用或删除。<br>
<strong>不理解作用用户，可以不设置，不影响活动正常运行。</strong><br>
<a href="http://doc.nowbeta.com/index.php?s=/1&page_id=4" target="_blank"	 class="btn_add_join text-danger"><i class="fa fa-eye" title="查看教程"></i> 查看教程</a>
	</div>
	<table class="table we7-table table-hover vertical-middle" id="js-qr-list" ng-controller="QrDisplay" ng-cloak>

		<tr>
			<th width="200">域名</th>
			<th>主域名</th>
			<th>泛域名</th>
			<th>状态</th>
			<th class="text-left">加入时间</th>
			<th class="text-left" width="200">备注</th>
			<th class="text-left" width="155">操作</th>
		</tr>
		<?php  if(is_array($list)) { foreach($list as $row) { ?>
		<tr>
			<td><?php  echo $row['domain'];?></td>
			<td><?php  if($row['type']) { ?> <span class="label label-success">是</span> <?php  } else { ?> <span class="label label-default">否</span> <?php  } ?></td>
			<td><?php  if($row['extensive']) { ?> <span class="label label-success">是</span> <?php  } else { ?> <span class="label label-default">否</span> <?php  } ?></td>
			<td><?php  if($row['status']) { ?> <span class="label label-danger">无效</span> <?php  } else { ?> <span class="label label-success">正常</span> <?php  } ?></td>
			<td class="text-left"><?php  echo date('Y-m-d <br /> H:i:s', $row['createtime']);?></td>
			<td><?php  echo $row['description'];?></td>
			<td class="text-left">
				<div class="link-group">
				        <a href="<?php  echo $this->createWebUrl('domainlist',array('op'=>'post','id'=>$row['id'],'rid'=>$row['rid']));?>"><i class="fa fa-edit"></i> 编辑</a>
						<a href="<?php  echo $this->createWebUrl('domainlist',array('op'=>'delete','id'=>$row['id'],'rid'=>$row['rid']));?>"  onclick="return confirm('您确定要删除该二维码以及其统计数据吗？')"><i class="fa fa-times"></i> 删除</a>
				</div>
			</td>
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

<?php  } ?>

<?php  if($op=="post") { ?>

<style type="text/css">
	

	.domain-post .we7-form input[type=radio], .domain-post .we7-form input[type=checkbox] {
    display: inline-block;
    cursor: pointer;
}
</style>
<ol class="breadcrumb we7-breadcrumb">
	<a href="<?php  echo $this->createWebUrl('domainlist',array('rid'=>$rid));?>"><i class="wi wi-back-circle"></i> </a>
	<li><a href="<?php  echo $this->createWebUrl('domainlist',array('rid'=>$rid));?>">域名列表</a></li>
	<li><a href="javascript;:">编辑</a></li>
</ol>
<form action="" method="post"  class="domain-post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php  echo $id;?>">
	<div class="we7-form"  >			
		<div class="form-group">
			<label for="" class="control-label col-sm-2">域名</label>
			<div class="form-controls col-sm-10">
				<input type="text" name="domain" value="<?php  echo $list['domain'];?>" class="form-control"/>
			</div>
		</div>
		<div class="form-group">
	          <label class="control-label col-sm-2">主域名</label>
	          <div class="form-controls col-sm-8">
	             <label><input type="radio" value="0" name="type" <?php  if($list['type'] == 0 ) { ?>checked<?php  } ?> >否</label>
				 <label><input type="radio" value="1" name="type" <?php  if($list['type'] == 1 ) { ?>checked<?php  } ?>>是 </label>
				 <div class="help-block">主域名仅作为获取信息使用，没有设置主域名时，默认访问地址为主域名</div>
			
	          </div>
	    </div>
		<div class="form-group">
	          <label class="control-label col-sm-2">泛域名</label>
	          <div class="form-controls col-sm-8">
	             <label><input type="radio" value="0" name="extensive" <?php  if($list['extensive'] == 0 ) { ?>checked<?php  } ?> >否</label>
				 <label><input type="radio" value="1" name="extensive" <?php  if($list['extensive'] == 1 ) { ?>checked<?php  } ?>>是 </label>
				 <div class="help-block">饭域名时，只填写跟域名！</div>
			
	          </div>
	    </div>
		<div class="form-group">
          <label class="control-label col-sm-2">是否有效</label>
          <div class="form-controls col-sm-8">
             <label><input type="radio" value="0" name="status" <?php  if($list['status'] == 0 ) { ?>checked<?php  } ?>>有效    </label>
             <label><input type="radio" value="1" name="status" <?php  if($list['status'] == 1 ) { ?>checked<?php  } ?>>无效  </label>
          </div>
        </div>
		<div class="form-group">
			<label for="" class="control-label col-sm-2">备注</label>
			<div class="form-controls col-sm-10">
				<textarea class="form-control" name="description" rows="2" ><?php  echo $list['description'];?></textarea>
				<span class="help-block">仅作为备注显示</span>
			</div>
		</div>
        <input name="submit" value="发布" class="btn btn-primary btn-submit" type="submit">
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	</div>
</form>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>