<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<ul class="we7-page-tab">
	<li class="active"><a href="<?php  echo $this->createWebUrl('blacklist', array('direct' => 1))?>">黑名单设置</a></li>
</ul>
<div class="alert alert-info">
	<p><i class="wi wi-info-sign">将用户放入黑名单，用户登录就无权限进入“商城”</i></p>
</div>
<div class="clearfix we7-margin-bottom">
		<div class="pull-right">
			<a href="#" class="btn btn-primary we7-padding-horizontal" data-toggle="modal" data-target="#balck">添加黑名单用户</a>
		</div>
</div>
<div>
	<table class="table we7-table table-hover site-list">
		<col width=""/>
		<col width="90px"/>
		<tr>
			<th class="text-left">用户名</th>
			<th class="text-left">操作</th>
		</tr>
		<?php  if(!empty($blacklist)) { ?>
			<?php  if(is_array($blacklist)) { foreach($blacklist as $item) { ?>
			<tr ng-repeat="multi in multis">
				<td class="vertical-middle">
					<span><?php  echo $item;?></span>
				</td>
				<td class="text-left">
					<div class="link-group text-left">
						<a href="<?php  echo $this->createWebUrl('blacklist', array('operation' => 'delete', 'username' => $item, 'direct' =>1))?>">删除</a>
					</div>
				</td>
			</tr>
			<?php  } } ?>
		<?php  } else { ?>
			<tr>
				<td colspan="2" class="text-center">暂无数据</td>
			</tr>
		<?php  } ?>
	</table>
	<div class="modal fade" id="balck" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel6">添加黑名单用户</h4>
				</div>
				<form action="" method="post" class="we7-form">
					<input type="hidden" name="c" value="site">
					<input type="hidden" name="a" value="entry">
					<input type="hidden" name="do" value="blacklist">
					<input type="hidden" name="m" value="<?php  echo $_W['current_module']['name'];?>">
					<input type="hidden" name="direct" value="1">
					<input type="hidden" name="operation" value="post">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
					<div class="modal-body we7-padding">
						<div class="form-group">
							<label class="control-label col-sm-2">用户名：</label>
							<div class="col-sm-8">
								<input type="text" name="username" class="form-control" placeholder="请填写用户名">
								<span class="help-block">输入用户名，点击保存即可。</span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">确定</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>