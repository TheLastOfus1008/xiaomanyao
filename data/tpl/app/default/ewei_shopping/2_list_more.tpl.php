<?php defined('IN_IA') or exit('Access Denied');?><?php  if(is_array($list)) { foreach($list as $item) { ?>
 <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('list_item', TEMPLATE_INCLUDEPATH)) : (include template('list_item', TEMPLATE_INCLUDEPATH));?>
<?php  } } ?>