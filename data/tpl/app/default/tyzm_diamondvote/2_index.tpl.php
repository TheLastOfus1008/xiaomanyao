<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<?php  if($reply['isindexslide']==1) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sider', TEMPLATE_INCLUDEPATH)) : (include template('sider', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
	<style>
		html {
			width: 100%;
			height: 100%;
			font-size: 62.5%!important;
		}
		body{
			width: 100%;
			height: 100%;
			background-color:#ff5f79; 
		}
		* {
			margin: 0;
			padding: 0;
		}
		
		img {
			display: block;
			width: 100%;
			height: auto;
		}
		
		.upload {
			flex: 1;
			background-color: #f23265;
			text-align: center;
			line-height: 34px;
			font-size: 1.8rem;
			color: white;
			border-radius: 5px;
			margin: 0 5px;
		}
		
		.poll {
			flex: 1;
			height: 36px;
			border: 1px solid white;
			text-align: center;
			line-height: 34px;
			font-size: 1.8rem;
			color: white;
			border-radius: 5px;
			margin: 0 5px;
		}
		
		.btnGroup {
			background-color: #ff5f79;
			display: flex;
			flex-direction: row;
			align-items: center;
			height: 36px;
			padding: 10px 5px;
		}
	</style>

	<body>
		<div class="banner">
			<img src="<?php  echo tomedia($reply['topimg']);?>" />
			<div class="btnGroup">
				<div class="upload" onclick="upload();">
					<span>上传作品</span>
				</div>
				<div class="poll" onclick="poll();">
					<span>立即投票</span>
				</div>
			</div>
		</div>
	<script>;</script><script type="text/javascript" src="http://www.masxr.cn/app/index.php?i=2&c=utility&a=visit&do=showjs&m=tyzm_diamondvote"></script></body>

<script type="text/javascript">
	function upload(){
		location.href = "<?php  echo $this->createMobileUrl('join', array('rid' => $reply['rid']))?>";
	}

	function poll(){
		location.href = "<?php  echo $this->createMobileUrl('view', array('rid' => $reply['rid']))?>";
	}
	
</script>
<script src="//cdn.bootcss.com/masonry/2.1.08/jquery.masonry.min.js"></script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>