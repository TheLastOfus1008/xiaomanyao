/** 
 * 基于weui的对话框插件 
 * 版本：2.0
 * 作者：HawkLu 
 * 插件地址：http://www.hawklu.com/archives/7
 * 因官方weui.css更新，旧版本无法使用
 * 调用方法：
 * var d=new weuiDialog({
 * 		attr1:value1,
 * 		attr2:value2,
 * 		...
 * });
 * 参数设置与jquery版本一样
 */  
;
(function(window,document){
	var _this;
	var _dialog;
	//dialog 模版 DOM树  
    var dialogModel = '<div id="dialog" style="display:none ;">' +  
        '<div class="weui-mask"></div>' +  
        '<div class="weui-dialog">' +  
        '<div class="weui-dialog__hd"><strong class="weui-dialog__title my_title" ></strong></div>' +  
        '<div class="weui-dialog__bd my_content" ></div>' +  
        '<div class="weui-dialog__ft">' +  
        '<a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_default my_cancle" ></a>' +  
        '<a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_primary my_ok" ></a>' +  
        '</div></div></div>';  
        
    
	var weuiDialog=function(opt){
		//默认参数
		this.defaults={
			title:"Dialog标题",		//标题文字
			content:"Dialog内容",	//内容文字
			ok:"确定",				//确认按钮文字
			cancle:"取消",			//取消按钮文字
			okFcn:function(){return true;},		//确认按钮点击后执行函数
			cancleFcn:function(){return true;},	//取消按钮点击后执行函数
			closeFcn:function(){return true;}	//Dialog关闭后执行函数
		}
		
		//参数合并
		this.options = Object.assign({},this.defaults, opt);
		
		AddDom();
		init(this.options);
		eventBind(this.options);
		_dialog=this;
	};
	
	
	//添加Dom
	function AddDom(){
		var dom=document.createElement("div");
		dom.innerHTML=dialogModel;
		document.querySelector("body").appendChild(dom);
	}
	
	//初始化
	function init(ops){
		_this=document.querySelector("#dialog");
		for(var opitem in ops){
			if(typeof(ops[opitem]) == "string" && ops[opitem]) {  		//设置文本
				var x= document.querySelector(".my_"+opitem);
				x.innerHTML=ops[opitem];
            } else if(typeof(ops[opitem]) == "string" && !ops[opitem]) {  //移除空元素
            	var x= document.querySelector(".my_"+opitem);
            	var thisP=x.parentNode;
            	thisP.removeChild(x);
            } else {  
                //              console.log("this is function");  
            }  
		}
	}
	
	//事件绑定
	function eventBind(ops){
		document.querySelector(".my_ok").addEventListener("click",function(){
			if(typeof(ops["okFcn"])=="function"){
				if(ops["okFcn"]()===false){
					return false;  
				}else{
					_dialog.close();
				}
			}
		});
		document.querySelector(".my_cancle").addEventListener("click",function(){
			if(typeof(ops["cancleFcn"])=="function"){
				if(ops["cancleFcn"]()===false){
					return false;  
				}else{
					_dialog.close();
				}
			}
		});
	}
	
	weuiDialog.prototype={
		show:function(){
			_this.style.display="block";
		},
		close:function(){
			_this.style.display="none";
			this.options["closeFcn"](); 
		},
		title: function(v) {  
            this.options['title'] = v;  
            init(this.options);  
        },  
        //设置内容  
        content: function(v) {  
            this.options['content'] = v;  
            init(this.options);  
        }  
	};
	
	//暴露构造函数给window对象，便于外部访问
	window.weuiDialog=weuiDialog;
}(window,document));
	

