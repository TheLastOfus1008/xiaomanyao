<?php
/**
 * 钻石投票-首页
 *
 * @author 天涯织梦
 * @url http://bbs.we7.cc/
 */

defined('IN_IA') or exit('Access Denied');
global $_W,$_GPC;
is_weixin();

include $this->template(m('tpl')->style('introduction'));