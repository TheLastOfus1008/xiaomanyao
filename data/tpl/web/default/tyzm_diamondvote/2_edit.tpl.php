<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<?php  if(IMS_VERSION<1) { ?>

<link href="<?php echo MODULE_URL;?>/template/static/css/wq1.0.css" rel="stylesheet">

<?php  } ?>

<style>

.thumbnail img{min-width: 20px;min-height: 20px;}

.main_form .we7-form input[type=radio], .main_form .we7-form input[type=checkbox] {

    display: inline-block;

    cursor: pointer;

}

.btn-downpic{

<?php  if($nodownpic==1 ) { ?>

  display:1none;

  <?php  } ?>

}

 .we7-form input[type=radio],  .we7-form input[type=checkbox] {

    display: inline-block;

    cursor: pointer;

}

</style>

<div class="we7-page-title">编辑／新增投票用户</div>

<ul class="we7-page-tab">

	<li<?php  if($_GPC['ty'] == '' && $_GPC['do'] == 'votelist' && $_GPC['ranking'] == ''  ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid']));?>">全部投票</a></li>

    <li<?php  if($_GPC['ty'] == '2') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ty'=>2));?>">待审核</a></li>

	<li<?php  if($_GPC['ty'] == '1') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ty'=>1));?>">审核通过</a></li>

	<li<?php  if($_GPC['ty'] == '3') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ty'=>0));?>">审核未通过</a></li>

	<li<?php  if($_GPC['commend'] == '1') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'commend'=>1));?>">推荐视频</a></li>

	<li<?php  if($_GPC['ranking'] == '0') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ranking'=>0));?>">票数排行</a></li>


</ul>

<div class="we7-form">

	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">

		<div class="panel-body" id="step1">



			<div class="panel-body">


				<div class="form-group">

					<label class="control-label col-sm-2 control-label"><span class="text-danger">*</span> 标题</label>

					<div class="col-sm-8 col-xs-12">

						<input type="text" class="form-control" name="title" value="<?php  echo $video['title'];?>"/>

						<span class="help-block"></span>

					</div>

				</div>

				<div class="form-group">

					<label class="control-label col-sm-2 control-label"><span class="text-danger"></span><span class="text-danger">*</span>宣言</label>

					<div class="col-sm-8 col-xs-12">

						<textarea name="introduction" class="form-control js-a" cols="30" rows="3"><?php  echo $video['introduction'];?></textarea>

					</div>

				</div>

				<div class="form-group">

					<label class="control-label col-sm-2 control-label"><span class="text-danger"></span><span class="text-danger">*</span>手机号</label>

					<div class="col-sm-8 col-xs-12">

						<textarea name="phone" class="form-control js-a" cols="30" rows="3"><?php  echo $video['phone'];?></textarea>

					</div>

				</div>


				<div class="form-group">

					<label class="control-label col-sm-2 control-label">审核</label>

					<div class="col-sm-8 col-xs-12">

						<label class="radio-inline">

						<input type="radio" name="status" value="0" <?php  if($video['status']=='0') { ?> checked <?php  } ?> />审核中

					</label>

					<label class="radio-inline">

						<input type="radio" name="status" value="1" <?php  if($video['status']=='1') { ?> checked <?php  } ?>  />审核通过

					</label>

					<label class="radio-inline">

						<input type="radio" name="status" value="2" <?php  if($video['status']=='2') { ?> checked <?php  } ?>  />审核不通过

					</label>

					</div>

				</div>

				<div class="form-group">

					<label class="control-label col-sm-2 control-label">是否推荐</label>

					<div class="col-sm-8 col-xs-12">

						<label class="radio-inline">

						<input type="radio" name="commend" value="0" <?php  if($video['commend']=='0') { ?> checked <?php  } ?> />否

					</label>

					<label class="radio-inline">

						<input type="radio" name="commend" value="1" <?php  if($video['commend']=='1') { ?> checked <?php  } ?>  />是

					</label>

					

					</div>

				</div>

			</div>

          </div>

        </div>



		<div class="form-group col-sm-12">

			<input name="submit" id="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">

			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />

		</div>

	</form>

</div>

<script>

	$('#form1').submit(function() {

		if(!$.trim($(':text[name="title"]').val())) {

			util.message('请填写标题');

			return false;

		}


		 

	});

</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

