<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>商品名称</label>
	<div class="col-sm-9 col-xs-12">
		<input type="text" name="goodsname" id="goodsname" class="form-control" value="<?php  echo $item['title'];?>" />
	</div>
</div>
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">商品单位</label>
	<div class="col-sm-6 col-xs-6">
		<input type="text" name="unit" id="unit" class="form-control" value="<?php  echo $item['unit'];?>" />
		<span class="help-block">如: 个/件/包</span>
	</div>
</div>
<!-- <div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">商品属性</label>
	<div class="col-sm-9 col-xs-12" >
		<label for="isrecommand" class="checkbox-inline">
			<input type="checkbox" name="isrecommand" value="1" id="isrecommand" <?php  if($item['isrecommand'] == 1) { ?>checked="true"<?php  } ?> /> 首页推荐
		</label>
		<label for="isnew" class="checkbox-inline">
			<input type="checkbox" name="isnew" value="1" id="isnew" <?php  if($item['isnew'] == 1) { ?>checked="true"<?php  } ?> /> 新品推荐
		</label>
		<label for="ishot" class="checkbox-inline">
			<input type="checkbox" name="ishot" value="1" id="ishot" <?php  if($item['ishot'] == 1) { ?>checked="true"<?php  } ?> /> 热卖推荐
		</label>
		<label for="isdiscount" class="checkbox-inline">
			<input type="checkbox" name="isdiscount" value="1" id="isdiscount" <?php  if($item['isdiscount'] == 1) { ?>checked="true"<?php  } ?> /> 折扣商品
		</label>
		<label for="istime" class="checkbox-inline">
			<input type="checkbox" name="istime" value="1" id="istime" <?php  if($item['istime'] == 1) { ?>checked="true"<?php  } ?> /> 限时卖
		</label>
	</div>
</div>
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">限时卖时间</label>
	<div class="col-sm-4 col-xs-6">
		<?php echo tpl_form_field_date('timestart', !empty($item['timestart']) ? date('Y-m-d H:i',$item['timestart']) : date('Y-m-d H:i'), 1)?>
	</div>
	<div class="col-sm-4 col-xs-6">
		<?php echo tpl_form_field_date('timeend', !empty($item['timeend']) ? date('Y-m-d H:i',$item['timeend']) : date('Y-m-d H:i'), 1)?>
	</div>
</div> -->

<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>分类</label>
	<div class="col-sm-8 col-xs-12">
		<?php  echo tpl_form_field_category_2level('category', $parent, $children, $item['pcate'], $item['ccate'])?>
	</div>
</div>

<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">商品图</label>
	<div class="col-sm-9 col-xs-12">
		<?php  echo tpl_form_field_image('thumb', $item['thumb'], '', array('extras' => array('text' => 'readonly')))?>
	</div>
</div>
<!-- <div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">其他图片</label>
	<div class="col-sm-9 col-xs-12">
		<?php  echo tpl_form_field_multi_image('thumbs',$piclist)?>
	</div>
</div>
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">商品编号</label>
	<div class="col-sm-4 col-xs-12">
		<input type="text" name="goodssn" id="goodssn" class="form-control" value="<?php  echo $item['goodssn'];?>" />
	</div>
</div>
<div class="form-group">
	<label class=" col-sm-3 col-md-2 control-label">商品条码</label>
	<div class="col-sm-4 col-xs-12">
		<input type="text" name="productsn" id="productsn" class="form-control" value="<?php  echo $item['productsn'];?>" />
	</div>
</div> -->
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">商品价格</label>
	<div class="col-sm-9 col-xs-12">
		<div class="input-group form-group">
			<span class="input-group-addon">销售价</span>
			<input type="text" name="marketprice" id="marketprice" class="form-control" value="<?php  echo $item['marketprice'];?>" />
			<span class="input-group-addon">元</span>
		</div>
<!-- 		<div class="input-group form-group">
			<span class="input-group-addon">市场价</span>
			<input type="text" name="productprice" id="productprice" class="form-control" value="<?php  echo $item['productprice'];?>" />
			<span class="input-group-addon">元</span>
		</div>
		<div class="input-group form-group">
			<span class="input-group-addon">成本价</span>
			<input type="text" name="costprice" id="costprice" class="form-control" value="<?php  echo $item['costprice'];?>" />
			<span class="input-group-addon">元</span>
		</div> -->
		<div class="input-group form-group">
			<span class="input-group-addon">原价</span>
			<input type="text" name="originalprice" id="originalprice" class="form-control" value="<?php  echo $item['originalprice'];?>" />
			<span class="input-group-addon">元</span>
		</div>
	</div>
</div>
<!-- <div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">重量</label>
	<div class="col-sm-6 col-xs-12">
		<div class="input-group">
			<input type="text" name="weight" id="weight" class="form-control" value="<?php  echo $item['weight'];?>" />
			<span class="input-group-addon">克</span>
		</div>
	</div>
</div> -->
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">库存</label>
	<div class="col-sm-6 col-xs-12">
		<div class="input-group">
			<input type="text" name="total" id="total" class="form-control" value="<?php  echo $item['total'];?>" />
			<span class="input-group-addon">件</span>
		</div>
		<span class="help-block">当前商品的库存数量</span>
	</div>
</div>
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">减库存方式</label>
	<div class="col-sm-9 col-xs-12">
		<label for="totalcnf1" class="radio-inline"><input type="radio" name="totalcnf" value="0" id="totalcnf1" <?php  if(empty($item) || $item['totalcnf'] == 0) { ?>checked="true"<?php  } ?> /> 拍下减库存</label>
		&nbsp;&nbsp;&nbsp;
		<label for="totalcnf2" class="radio-inline"><input type="radio" name="totalcnf" value="1" id="totalcnf2"  <?php  if(!empty($item) && $item['totalcnf'] == 1) { ?>checked="true"<?php  } ?> /> 付款减库存</label>
		&nbsp;&nbsp;&nbsp;
		<label for="totalcnf3" class="radio-inline"><input type="radio" name="totalcnf" value="2" id="totalcnf3"  <?php  if(!empty($item) && $item['totalcnf'] == 2) { ?>checked="true"<?php  } ?> /> 永不减库存</label>
	</div>
</div>
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">单次最多购买量</label>
	<div class="col-sm-6 col-xs-12">
		<div class="input-group">
			<input type="text" name="maxbuy" id="maxbuy" class="form-control" value="<?php  echo $item['maxbuy'];?>" />
			<span class="input-group-addon">件</span>
		</div>
	</div>
</div>
<!-- <div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">用户最多购买量</label>
	<div class="col-sm-6 col-xs-12">
		<div class="input-group">
			<input type="text" name="usermaxbuy" class="form-control" value="<?php  echo $item['usermaxbuy'];?>" />
			<span class="input-group-addon">件</span>
		</div>
	</div>
</div> -->
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">已出售数</label>
	<div class="col-sm-6 col-xs-12">
		<div class="input-group">
			<input type="text" name="sales" id="sales" class="form-control" value="<?php  echo $item['sales'];?>" />
			<span class="input-group-addon">件</span>
		</div>
	</div>
</div>
<!-- <div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">购买积分</label>
	<div class="col-sm-6 col-xs-12">
		<div class="input-group">
			<input type="text" name="credit" id="credit" class="form-control" value="<?php  echo $item['credit'];?>" />
			<span class="input-group-addon">分</span>
		</div>
		<p class="help-block">会员购买积分, 如果不填写，则默认为不奖励积分</p>
	</div>
</div> -->
<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">支付方式</label>
	<div class="col-sm-9 col-xs-12">
		<label for="pay_method1" class="radio-inline"><input type="radio" name="pay_method" value="1" id="pay_method1" <?php  if($item['pay_method'] == 1 || !$item['pay_method']) { ?>checked="true"<?php  } ?> /> 余额支付</label>
		&nbsp;&nbsp;&nbsp;
		<label for="pay_method2" class="radio-inline"><input type="radio" name="pay_method" value="0" id="pay_method2"  <?php  if($item['pay_method'] && $item['pay_method'] === 2) { ?>checked="true"<?php  } ?> /> 积分+余额支付</label>
		<span class="help-block"></span>
		<label for="pay_method3" class="radio-inline"><input type="radio" name="pay_method" value="0" id="pay_method3"  <?php  if($item['pay_method'] && $item['pay_method'] === 3) { ?>checked="true"<?php  } ?> /> 微信支付</label>
		<span class="help-block"></span>
	</div>
</div>

<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否可配送</label>
	<div class="col-sm-9 col-xs-12">
		<label for="dispatch1" class="radio-inline"><input type="radio" name="dispatch" value="1" id="dispatch1" <?php  if($item['dispatch'] == 1 || !$item['dispatch']) { ?>checked="true"<?php  } ?> /> 是</label>
		&nbsp;&nbsp;&nbsp;
		<label for="dispatch2" class="radio-inline"><input type="radio" name="dispatch" value="0" id="dispatch2"  <?php  if($item['dispatch'] && $item['dispatch'] === 0) { ?>checked="true"<?php  } ?> /> 否</label>
		<span class="help-block"></span>
	</div>
</div>

<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">商品详情</label>
	<div class="col-sm-9 col-xs-12">
		<?php  echo tpl_ueditor('content', $item['content']);?>
	</div>
</div>

<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否上架</label>
	<div class="col-sm-9 col-xs-12">
		<label for="isshow1" class="radio-inline"><input type="radio" name="status" value="1" id="isshow1" <?php  if($item['status'] == 1 || !$item['status']) { ?>checked="true"<?php  } ?> /> 是</label>
		&nbsp;&nbsp;&nbsp;
		<label for="isshow2" class="radio-inline"><input type="radio" name="status" value="0" id="isshow2"  <?php  if($item['status'] && $item['status'] === 0) { ?>checked="true"<?php  } ?> /> 否</label>
		<span class="help-block"></span>
	</div>
</div>
<script language="javascript">

	$(function () {
		var i = 0;
		$('#selectimage').click(function () {
			var editor = KindEditor.editor({
				allowFileManager: false,
				imageSizeLimit: '30MB',
				uploadJson: './index.php?act=attachment&do=upload'
			});
			editor.loadPlugin('multiimage', function () {
				editor.plugin.multiImageDialog({
					clickFn: function (list) {
						if (list && list.length > 0) {
							for (i in list) {
								if (list[i]) {
									html = '<li class="imgbox" style="list-type:none">' +
												'<a class="item_close" href="javascript:;" onclick="deletepic(this);" title="删除"></a>' +
												'<span class="item_box"> <img src="' + list[i]['url'] + '" style="height:80px"></span>' +
												'<input type="hidden" name="attachment-new[]" value="' + list[i]['filename'] + '" />' +
											'</li>';
									$('#fileList').append(html);
									i++;
								}
							}
							editor.hideDialog();
						} else {
							alert('请先选择要上传的图片！');
						}
					}
				});
			});
		});
	});

	function deletepic(obj) {
		if (confirm("确认要删除？")) {
			var $thisob = $(obj);
			var $liobj = $thisob.parent();
			var picurl = $liobj.children('input').val();
			$.post('<?php  echo $this->createMobileUrl('ajaxdelete',array())?>', {pic: picurl}, function (m) {
				if (m == '1') {
					$liobj.remove();
				} else {
					alert("删除失败");
				}
			}, "html");
		}
	}

</script>