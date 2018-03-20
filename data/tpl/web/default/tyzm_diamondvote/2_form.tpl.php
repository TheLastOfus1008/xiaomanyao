<?php defined('IN_IA') or exit('Access Denied');?><?php  if($setmealstatus==1) { ?>
<style>
.we7-form,.navbar-wxapp-bottom{display:none;}
.msg{text-align:center; font-size:28px; color:#f00;}
</style>

<div class="msg">
<?php  echo $setmealmsg;?>
</div>



<?php  } else { ?>
<?php  if(IMS_VERSION<1) { ?>
<link href="<?php echo MODULE_URL;?>/template/static/css/wq1.0.css" rel="stylesheet">
<?php  } ?>
<style>
.right-content{padding-bottom: 100px !important;}
.thumbadimg{border:1px;}
.nav_1,.nav_2,.nav_3,.nav_4{display:none}
.thumbnail>img{width:120px;height:120px;}
    .context-menu-list {
        color: #000;
    }
    .btn-warning .fa-remove {
        margin-right: 0;
    }
  .nav_8{display:none}
  .tanchuad img,.adimgbox img{background: url(../attachment/images/global/nopic.jpg);
    background-size: 100% 100%;}

}
.wq-panel-body{ padding: none !important; }
.main_form .we7-form input[type=radio], .main_form .we7-form input[type=checkbox] {
    display: inline-block;
    cursor: pointer;
}
.ys-btn button{ margin-bottom: 10px;}
.ad_box{ margin-left:20px;}
.ad_box ul,.temp_box ul{}
.ad_box ul li,.temp_box ul li{ float:left;margin-right:15px;}
.temp_box li{width:85px;}
.temp_box li img{border: 2px solid #efefef;}
.temp_box .ontemp img{border: 2px solid #f00}
.temp_box .onstyle{border: 2px solid #f00}
.temp_style p{float: left;width: 16px;height: 16px;background: #d6d5d5;margin-right: 5px;margin-top: 5px;}

</style>
<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="<?php echo MODULE_URL;?>/template/static/js/jquery.contextMenu.css" rel="stylesheet">
<link href="<?php echo MODULE_URL;?>/template/static/js/poster.css" rel="stylesheet">
<div class="main_form">
  <div class="we7-form">
  <div class="btn-group we7-btn-group we7-margin-bottom btn-group-justified navtab">
    <a role="presentation" data-tab="nav_0" class="btn active" href="javascript:;" >活动设置</a>
    <a role="presentation" data-tab="nav_1" href="javascript:;"  class="btn">规则设置</a>
    <a role="presentation" data-tab="nav_2" href="javascript:;"  class="btn">内容设置</a>
<!--     <a role="presentation" data-tab="nav_11" href="javascript:;"  class="btn">界面设置</a>
    <a role="presentation" data-tab="nav_10" href="javascript:;"  class="btn">报名设置</a>
    <a role="presentation" data-tab="nav_7" href="javascript:;"  class="btn">礼物设置</a>
    <a role="presentation" data-tab="nav_5" href="javascript:;"  class="btn">奖励设置</a>
    <a role="presentation" data-tab="nav_8" href="javascript:;"  class="btn">红包设置</a>
    <a role="presentation" data-tab="nav_9" href="javascript:;"  class="btn">海报设置</a>
    <a role="presentation" data-tab="nav_3" href="javascript:;"  class="btn">广告设置</a> -->
    <a role="presentation" data-tab="nav_4" href="javascript:;"  class="btn">分享设置</a> 
    </div>          
 </div>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="we7-form nav_tab nav_0">
     
      <div class="wq-panel-body">
         <div class="alert alert-success" role="alert">回复关键字投票，请在回复规则 “高级触发列表”-“正则表达式模式匹配” 新增 “ <span class="label label-success">^投票</SPAN> ” 为关键字，例如设置： <span class="label label-success">^TP</SPAN> ，
用户回复 <span class="label label-success">TP2</SPAN> 时，自动给编号 <span class="label label-success">2</SPAN> 用户投票。 <span class="label label-success">TP</SPAN> 可以修改位任意字符，中英文都可以，关键字不要带数字。</div>
      <div class="we7-form" id="we7form"></div>  
        <input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
        <div class="form-group">
          <label class="control-label col-sm-2">活动标题</label>
          <div class="form-controls col-sm-8">
            <input class="form-control" type="text" value="<?php  echo $reply['title'];?>" class="span2" name="title">
            <div class="help-block">活动的标题</div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">回复图文信息缩略图</label>
          <div class="form-controls col-sm-8">
            <?php  echo m('tpl')->tpl_form_field_image_tyzm('thumb',$reply['thumb'],'', $options);?>
            <div class="help-block">图文消息的缩略图</div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">活动简介</label>
          <div class="form-controls col-sm-8">
            <textarea class="form-control" name="description"><?php  echo $reply['description'];?></textarea>
            <div class="help-block">图文消息的简介</div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">活动时间</label>
          <div class="form-controls  col-sm-4">
            <?php  echo tpl_form_field_daterange('time', array('start'=>date('Y-m-d H:i:s',$reply['starttime']),'end'=>date('Y-m-d H:i:s',$reply['endtime'])), true)?>
            <div class="help-block">输入活动的起止时间</div>
          </div>
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">报名时间</label>
          <div class="form-controls  col-sm-4">
            <?php  echo tpl_form_field_daterange('aptime', array('start'=>date('Y-m-d H:i:s',$reply['apstarttime']),'end'=>date('Y-m-d H:i:s',$reply['apendtime'])), true)?>
            <div class="help-block">选择报名的起止时间，不需要提高前台报名时，只需要把报名时间设置在活动时间只外既可。</div>
          </div>
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">投票时间</label>
          <div class="form-controls  col-sm-4">
            <?php  echo tpl_form_field_daterange('votetime', array('start'=>date('Y-m-d H:i:s',$reply['votestarttime']),'end'=>date('Y-m-d H:i:s',$reply['voteendtime'])), true)?>
            <div class="help-block">选择投票的起止时间</div>
          </div>
        </div>

    <div class="form-group">
          <label class="control-label col-sm-2">模式</label>
          <div class="form-controls col-sm-8">
<!--              <label><input type="radio" value="0" name="diamondmodel" <?php  if($reply['diamondmodel'] == 0 ) { ?>checked<?php  } ?> >投票，礼物模式     </label> -->
             <label><input type="radio" value="1" name="diamondmodel" checked>普通投票模式 </label>
<!--              <label><input type="radio" value="2" name="diamondmodel" <?php  if($reply['diamondmodel'] == 2 ) { ?>checked<?php  } ?>>仅礼物模式</label>
       <div class="help-block">根据情况不同的投票需求，选择不同的模式。<br><?php  if($_W['account']['level']<3) { ?><span class="label label-danger">非认证公众号启动礼物模式时，不能设置微信支付，不然从公众号打开的投票都无法支付！</span><?php  } ?></div> -->
    
          </div>
    </div>
<!--     <div class="form-group">
      <label class="control-label col-sm-2">支付方式</label>
         <div class="form-controls col-sm-8">
             <label><input type="radio" value="0" name="defaultpay" <?php  if($reply['defaultpay'] == 0 ) { ?>checked<?php  } ?>> 默认，当前页面支付，只支持微信支付,体验佳。</label><br/>
             <label><input type="radio" value="1" name="defaultpay" <?php  if($reply['defaultpay'] == 1 ) { ?>checked<?php  } ?>> 系统收银台，可以支持其他支付</label>
         <div class="alert alert-danger" role="alert">
         <?php  if($_W['account']['level']==4) { ?>      
         支付配置方法：“功能选项”-“支付参数”-“微信支付”-（“微信支付” 或 “服务商支付”）。

         <br>

         <?php  } else { ?>
         非认证服务号需要借权支付，借权支付方法：“功能选项”-“支付参数”-“微信支付”-“借用支付”-选择需要借权的公众号. <br>
         请先配置好被借用的公众号支付，支付配置方法：“功能选项”-“支付参数”-“微信支付”-（“微信支付” 或 “服务商支付”）。
         <?php  } ?>
         默认支付，需要至微信公众号添加，支付目录：<span class="label label-success"><?php  echo $_SERVER['HTTP_HOST']."/app/"?></span>
         <br>
         <a href="http://doc.nowbeta.com/index.php?s=/1&page_id=5" target="_blank"   class="btn_add_join text-primary"><i class="fa fa-eye" title="查看教程"></i> 查看教程</a>
         </div>
         </div>
    </div>   -->
    <div class="form-group">
          <label class="control-label col-sm-2">活动状态</label>
          <div class="control-label col-sm-2">
             <label><input type="radio" value="1" name="rstatus" <?php  if($reply['rstatus'] == 1 ) { ?>checked<?php  } ?>>正常</label>
       <label><input type="radio" value="0" name="rstatus" <?php  if($reply['rstatus'] == 0 ) { ?>checked<?php  } ?>>禁用</label>
          </div>
    </div>
      </div>
  </div>
  <div class="we7-form nav_tab  nav_1">

      <div class="wq-panel-body">

        <div class="form-group">
          <label class="control-label col-sm-2">是否关注</label>
          <div class="form-controls col-sm-8">
             <label><input type="radio" value="0" name="isfollow" <?php  if($reply['isfollow'] == 0 ) { ?>checked<?php  } ?>>不需要关注     </label>
       <label><input type="radio" value="1" name="isfollow" <?php  if($reply['isfollow'] == 1 ) { ?>checked<?php  } ?>>投票需关注     </label>
             <label><input type="radio" value="2" name="isfollow" <?php  if($reply['isfollow'] == 2 ) { ?>checked<?php  } ?>>参加需关注     </label>
       <label><input type="radio" value="3" name="isfollow" <?php  if($reply['isfollow'] == 3 ) { ?>checked<?php  } ?>>参加，投票都需关注</label>
       <div class="help-block">非认证服务号，设置为不需要关注时，会影响消息提醒！</div>
          </div>

      
        </div>



    <div class="form-group">
          <label class="control-label col-sm-2">投票审核</label>
          <div class="form-controls col-sm-8">
             <label><input type="radio" value="0" name="ischecked" checked>人工审核    </label>
<!--              <label><input type="radio" value="1" name="ischecked" <?php  if($reply['ischecked'] == 1 ) { ?>checked<?php  } ?>>自动审核  </label> -->
       <div class="help-block">审核后，前台才显示！</div>
          </div>
        </div>
   <!--  <div class="form-group">
          <label class="control-label col-sm-2">最小人数</label>
      <div class="form-controls  col-sm-4">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['minnumpeople'];?>"name="minnumpeople">
              <span class="input-group-addon">人</span>
            </div>
      <div class="help-block">达到最小报名人数后，才能进行投票！<span class="label label-success">建议达到参赛人数后，把上面设置为0，提高性能！</span></div>
          </div>
        </div> -->
    <div class="form-group">
          <label class="control-label col-sm-2">每人每日每用户</label>

        <div class="form-controls  col-sm-4">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['everyoneuser'];?>"name="everyoneuser">
              <span class="input-group-addon">票</span>
            </div>
      <div class="help-block">每人每天最多给每个用户投多少票。</div>
          </div>
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">每日每人</label>
      <div class="form-controls  col-sm-4">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['dailyvote'];?>"name="dailyvote">
              <span class="input-group-addon">票</span>
            </div>
      <div class="help-block">每人每天最多投多少票，当天给所有人投票的总数。</div>
          </div>
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">每人最多</label>
      <div class="form-controls  col-sm-4">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['everyonevote'];?>"name="everyonevote">
              <span class="input-group-addon">票</span>
            </div>
      <div class="help-block">每人最多投票总数。</div>
          </div>
        </div>
<!--     <div class="form-group">
          <label class="control-label col-sm-2">每人最多送礼物</label>
      <div class="form-controls  col-sm-4">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['everyonediamond'];?>"name="everyonediamond">
              <span class="input-group-addon">元</span>
            </div>
      <div class="help-block">每人最多接受送礼物总价值，精确到分，例如：2.01元,0为不限！</div>
          </div>
        </div>

    <div class="form-group">
          <label class="control-label col-sm-2">投票消息提醒</label>
          <div class="form-controls col-sm-8">
             <label><input type="radio" value="0" name="isvotemsg" <?php  if($reply['isvotemsg'] == 0 ) { ?>checked<?php  } ?>>是    </label>
             <label><input type="radio" value="1" name="isvotemsg" <?php  if($reply['isvotemsg'] == 1 ) { ?>checked<?php  } ?>>否    </label>
       <div class="help-block">选择“否”时，不给参加比赛用户发送被投票客服信息。（需要开通客服信息接口权限）</div>
          </div>
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">匿名送礼</label>
          <div class="form-controls col-sm-8">
             <label><input type="radio" value="0" name="isdiamondnone" <?php  if($reply['isdiamondnone'] == 0 ) { ?>checked<?php  } ?>>否    </label>
             <label><input type="radio" value="1" name="isdiamondnone" <?php  if($reply['isdiamondnone'] == 1 ) { ?>checked<?php  } ?>>是    </label>
       <div class="help-block">选择“是”时，送礼物不显示个人信息！</div>
          </div>
        </div>  -->
    <div class="form-group">
          <label class="control-label col-sm-2">投自己投票</label>
          <div class="form-controls col-sm-8">
             <label><input type="radio" value="0" name="isoneself" <?php  if($reply['isoneself'] == 0 ) { ?>checked<?php  } ?>>否    </label>
             <label><input type="radio" value="1" name="isoneself" <?php  if($reply['isoneself'] == 1 ) { ?>checked<?php  } ?>>是    </label>
       <div class="help-block">选择“是”时，能给自己投票，否则不能给自己投票！</div>
          </div>
        </div> 
<!--         <div class="form-group">
          <label class="control-label col-sm-2">自动锁定</label>
          <div class="control-label col-sm-8">
            <div class="input-group">
       <span class="input-group-addon">每</span>
              <input class="form-control" type="text" value="<?php  echo $reply['perminute'];?>" class="span2" name="perminute">
              <span class="input-group-addon">分钟超过</span>
              <input class="form-control" type="text" value="<?php  echo $reply['perminutevote'];?>" class="span2" name="perminutevote">
              <span class="input-group-addon">票，锁定</span>
              <input class="form-control" type="text" value="<?php  echo $reply['lockminutes'];?>" class="span2" name="lockminutes">
              <span class="input-group-addon">分钟</span>
            </div>
      <div class="help-block">其中一个为0不锁定，修改锁定时间时，只生效后面的锁定，前面锁定的时间保持上一次设置的锁定时间！</div>
          </div>
        </div>
    
     <div class="form-group">
          <label class="control-label col-sm-2">投票验证码</label>
          <div class="form-controls col-sm-8">
             <label><input type="radio" value="0" name="verifycode" <?php  if($reply['verifycode'] == 0 ) { ?>checked<?php  } ?>>关闭    </label>
             <label><input type="radio" value="1" name="verifycode" <?php  if($reply['verifycode'] == 1 ) { ?>checked<?php  } ?>>开启  </label>
       <div class="help-block">开启投票验证码时，投票需要填写验证码再提交，对机器刷票有一定效果。</div>
          </div>
        </div>
    
    
    <div class="form-group">
          <label class="control-label col-sm-2">地区限制</label>
          <div class="control-label col-sm-8">


            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['area'];?>" class="span2" name="area">
              <span class="input-group-addon">定位方式：</span>
              <div class="input-group-btn" style="width:130px">
                  <select class="form-control" name="locationtype">
                          <option value="0"<?php  if(!$reply['locationtype']) { ?> selected="selected"<?php  } ?>>微信GPS</option>
                          <option value="1"<?php  if($reply['locationtype']==1) { ?> selected="selected"<?php  } ?>>IP地址</option>
                  </select>
              </div>
            </div>
            <div class="help-block">请填写开放活动地区或城市，例如：北京,上海,湖南,海南,海口等等。
      可以支持，省，市县，区；
      为空则不限制地区。多个地区用“,”分割。
      </div>
          </div>
        </div> -->

    </div>
</div>
  
  
   <div class="we7-form nav_tab   nav_11">
      <div class="wq-panel-body">
    <div class="form-group">
            <label class="control-label col-sm-2">首页选手显示顺序</label>
            <div class="form-controls col-sm-4">
                <select name="indexorder" class="form-control">
          <option  value="11" <?php  if($reply['indexorder'] == 11 || $reply['indexorder'] =='') { ?>selected<?php  } ?> >  最新倒叙</option>
          <option  value="12" <?php  if($reply['indexorder'] == 12) { ?>selected<?php  } ?> >  最新顺序</option>
          <option  value="21" <?php  if($reply['indexorder'] == 21) { ?>selected<?php  } ?> >  编号倒叙</option>
          <option  value="22" <?php  if($reply['indexorder'] == 22) { ?>selected<?php  } ?> >  编号顺序</option>       
          <option  value="31" <?php  if($reply['indexorder'] == 31) { ?>selected<?php  } ?> >  票数倒叙</option>
          <option  value="32" <?php  if($reply['indexorder'] == 32) { ?>selected<?php  } ?> >  票数顺序</option> 
          <option  value="41" <?php  if($reply['indexorder'] == 41) { ?>selected<?php  } ?> >  礼物倒叙</option>
          <option  value="42" <?php  if($reply['indexorder'] == 42) { ?>selected<?php  } ?> >  礼物顺序</option>   
          <option  value="51" <?php  if($reply['indexorder'] == 51) { ?>selected<?php  } ?> >  最新投票倒叙</option>
          <option  value="52" <?php  if($reply['indexorder'] == 52) { ?>selected<?php  } ?> >  最新投票顺序</option>
        </select>
            </div>
        </div>
    <div class="form-group">
            <label class="control-label col-sm-2">首页信息显示顺序</label>
            <div class="control-controls col-sm-10">
          <label class="radio-inline">
          <input type="radio" name="infoorder" value="0" <?php  if($reply['infoorder'] == 0 ) { ?>checked<?php  } ?> >
          1、选手列表 >> 活动介绍      
                </label>
        <label class="radio-inline">
          <input type="radio" name="infoorder" value="1" <?php  if($reply['infoorder'] == 1) { ?>checked<?php  } ?> >
                  2、活动介绍 >> 选手列表   
                </label> </div>
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">虚拟浏览量</label>
      <div class="form-controls  col-sm-4">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['virtualpv'];?>"name="virtualpv">
              <span class="input-group-addon">流量</span>
            </div>
      <div class="help-block">首页显示== 真实浏览量+虚拟浏览量</div>
          </div>
        </div>


    <div class="form-group">
          <label class="control-label col-sm-2">排行榜数量</label>
      <div class="form-controls  col-sm-4">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['rankingnum'];?>"name="rankingnum">
              <span class="input-group-addon">票</span>
            </div>
      <div class="help-block">设置最大显示排行榜数量</div>
          </div>
        </div>
      <div class="form-group">
      <label class="control-label col-sm-2">背景音乐</label>
      <div class="form-controls  col-sm-8"> <?php  echo tpl_form_field_audio('indexsound', $reply['indexsound'])?>
        <div class="help-block">请使用软件截断音乐，音乐长度在10秒500k以内；留空时，不显示。</div>
      </div>
    </div>
    <div class="form-group">
          <label class="control-label col-sm-2">礼物详情</label>
          <div class="form-controls col-sm-4">
            <select name="isshowgift" class="form-control">
          <option value="0"  <?php  if($reply['isshowgift'] == 0 ) { ?>selected<?php  } ?>> 全部显示   </option>
          <option value="1"  <?php  if($reply['isshowgift'] == 1 ) { ?>selected<?php  } ?>> 不显示列表，显示排行榜   </option>
          <option value="2"  <?php  if($reply['isshowgift'] == 2 ) { ?>selected<?php  } ?>> 不显示排行榜，显示列表、点数   </option>
          <option value="4"  <?php  if($reply['isshowgift'] == 4 ) { ?>selected<?php  } ?>> 仅显示礼物列表   </option>
          <option value="3"  <?php  if($reply['isshowgift'] == 3 ) { ?>selected<?php  } ?>> 都不显示礼物信息  </option>
        </select>
       <div class="help-block">列表：用户主页礼物列表，排行榜：礼物排行榜</div>
          </div>
    </div>    
        <div class="form-group">
          <label class="control-label col-sm-2">未关注引导提示</label>
          <div class="form-controls col-sm-8">
            <input class="form-control" type="text" value="<?php  echo $reply['followguide'];?>" class="span2" name="followguide">
      <div class="help-block">设置关注投票或参加时，未关注用户可见。</div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">首页公告</label>
          <div class="form-controls col-sm-8">
            <input class="form-control" type="text" value="<?php  echo $reply['notice'];?>" class="span2" name="notice">
          <div class="help-block">一句话公告，仅在首页顶部显示，留空不显示！</div>
          </div>
        </div>
    <!-- <div class="form-group">
      
      <label class="col-sm-2 control-label" style="text-align:left;">风格设置</label>
      <div class="form-controls col-sm-8">
        <div class="temp_box">
            <input  type="hidden" value="<?php  echo $reply['style']['template'];?>"  name="template" id="template">
          <input  type="hidden" value="<?php  echo $reply['style']['setstyle'];?>"  name="setstyle" id="setstyle">
          <ul>
          <?php  if(is_array($template)) { foreach($template as $index => $temp) { ?>
             <li data-temp="<?php  echo $index;?>" class="<?php  if($reply['style']['template'] == $index ) { ?>ontemp<?php  } ?>">
               <img src="<?php echo MODULE_URL;?>/template/mobile/<?php  echo $temp['icon'];?>" width="80"/>
               <div class="temp_style">
                  <?php  if(is_array($temp['style'])) { foreach($temp['style'] as $ind => $style) { ?>
                 <p class="<?php  echo $ind;?> <?php  if($reply['style']['setstyle'] == $style['css'] ) { ?>onstyle<?php  } ?> setstyle" style="background:<?php  echo $style['color'];?>;" data-sty="<?php  echo $style['css'];?>"></p>
                <?php  } } ?>
              </div>
            </li>
          <?php  } } ?>   
          </ul>
        </div>
      </div> -->
    </div>
<!-- <div class="form-group">
          <label class="control-label col-sm-2">首页公告</label>
          <div class="form-controls col-sm-8">

<table class="table">
          <thead>
          <tr>
            <th width="150">图标（80*80）</th>
            <th width="190">菜单名称（1-4个字）</th>
            <th>链接</th>
            <th width="80" class="text-right">是否显示</th>
          </tr>
          </thead>
          <tbody> 
             <tr>
              <td class="icon_wrap">
                  <div class="input-group navlist">
                    <img src="<?php  echo tomedia($fnav['navicon']);?>" width="32" height="32"  alt="点击上传图标">
                    <input type="hidden" value="<?php  echo $fnav[1]['navicon'];?>" name="navicon[1]">点击上传图标
                  </div>
              </td>
              <td>
                <input type="text" class="form-control" value="<?php  echo $fnav['navtitle'];?>" name="navtitle[1]" value="我的">
              </td>
              <td>
                <input type="text" class="form-control" value="<?php  echo $fnav['navurl'];?>" name="navurl[1]" value="">
              </td>
              <td class="text-right">
                <input type="checkbox" name="navisshow[1]" checked="">
              </td>
            </tr>
           </tbody>
        </table>
<script type="text/javascript">
  

  $('.navlist img').click(function(){
        thimg=$(this);
        util.image('',function(data){
          thimg.attr("src",data['url']);
          thimg.next().val(data['attachment']);
        },'',{'width'  :80,'height' : 80,'thumb': true});
    });
</script>

     </div>
        </div>    

-->



      </div> 
  </div>
  <div class="we7-form nav_tab  nav_2">

      <div class="wq-panel-body">
      <div class="form-group">
            <label class="control-label col-sm-2"><span style='color:red'>*</span>头部图片</label>
            <div class="form-controls col-sm-8 col-xs-12">
                <?php  echo tpl_form_field_image('topimg',$reply['topimg']);?>
        <div class="help-block">投票主题图</div>
            </div>
        </div>

     <div class="form-group">
      <label class="col-xs-12 col-sm-2 col-md-2  control-label">活动规则</label>
      <div class="control-label col-sm-8">
 <?php  echo tpl_ueditor('eventrule', $reply['eventrule']);?>          
        <div class="help-block">活动规则详细说明</div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-12 col-sm-2 col-md-2  control-label">奖品介绍</label>
      <div class="control-label col-sm-8">
                <?php  echo tpl_ueditor('prizemsg', $reply['prizemsg']);?>       
        <div class="help-block">活动详细介绍，可上传图片</div>
      </div>
    </div>


      </div>

  </div>
    <div class="we7-form nav_tab   nav_7">
      <div class="wq-panel-body">
        <div class="form-group">
          <label class="control-label col-sm-2">比例单位</label>
          <div class="col-sm-8">
            <div class="input-group">
              <span class="input-group-addon">每1元礼物价值，等于</span>
              <input class="form-control" type="text" value="<?php  echo $reply['giftscale'];?>" class="span2" name="giftscale">
        <span class="input-group-addon">（礼物比例）</span>
              <input class="form-control" type="text" value="<?php  echo $reply['giftunit'];?>" class="span2" name="giftunit">
                      <span class="input-group-addon">（礼物单位）礼物</span>
            </div>
      <div class="help-block">例如：每1元礼物等价于1点礼物。填写：1，点；</div>
          </div>
        </div>
    <div class="row">
    
    
    <table class="table we7-table table-hover" id="js-table-2">
    <tr><th colspan="5" class=""><strong>礼物设置</strong> 
            
          <button id="btn_add_gift" type="button" class="btn btn-xs btn-warning pull-right">
          <span class="glyphicon glyphicon-plus"></span> 添加礼物
        </button></th>
  </tr>
  <tr>
    <th class="text-left">礼物名称</th>
    <th>礼物图标</th>
    <th>礼物价格</th>
    <th>抵票数</th>
    <th class="text-right" width="100">操作</th>
  </tr>
  <?php  if(is_array($giftdata)) { foreach($giftdata as $item) { ?>
  <tr>
    <td class="text-left" ><input type="text" placeholder="输入名称" value="<?php  echo $item['gifttitle'];?>" class="form-control" name="gifttitle[]"></td>
    <td><div class="adimgbox"><a href="javascript:;" class="thumbadimg"><img src="<?php  echo tomedia($item['gifticon']);?>"  height="30"><input type="hidden" value="<?php  echo $item['gifticon'];?>" name="gifticon[]"></a></div></td>
    <td class="text-left" ><div class="input-group">
          <input type="text" placeholder="输入支付价格" value="<?php  echo $item['giftprice'];?>" class="form-control" name="giftprice[]">
      <span class="input-group-addon">元</span>
        </div></td>
    <td class="text-left" >
    <div class="input-group">
          <input type="text" placeholder="输入礼物奖励的票数" value="<?php  echo $item['giftvote'];?>" class="form-control" name="giftvote[]">
        </div>
    </td>
    <td><button type="button" class="btn btn-danger btn_del_ad btn-xs">删除</button></td>
  </tr>
  <?php  } } ?>
</table>

</div>
    
        
      </div>

  </div>
  <div class="we7-form nav_tab   nav_5">
  <div class="wq-panel-body">
        <div class="form-group">
          <label class="control-label col-sm-2">投票赠送</label>
          <div class="form-controls col-sm-8" >
            <div class="input-group">
              <span class="input-group-addon">
              <?php  if(is_array($creditnames['creditnames'])) { foreach($creditnames['creditnames'] as $scredit => $creditname) { ?>
              <label><input type="radio" value="<?php  echo $scredit;?>" name="votegive_type" <?php  if($reply['votegive_type'] == $scredit ) { ?>checked<?php  } ?>><?php  echo $creditname['title'];?></label>
              <?php  } } ?>
              </span>
              <input class="form-control" type="text" value="<?php  echo $reply['votegive_num'];?>" class="span2" name="votegive_num">
              
            </div>
      <div class="help-block">每次投票赠送，请填写赠送数量。</div>
          </div>
        </div>
      <div class="form-group">
          <label class="control-label col-sm-2">报名赠送</label>
          <div class="form-controls col-sm-8" >
            <div class="input-group">
              <span class="input-group-addon">
              <?php  if(is_array($creditnames['creditnames'])) { foreach($creditnames['creditnames'] as $scredit => $creditname) { ?>
              <label><input type="radio" value="<?php  echo $scredit;?>" name="joingive_type" <?php  if($reply['joingive_type'] == $scredit ) { ?>checked<?php  } ?>><?php  echo $creditname['title'];?></label>
              <?php  } } ?>
              </span>
              <input class="form-control" type="text" value="<?php  echo $reply['joingive_num'];?>" class="span2" name="joingive_num">
             
            </div>
       <div class="help-block">报名参加赠送，请填写赠送数量。</div>
          </div>
        </div>
      <div class="form-group">
          <label class="control-label col-sm-2">送礼物赠送</label>
          <div class="form-controls col-sm-8" >
            <div class="input-group">
              <span class="input-group-addon">
              <?php  if(is_array($creditnames['creditnames'])) { foreach($creditnames['creditnames'] as $scredit => $creditname) { ?>
              <label><input type="radio" value="<?php  echo $scredit;?>" name="giftgive_type" <?php  if($reply['giftgive_type'] == $scredit ) { ?>checked<?php  } ?>><?php  echo $creditname['title'];?></label>
              <?php  } } ?>
              </span>
              <input class="form-control" type="text" value="<?php  echo $reply['giftgive_num'];?>" class="span2" name="giftgive_num">
             
            </div>
       <div class="help-block">送礼物，赠送对应的积分或余额，赠送目标用户为送礼物的人；最终送积分或余额的计算方式为：
       </br>
       <span class="label label-danger" >积分数量=填写数量*礼物价值（元）</span>；例如：填写10时，用户送0.6元的礼物，最终赠送积分等于 10*0.6=6积分；余额算法一样。
       
       </div>
          </div>
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">送礼物奖励</label>
          <div class="form-controls col-sm-8" >
            <div class="input-group">
              <span class="input-group-addon">
              <?php  if(is_array($creditnames['creditnames'])) { foreach($creditnames['creditnames'] as $scredit => $creditname) { ?>
              <label><input type="radio" value="<?php  echo $scredit;?>" name="awardgive_type" <?php  if($reply['awardgive_type'] == $scredit ) { ?>checked<?php  } ?>><?php  echo $creditname['title'];?></label>
              <?php  } } ?>
              </span>
              <input class="form-control" type="text" value="<?php  echo $reply['awardgive_num'];?>" class="span2" name="awardgive_num">
             
            </div>
       <div class="help-block">收到好友送的礼物时，赠送对应的积分或余额，赠送目标用户为收到礼物的人；
       <br>
       最终送积分或余额的计算方式为：
       
       <span class="label label-danger" >积分数量=填写数量*礼物价值（元）</span>；例如：填写10时，用户送0.6元的礼物，最终赠送积分等于 10*0.6=6积分；余额算法一样。</div>
          </div>
        </div>
 </div>
  </div>
  <div class="we7-form nav_tab  nav_3">
      <div class="wq-panel-body">
        <div class="wq-panel-body">
<table class="table we7-table table-hover" id="js-user-group-display">
    <tr><th colspan="5" class=""><strong>投票弹出广告</strong></th></tr>
  <tr>
    <th class="text-left">广告文字</th>
    <th>广告图片</th>
    <th>广告URL</th>
    <th>弹出送礼页面</th>
    <th class="text-right" width="50">操作</th>
  </tr>
  <tr>
    <td class="text-left" ><input type="text" value="<?php  echo $reply['voteadtext'];?>" placeholder="请输入广告文字" class="form-control" name="voteadtext"></td>
    <td><div class="tanchuad"><a href="javascript:;" class="thumbadimg"><img src="<?php  if($reply['voteadimg']=="") { ?><?php  echo tomedia('images/global/nopic.jpg');?><?php  } else { ?><?php  echo tomedia($reply['voteadimg']);?><?php  } ?>" height="30" ><input type="hidden" value="<?php  echo $reply['voteadimg'];?>" name="voteadimg"></a></div></td>
    <td class="text-left" ><input type="text" value="<?php  echo $reply['voteadurl'];?>" placeholder="请输入广告url，带http://" class="form-control" id="voteadurl" name="voteadurl"></td>
    <td class="text-center" ><input type="checkbox" name="isgiftad"  value="1" <?php  if($reply['isgiftad']) { ?> checked <?php  } ?>  />点击开启</td>
    <td><button type="button" class="btn btn-xs btn-danger btn_clear_ad">清除广告</button>
    </td>
  </tr>
</table>

<table class="table we7-table table-hover" id="js-table-3">
    <tr><th colspan="4" class=""><strong>幻灯片广告</strong> 
             <span style="margin-left:30px;">
           <label><input type="radio" value="0" name="isindexslide" <?php  if($reply['isindexslide'] == 0 ) { ?>checked<?php  } ?>>  关闭首页幻灯片    </label>
           <label><input type="radio" value="1" name="isindexslide" <?php  if($reply['isindexslide'] == 1 ) { ?>checked<?php  } ?>>  显示首页幻灯片    </label>
           </span>
          <button id="btn_add_adtr" type="button" class="btn btn-xs btn-warning pull-right">
          <span class="glyphicon glyphicon-plus"></span> 添加广告幻灯片
        </button></th></tr>
  <tr>
    <th class="text-left">广告名称</th>
    <th>广告图片</th>
    <th>广告URL</th>
    <th class="text-right" width="100">操作</th>
  </tr>
  <?php  if(is_array($addata)) { foreach($addata as $item) { ?>
  <tr>
    <td class="text-left" ><input type="text" placeholder="广告名称" value="<?php  echo $item['adtitle'];?>" class="form-control" name="adtitle[]"></td>
    <td><div class="adimgbox"><a href="javascript:;" class="thumbadimg"><img src="<?php  echo tomedia($item['adimg']);?>"  height="30"><input type="hidden" value="<?php  echo $item['adimg'];?>" name="adimg[]"></a></div></td>
    <td class="text-left" ><input type="text" value="<?php  echo $item['adurl'];?>" placeholder="请输入广告url，带http://" class="form-control" name="adurl[]"></td>
    
    <td><button type="button" class="btn btn-danger btn_del_ad btn-xs">删除</button></td>
  </tr>
  <?php  } } ?>
</table>
  <div class="panel we7-panel account-stat">

    <div class="panel-heading">变现广告位控制</div>
    <div class="panel-body we7-padding-vertical we7-padding-vertical ad_box">
        <ul>
       <li><img src="<?php echo MODULE_URL;?>/template/static/images/index_ad.png" width="165"/><br/>
       <div class="control-label">
             <label style="width: 50%;"  ><input type="radio" value="1"name="index_ad" <?php  if($reply['index_ad'] == 1 ) { ?>checked<?php  } ?>> 关闭</label>
       <label><input type="radio" value="0" name="index_ad" <?php  if($reply['index_ad'] == 0 ) { ?>checked<?php  } ?>> 显示</label>
          </div></li>
       <li><img src="<?php echo MODULE_URL;?>/template/static/images/prize_ad.png" width="165"/><br/>
       <div class="control-label">
             <label style="width: 50%;"  ><input type="radio" value="1"name="prize_ad" <?php  if($reply['prize_ad'] == 1 ) { ?>checked<?php  } ?>> 关闭</label>
       <label><input type="radio" value="0" name="prize_ad" <?php  if($reply['prize_ad'] == 0 ) { ?>checked<?php  } ?>> 显示</label>
          </div>
</li>
       <li><img src="<?php echo MODULE_URL;?>/template/static/images/rank_ad.png" width="165"/><br/>
       <div class="control-label">
             <label style="width: 50%;"  ><input type="radio" value="1" name="rank_ad" <?php  if($reply['rank_ad'] == 1 ) { ?>checked<?php  } ?>> 关闭</label>
       <label><input type="radio" value="0" name="rank_ad" <?php  if($reply['rank_ad'] == 0 ) { ?>checked<?php  } ?>> 显示</label>
          </div></li>
       <li><img src="<?php echo MODULE_URL;?>/template/static/images/view_ad.png" width="165"/><br/>
       <div class="control-label">
             <label style="width: 50%;"  ><input type="radio" value="1" name="view_ad" <?php  if($reply['view_ad'] == 1 ) { ?>checked<?php  } ?>> 关闭</label>
       <label><input type="radio" value="0" name="view_ad" <?php  if($reply['view_ad'] == 0 ) { ?>checked<?php  } ?>> 显示</label>
          </div></li>
       <li><img src="<?php echo MODULE_URL;?>/template/static/images/gift_ad.png" width="165"/><br/>
       <div class="control-label">
             <label style="width: 50%;"  ><input type="radio" value="1" name="gift_ad" <?php  if($reply['gift_ad'] == 1 ) { ?>checked<?php  } ?>> 关闭</label>
       <label><input type="radio" value="0" name="gift_ad" <?php  if($reply['gift_ad'] == 0 ) { ?>checked<?php  } ?>> 显示</label>
          </div></li>
      <li style="clear:both;">
      </li>
    </ul>
    
<div class="help-block">
<p>❀</p>
<h4><span class="label label-success">获得收入步骤：</span></h4>
<p>1，登陆带来平台，注册成为渠道代理，
<span class="label label-primary"><a href="http://xs.huotun.com/module/agent/">点击注册</a>  </p></span>
<p>2，获得代理资格，复制“渠道key” </p>
<p>3，进入模块设置》》<span class="label label-primary"><a href="./index.php?c=profile&a=module&do=setting&m=tyzm_diamondvote&ty=1"/>点击设置</a></span>，输入“变现渠道key”保存，完成模块和渠道绑定。 </p>
<p>4，再次进入渠道中心，完善财务信息，记得提现哦。 </p>

<span class="label label-info">大把的流量，咱们不要浪费了，多一种变现模式，让运营更快乐！</span>
</div>
 

  </div></div>  
  </div>

      </div>

  </div> </div>
<div class="alert alert-danger nav_tab  nav_8" role="alert">
    红包只发给投票的用户，每次用户投票后，可有一次抽奖机会！只支持认证服务号，或借权认证服务号。
</div>
 <div class="we7-form nav_tab  nav_8">
      <div class="wq-panel-body">
          
    <div class="form-group">
          <label class="control-label col-sm-2">红包抽奖</label>
          <div class="form-controls col-sm-8">
             <label><input type="radio" value="0" name="isredpack" <?php  if($reply['isredpack'] == 0 ) { ?>checked<?php  } ?>>否    </label>
             <label><input type="radio" value="1" name="isredpack" <?php  if($reply['isredpack'] == 1 ) { ?>checked<?php  } ?>>是    </label>
       <div class="help-block">开启红包抽奖时，投票的用户，会弹出抽奖页面，概率和发送数量，可以在下面设置。只对投票用户有效！</div>
          </div>
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">弹出概率</label>
          <div class="control-label col-sm-2">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['lotterychance'];?>" class="span2" name="lotterychance">
              <span class="input-group-addon">%</span>
            </div>
      <span class="help-block">用户投票时，弹出抽奖界面概率。</span>
          </div> 
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">红包总数</label>
          <div class="control-label col-sm-2">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['redpackettotal'];?>" class="span2" name="redpackettotal">
              <span class="input-group-addon">个</span>
            </div>
      <span class="help-block">活动总共发红包的总数</span>
          </div> 
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">红包概率</label>
          <div class="control-label col-sm-2">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['probability'];?>" class="span2" name="probability">
              <span class="input-group-addon">%</span>
            </div>
      <span class="help-block">用户抽奖获得红包的概率，可以填写0.01 或2等数字。</span>
          </div> 
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">每日红包个数</label>
          <div class="control-label col-sm-2">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['redpacketnum'];?>" class="span2" name="redpacketnum">
              <span class="input-group-addon">个</span>
            </div>
      <span class="help-block">每天领取红包个数</span>
          </div> 
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">每人最多获得红包数</label>
          <div class="control-label col-sm-2">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['everyonenum'];?>" class="span2" name="everyonenum">
              <span class="input-group-addon">个</span>
            </div>
      <span class="help-block">每天领取红包个数</span>
          </div> 
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">IP限制</label>
          <div class="control-label col-sm-2">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['ipplace'];?>" class="span2" name="ipplace">
              <span class="input-group-addon">个</span>
            </div>
      <span class="help-block">每天同一个ip，只能发X个红包</span>
          </div>
        </div>
    <div class="form-group">
          <label class="control-label col-sm-2">获得红包地区</label>
          <div class="control-label col-sm-8">
            <input class="form-control" type="text" value="<?php  echo $reply['redpackarea'];?>" class="span2" name="redpackarea">

            <div class="help-block">请填写获得红包地区或城市，例如：北京市,上海市,湖南省,海南省,海口市等等。
      可以支持，省，市县，区；
      为空则不限制地区。多个地区用“,”分割。
      
      <?php  if($this->module['config']['tencent_lbs_api_key']=="") { ?>
      <div class="alert alert-danger" role="alert">设置接口（腾讯地图）API_KEY才能正常使用地区限制，<a href="<?php  echo url('profile/module/setting', array('m' => 'tyzm_tuanyuan'));?>" target="_blank" >点击设置</a>。</div>
      <?php  } ?>
      
      </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">随机红包</label>
          <div class="form-controls  col-sm-4">
            <div class="input-group">
              <input class="form-control" type="text" value="<?php  echo $reply['limitstart'];?>" class="span2" name="limitstart">
              <span class="input-group-addon">-</span>
              <input class="form-control" type="text" value="<?php  echo $reply['limitend'];?>" class="span2" name="limitend">
              <span class="input-group-addon">元</span>
            </div>
          </div>
      <span class="help-block">填写发红包的随机数额，大于1，小于200，可以填写1.01。</span>
        </div>
      </div>
    


  <div class="panel we7-panel">
          <div class="panel-heading">
          微信红包显示文字设置     <span class="pull-right color-gray"></span>      
          </div>
          <div class="panel-body we7-padding">
            <div class="form-group">
          <label class="control-label col-sm-2"><span class="text-danger">*</span> 活动名称</label>
          <div class="col-sm-8 col-xs-12">
            <input type="text" class="form-control" name="act_name" value="<?php  echo $reply['act_name'];?>"/>
            <span class="help-block"></span>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2"><span class="text-danger">*</span>商户名称</label>
          <div class="col-sm-8 col-xs-12">
            <input type="text" class="form-control" name="send_name" value="<?php  echo $reply['send_name'];?>"/>
            <span class="help-block">红包发送者名称</span>
          </div>
        </div> 

        <div class="form-group">
          <label class="control-label col-sm-2"><span class="text-danger">*</span>红包祝福语</label>
          <div class="col-sm-8 col-xs-12">
            <input type="text" class="form-control" name="wishing" value="<?php  echo $reply['wishing'];?>"/>
            <span class="help-block">例如：感谢您参加猜灯谜活动，祝您元宵节快乐！</span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2"><span class="text-danger"></span><span class="text-danger">*</span>备注</label>
          <div class="col-sm-8 col-xs-12">
            <textarea name="remark" class="form-control js-a" cols="30" rows="3"><?php  echo $reply['remark'];?></textarea>
            <span class="help-block">备注信息：猜越多得越多，快来抢！</span>
          </div>
        </div>
        </div>
  </div>
</div>




<script  src="<?php echo MODULE_URL;?>/template/static/js/jquery.form.js"></script>
<script  src="<?php echo MODULE_URL;?>/template/static/js/designer.js" type="text/javascript"></script>
<script  src="<?php echo MODULE_URL;?>/template/static/js/jquery.contextMenu.js" type="text/javascript"></script>
<div class="we7-form  nav_tab   nav_9">
            <div class="wq-panel-body">
      <?php  if($nofont==1) { ?>
          <div class="alert alert-danger" role="alert">没有字体文件，请点击 <a href="http://weili.nowbeta.com/addons/tyzm_diamondvote/lib/font/font.ttf" target="_blank"  class="btn-danger" value="check">下载字体</a> 下载字体文件，上传至以下目录，字体文件名必须为 font.ttf，不可修改。<br/><br/>
        <span class="label label-success">/addons/tyzm_diamondvote/lib/font/font.ttf</span>，没有目录就新建。
        </div>
      <?php  } ?>
        <div class="form-group">
          <label class="control-label col-sm-2">海报功能</label>
          <div class="form-controls col-sm-8">
           <label><input type="radio" value="0" name="isposter" <?php  if($reply['isposter'] == 0 ) { ?>checked<?php  } ?>>关闭    </label>
           <label><input type="radio" value="1" name="isposter" <?php  if($reply['isposter'] == 1 ) { ?>checked<?php  } ?>>开启    </label>
           <div class="help-block"></div>
          </div>
        </div>
                <div class="form-group">
          <label class="control-label col-sm-2"><span class="text-danger">*</span>海报提示</label>
          <div class="form-controls col-sm-8 col-xs-12">
            <input type="text" class="form-control" name="bill_hint" value="<?php  echo $reply['bill_hint'];?>"/>
          </div>
        </div>
                <div class="form-group" style="min-height:600px;">
                    <div class="form-controls col-sm-12 ">
                        <table style='width:100%;'>
                            <tr>
                                <td id="bgtd" style='padding-right: 10px;' valign='top'>
                                    <div id='tiger_poster'>
                                        <?php  if(!empty($reply['bill_bg'])) { ?>
                                          <img src="<?php  echo toimage($reply['bill_bg'])?>" class='bg'/>
                                        <?php  } ?>
                                        <?php  if(!empty($bill_data)) { ?>
                                        <?php  if(is_array($bill_data)) { foreach($bill_data as $index => $item) { ?>
                                        <div class="drag" type="<?php  echo $item['type'];?>" index="<?php  echo $index+1?>" style="zindex:<?php  echo $index+1?>;left:<?php  echo $item['left'];?>;top:<?php  echo $item['top'];?>;
                                               width:<?php  echo $item['width'];?>;height:<?php  echo $item['height'];?>" size="<?php  echo $item['size'];?>" color="<?php  echo $item['color'];?>" >
                                            <?php  if($item['type']=='img' || $item['type']=='thumb') { ?>
                                            <img src="<?php echo MODULE_URL;?>/template/static/images/default.jpg" />
                                            <?php  } else if($item['type']=='avatar') { ?>
                                            <img src="<?php echo MODULE_URL;?>/template/static/images/avatar.jpg" />
                                            <?php  } else if($item['type']=='qr') { ?>
                                            <img src="<?php echo MODULE_URL;?>/template/static/images/qr.png" />
                                            <?php  } else if($item['type']=='name') { ?>
                                            <div class=text style="font-size:<?php  echo $item['size'];?>;color:<?php  echo $item['color'];?>" >昵称</div>
                                            <?php  } else if($item['type']=='number') { ?>
                                            <div class=text style="font-size:<?php  echo $item['size'];?>;color:<?php  echo $item['color'];?>" >编号</div>
                                            <?php  } ?>
                                            <div class="dRightDown"> </div><div class="dLeftDown"> </div><div class="dRightUp"> </div><div class="dLeftUp"> </div><div class="dRight"> </div><div class="dLeft"> </div><div class="rUp"> </div><div class="rDown"></div>
                                        </div>
                                        <?php  } } ?>
                                        <?php  } ?>
                                    </div>
                                </td>
                
                
                                <td valign='top'>
                                    <div class='we7-form'>
                                        <div class='wq-panel-body'>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2">海报元素</label>
                                                <div class="form-controls col-sm-10 col-xs-12 ys-btn">
                                                    <button class='btn-info btn-poster  btn-sm' type='button'
                                                            data-type='img'><i class="fa fa-photo"></i>报名照片
                                                    </button>
                                                    <button class='btn-primary btn-poster btn-sm' type='button'
                                                            data-type='avatar'><i class="fa fa-user"></i>微信头像
                                                    </button>
                                                    <button class='btn-warning btn-poster btn-sm' type='button'
                                                            data-type='name'><i class="fa fa-file-text-o"></i>微信昵称
                                                    </button>
                                                     <button class='btn-success btn-poster btn-sm' type='button'
                                                            data-type='number'><i class="fa fa-file-text-o"></i>选手编号
                                                    </button>
                                                    <button class='btn-danger btn-poster btn-sm' type='button'
                                                            data-type='qr'><i class="fa fa-qrcode"></i>二维码
                                                    </button>
                          <div class='help-block' style="color:#f00;display:block; clear:both;">请保持” 微信昵称 “，” 选手编号 “在最顶层，右键点击” 移动至最顶层 “。为了性能，最多添加4个种类。</div>
                                                </div> 
                        
                                            </div>
                                            <div id='namesset' style='display:none'>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">字体颜色</label>
                                                    <div class="form-controls col-sm-10 col-xs-12">
                                                        <?php  echo tpl_form_field_color('color')?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">字体大小</label>
                                                    <div class="form-controls col-sm-10">
                                                        <div class='input-group'>
                                                            <input type="text" id="namesize"
                                                                   class="form-control namesize" placeholder="例如: 15"/>
                                                            <div class='input-group-addon'>px</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="posterbg">
                                                <label class="control-label col-sm-2">海报背景</label>
                                                <div class="form-controls col-sm-8 col-xs-12">
                                                    <?php  echo tpl_form_field_image('bill_bg', $reply['bill_bg'])?>
                                                    <span class='help-block'>海报背景大小建议尺寸为: 640 * 1008</span>
                                                </div>
                                            </div>
                      <?php  if($_W['account']['level']==4) { ?>
                      <div class="form-group">
                        <label class="control-label col-sm-2">自动投票</label>
                        <div class="form-controls col-sm-10 col-xs-12">
                         <div class="alert alert-success" role="alert">请在回复规则 “高级触发列表”-“正则表达式模式匹配” 新增 “<span class="label label-success">^<?php  echo $reply['posterkey'];?></SPAN>” 为关键字</div>
                         <input type="hidden" class="form-control" name="posterkey" value="<?php  echo $reply['posterkey'];?>"/>
                         <div class="help-block"></div>
                        </div>
                      </div>
                      <?php  } ?>
                      <div class="form-group">
                          <label class="control-label col-sm-2"></label>
                          <div class="form-controls col-sm-10 col-xs-12">
                            <button  type="button" class="btn btn-danger clearposter" value="check">清除海报</button>
                            <span class='help-block'>修改海报信息时，请清除已生成海报图片数据。
                            <br>
                            <a href="http://doc.nowbeta.com/index.php?s=/1&page_id=7" target="_blank"   class="btn_add_join text-primary"><i class="fa fa-eye" title="查看教程"></i> 查看教程</a>
                            </span>
                          </div>
                      </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


            </div>
        <input type="hidden" name="bill_data" value="" />
        </div>

          

 
 <div class="we7-form nav_tab   nav_4">
    <div class="panel-heading" role="tab" id="headingThree">
      <div class="wq-panel-body">
        <div class="form-group">
          <label class="control-label col-sm-2">分享标题</label>
          <div class="form-controls col-sm-8">
            <input class="form-control" type="text" value="<?php  echo $reply['sharetitle'];?>" class="span2" name="sharetitle">
            <div class="help-block">分享给好友或朋友圈时的标题</div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">分享图片</label>
          <div class="form-controls col-sm-8">
            <?php  echo tpl_form_field_image('shareimg',$reply['shareimg'],'', $options);?>
            <div class="help-block">分享给好友或朋友圈时的图片</div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">分享描述</label>
          <div class="form-controls col-sm-8">
            <textarea class="form-control" name="sharedesc"><?php  echo $reply['sharedesc'];?></textarea>
            <div class="help-block">分享给好友或朋友圈时的描述</div>
          </div>
        </div>    
      </div>
  </div>
 </div>
   <div class="we7-form nav_tab  nav_10">
      <div class="wq-panel-body">
     <div class="form-group">
          <label class="control-label col-sm-2">报名图片</label>
      <div class="control-label col-sm-4">
            <div class="input-group">
              <input class="form-control" type="number" value="<?php  echo $reply['minupimg'];?>"name="minupimg">
              <span class="input-group-addon">至</span>
              <input class="form-control" type="number" value="<?php  echo $reply['maxupimg'];?>"name="maxupimg">
              <span class="input-group-addon">张</span>
            </div>
            <div class="help-block">不能小于1张！不能大于5张</div>
          </div>
      </div>

    <div class="form-group">
      <label class="control-label col-sm-2">上传图片模式</label>
      <div class="form-controls col-sm-8">
       <label><input type="radio" value="0" name="upimgtype" <?php  if($reply['upimgtype'] == 0 ) { ?>checked<?php  } ?>>  微信自带上传（必须设置js分享安全域名）   </label>
       <label><input type="radio" value="1" name="upimgtype" <?php  if($reply['upimgtype'] == 1 ) { ?>checked<?php  } ?>>  系统组件上传（不依赖jssdk）    </label>
       <div class="help-block"></div>
      </div>
    </div>
    <div class="form-group">
          <label class="control-label col-sm-2">报名信息</label>
      <div class="form-controls col-sm-10">
      <div style="margin-left:-15px;">
        <div class="col-sm-10" style="margin-bottom:10px">
                    <div class="input-group">
              <input type="text" class="form-control" disabled="disabled" value="姓名" >
              <span class="input-group-addon"></span>
              <select class="form-control" disabled="disabled">
              <option value="realname">真实姓名</option>
              </select>
               <div class="input-group-btn" style="width:95px">
                <select class="form-control" disabled="disabled">
                  <option value="1" selected="selected">必填</option>   
                </select>
               </div>
          </div>
        </div>
      </div>
      <div style="margin-left:-15px;">
        <div class="col-sm-10" style="margin-bottom:10px">
                    <div class="input-group">
              <input type="text" class="form-control" disabled="disabled" value="参赛宣言" >
              <span class="input-group-addon"></span>
              <select class="form-control" disabled="disabled">
              <option value="realname">参赛宣言</option>
              </select>
               <div class="input-group-btn" style="width:95px">
                <select class="form-control" disabled="disabled">
                  <option value="1" selected="selected">必填</option>   
                </select>
               </div>
          </div>
        </div>
      </div>          
<?php  echo $tpl_setinput;?> 
        <div class="join_insert_flag"></div>
        <span class="help-block form-controls col-sm-8" style="margin-left:-15px"><a href="javascript:;" class="btn_add_join"><i class="fa fa-plus-circle" title="添加填写项目"></i> 添加填写项目</a></span>
        <div class="help-block" style="clear:both;">设置报名需要填写的字段！，设置为前台显示时，购买会员能显示，否则前台不显示。
        <br>
        <a href="http://doc.nowbeta.com/index.php?s=/1&page_id=6" target="_blank"   class="btn_add_join text-primary"><i class="fa fa-eye" title="查看教程"></i> 查看教程</a>

        </div>
      </div>
    </div>
    </div>

  </div>
</div>

</div>
<script  src="<?php echo MODULE_URL;?>/template/static/js/poster.js" type="text/javascript"></script>

<script type="text/javascript">  

  

$(document).ready(function(){




var we7form=$("#reply-form .we7-form:first").html();
$("#we7form").html(we7form);
$("#reply-form .we7-form:first").remove();
//清除海报
$(".clearposter").click(function(){
  $.ajax({
    type: "POST",
    url: "<?php  echo $this->createWebUrl('otherset', array('rid' => $reply['rid'],'ty'=>'delposterimg'))?>",
    dataType: "json",
    success: function(str) {
      if(str!=null && str!=''){
        if(str.status == 200){
          util.message('操作成功', '', 'success');
        }
      }
    },
    error: function(err) {
      util.message('操作失败');
    }
  });

});
//清除海报
require(['jquery', 'util'], function($, util){
  $(function(){
    //广告幻灯片
    $('#btn_add_adtr').bind('click', function(){
     var content='<tr><td class="text-left" ><input type="text" placeholder="广告名称" value="" class="form-control" name="adtitle[]"></td><td><div class="adimgbox"><a href="javascript:;" class="thumbadimg"><img src="../attachment//images/global/nopic.jpg"  height="30"><input type="hidden" value="" name="adimg[]"></a></div></td><td class="text-left" ><input type="text" value="" placeholder="请输入广告url，带http://" class="form-control" name="adurl[]"></td><td><button type="button" class="btn btn-danger btn_del_ad btn-xs">删除</button></td></tr>';
     $("#js-table-3 tr:last").after(content);
    });
    // 报名字段设置
    $('.btn_add_join').bind('click', function(){
        var content = '';
      content += '<div style="margin-left:-15px;"><div class="col-sm-10" style="margin-bottom:10px"><div class="input-group"><input type="text" class="form-control" name="infoname[]" value="" placeholder="请输入表单名称"><span class="input-group-addon"></span><select class="form-control" name="infotype[]"><option value="">请选择输入类型</option><option value="realname">真实姓名</option><option value="mobile">手机号码</option><option value="email">电子邮箱</option><option value="sex">性别</option><option value="qq">QQ号</option><option value="birthyear">出生生日</option><option value="telephone">固定电话</option><option value="idcard">证件号码</option><option value="address">邮寄地址</option><option value="zipcode">邮编</option><option value="nationality">国籍</option><option value="resideprovince">居住地址</option><option value="graduateschool">毕业学校</option><option value="company">公司</option><option value="education">学历</option><option value="occupation">职业</option><option value="position">职位</option><option value="revenue">年收入</option><option value="affectivestatus">情感状态</option><option value="lookingfor"> 交友目的</option><option value="bloodtype">血型</option><option value="height">身高</option><option value="weight">体重</option><option value="alipay">支付宝帐号</option><option value="taobao">阿里旺旺</option><option value="vqqcom">腾讯视频</option><option value="site">主页</option><option value="bio">自我介绍</option><option value="interest">兴趣爱好</option></select> <div class="input-group-btn" style="width:95px"><select class="form-control" name="notnull[]"><option value="1" selected="selected">必填</option><option value="0">非必填</option></select> </div><div class="input-group-btn" style="width:130px"><select  class="form-control" name="isshow[]"><option value="0"  >前台不显示</option><option value="1"  >前台显示</option></select></div></div></div><div class="col-sm-1 del_box" style="margin-top:5px"><a href="javascript:;"><i class="fa fa-times-circle"></i></a></div></div>';
      $('.join_insert_flag').before(content);
    });
    //清除弹出广告
    $('.add_gifturl span').click(function(){
      $("#voteadurl").val($(this).attr('data-url'));
       
    });
    //礼物设置
    $('#btn_add_gift').bind('click', function(){
       var content='<tr><td class="text-left" ><input type="text" placeholder="输入名称" value="" class="form-control" name="gifttitle[]"></td><td><div class="adimgbox"><a href="javascript:;" class="thumbadimg"><img src="../attachment/images/global/nopic.jpg"  height="30"><input type="hidden" value="" name="gifticon[]"></a></div></td><td class="text-left" ><div class="input-group"><input type="text" placeholder="输入支付价格" value="" class="form-control" name="giftprice[]"><span class="input-group-addon">元</span></div></td><td class="text-left" ><div class="input-group"><input type="text" placeholder="输入礼物奖励的票数" value="" class="form-control" name="giftvote[]"></div></td><td><button type="button" class="btn btn-danger btn_del_ad btn-xs">删除</button></td></tr>';
       $("#js-table-2 tr:last").after(content);
      });
  });
});
    
  $('.btn_clear_ad').click(function(){ 
  $("input[name='voteadimg']").val("");
  $(".tanchuad .thumbadimg img").attr("src","");
  $("input[name='voteadurl']").val("");
  });
    //Default Action  
    $(".nav_tab").hide(); //Hide all content  
    $(".navtab a:first").addClass("active").show(); //Activate first tab  
    $(".nav_tab:first").show(); //Show first tab content  
      
    //On Click Event  
    $(".navtab a").click(function() {  
        $(".navtab a").removeClass("active"); //Remove any "active" class  
        $(this).addClass("active"); //Add "active" class to selected tab  
        $(".nav_tab").hide(); //Hide all tab content  
        var activeTab = $(this).attr("data-tab"); //Find the rel attribute value to identify the active tab + content  
        $("."+activeTab).show(); //Fade in the active content  
        return false;  
    });  
  
  $('body').delegate('.thumbadimg img','click', function() {
      thimg=$(this);
      util.image('',function(data){
      thimg.attr("src",data['url']);
      thimg.next().val(data['attachment']);
      },'',{'fileNumLimit':1, 'width'  :320,'height' : 120,'thumb': true});
    });
  $('body').delegate('.btn_del_ad','click', function() {
      var obj = $(this).parent().parent();
      obj.slideUp(300, function() {
        obj.remove();
      });
    });
  $('body').delegate('.del_box','click', function() {
    var obj = $(this).parent();
    obj.remove();
        
  });
  
});   
  window.initReplyController = function($scope) {
  };
  window.validateReplyForm = function(form, $, _, util, $scope) {
    return true;
  };

  $('.del_box').bind('click', function(){
      var obj = $(this).parent();
      obj.remove();
      
   });
      
 //海报start
var gqrt = 0;
    var siteurl = "<?php  echo $_W['siteroot'];?>";
    var attachurl = "<?php  echo $_W['attachurl'];?>";
    var ncounter = 0;

    function tiger_bind(obj){
        var imgsset = $('#imgsset');
        var namesset = $("#namesset");
        imgsset.hide();
        namesset.hide();
        deleteTimers();
        var type = obj.attr('type');
        if(type=='name' || type=='number'){
            namesset.show();
            var size = obj.attr('size') || "16";
            var picker = namesset.find('.sp-preview-inner');
            var input = namesset.find('input:first');
            var namesize = namesset.find('#namesize');
            var color = obj.attr('color') || "#000";
            input.val(color); namesize.val(size.replace("px",""));
            picker.css( {'background-color':color,'font-size':size});
            ncounter = setInterval(function(){
                obj.attr('color',input.val()).find('.text').css('color',input.val());
                obj.attr('size',namesize.val() +"px").find('.text').css('font-size',namesize.val() +"px");
            },100);
        }
    }
    var bscounter = 0 ;
    var imgcounter = 0 ;
    $(function(){

        $('.drag').each(function(){
            dragEvent($(this));
        });

        $('.btn-poster').click(function(){
            var imgsset = $('#imgsset');
            var namesset = $("#namesset");
            imgsset.hide();
            namesset.hide();
            deleteTimers();
            var type = $(this).data('type');
            var img = "";
            if(type=='img' || type=='thumb'){
                img = '<img src="<?php echo MODULE_URL;?>/template/static/images/default.jpg" />';
            } else if(type=='avatar'){
                img = '<img src="<?php echo MODULE_URL;?>/template/static/images/avatar.jpg" />';
            } else if(type=='name'){
                img = '<div class=text>昵称</div>';
            }else if(type=='number'){
                img = '<div class=text>编号</div>';
            }else if(type=='qr'){
                img = '<img src="<?php echo MODULE_URL;?>/template/static/images/qr.png" />';
            }
            var index = $('#tiger_poster .drag').length+1;
            var obj = $('<div class="drag" type="' + type +'" index="' + index +'" style="z-index:' + index+';left:0;top:0;">' + img+'<div class="dRightDown"> </div><div class="dLeftDown"> </div><div class="dRightUp"> </div><div class="dLeftUp"> </div><div class="dRight"> </div><div class="dLeft"> </div><div class="rUp"> </div><div class="rDown"></div></div>');
            $('#tiger_poster').append(obj);
            dragEvent(obj);

            $('.drag').click(function(){
                tiger_bind($(this));
            })

        });
    });
  
   var imgcounter = 0 ;   
     $('#reply-form').submit(function(){

      var infotypeval = 0;
      $("select[name='infotype[]']").each(  
        function(index,e){  
            if($(this).val()==""){
                infotypeval=1;
            }
        }  
      );
      if(infotypeval){ 
        util.message('请至“报名设置”-“报名信息”-选择报名信息输入类型，不可重复选择！');
        return false;
      }

        var poster = [];
        $('.drag').each(function(){
            var obj = $(this);
            var type = obj.attr('type');
            var left = obj.css('left');
            var top = obj.css('top');
            var d= {left:left,top:top,type:obj.attr('type'),width:obj.css('width'),height:obj.css('height')};
            if(type=='name' ||type=='number' ){
                d.size = obj.attr('size');
                d.color = obj.attr('color');
            }
            poster.push(d);
        });
        $('input[name="bill_data"]').val( JSON.stringify(poster));
        return true;
    });
//海报end 
//模板风格设置start
  $('.temp_box ul li img').click(function(){
      $(this).parent().siblings().removeClass("ontemp");
        $(this).parent().addClass("ontemp");
    $("#template").val($(this).parent().attr("data-temp"));
    $(".temp_style p").removeClass("onstyle");
    $(this).next().children("p:first").addClass("onstyle");
    $("#setstyle").val($(this).next().children("p:first").attr("data-sty"));
    });
  $('.setstyle').click(function(){
     $(".temp_style p").removeClass("onstyle");
     $(this).addClass("onstyle");
     $("#setstyle").val($(this).attr("data-sty"));
     $('.temp_box ul li').removeClass("ontemp");
     $(this).parent().parent().addClass("ontemp");
     $("#template").val($(this).parent().parent().attr("data-temp"));
  });
//模板风格设置end
</script>
<?php  } ?>
