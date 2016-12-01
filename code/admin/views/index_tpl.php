<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="off">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?=lang('admin_site_title')?></title>
<link href="<?=base_url('assets/admin/css/reset.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/admin/css/zh-cn-system.css')?>" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/admin/css/dialog.css')?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/admin/css/style/zh-cn-styles1.css')?>" title="styles1" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="<?=base_url('assets/admin/css/style/zh-cn-styles2.css')?>" title="styles2" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="<?=base_url('assets/admin/css/style/zh-cn-styles3.css')?>" title="styles3" media="screen" />
<link rel="alternate stylesheet" type="text/css" href="<?=base_url('assets/admin/css/style/zh-cn-styles4.css')?>" title="styles4" media="screen" />
<script language="javascript" type="text/javascript" src="<?=base_url('assets/admin/js/jquery.min.js')?>"></script>
<script language="javascript" type="text/javascript" src="<?=base_url('assets/admin/js/styleswitch.js')?>"></script>
<script language="javascript" type="text/javascript" src="<?=base_url('assets/admin/js/dialog.js')?>"></script>
<script language="javascript" type="text/javascript" src="<?=base_url('assets/admin/js/hotkeys.js')?>"></script>
<script language="javascript" type="text/javascript" src="<?=base_url('assets/admin/js/jquery.sgallery.js')?>"></script>
<style type="text/css">
.objbody{overflow:hidden}

.btns{background-color:#666;}
.btns{position: absolute; top:116px; right:30px; z-index:1000; opacity:0.6;}
.btns2{background-color:rgba(0,0,0,0.5); color:#fff; padding:2px; border-radius:3px; box-shadow:0px 0px 2px #333; padding:0px 6px; border:1px solid #ddd;}
.btns:hover{opacity:1;}
.btns h6{padding:4px; border-bottom:1px solid #666; text-shadow: 0px 0px 2px #000;}
.btns .pd4{ padding-top:4px; border-top:1px solid #999;}
.pd4 li{border-radius:0px 6spx 0px 6px; margin-top:2px; margin-bottom:3px; padding:2px 0px;}
.btns .pd4 li span{padding:0px 6px;}
.pd{padding:4px;}
.ac{background-color:#333; color:#fff;}
.hvs{background-color:#555; cursor: pointer;}
.bg_btn{background: url(<?=base_url('assets/admin/images/admin_img/icon2.jpg')?>.') no-repeat; width:32px; height:32px;}
</style>
</head>
<body scroll="no" class="objbody">
<div id="dvLockScreen" class="ScreenLock" style="display:<?php if($lock_screen==0) echo 'none';?>">
    <div id="dvLockScreenWin" class="inputpwd">
    <h5><b class="ico ico-info"></b><span id="lock_tips"><?=lang('lockscreen_status');?></span></h5>
    <div class="input">
    	<label class="lb"><?=lang('password')?>：</label><input type="password" id="lock_password" class="input-text" size="24">
        <input type="submit" class="submit" value="&nbsp;" name="dosubmit" onclick="check_screenlock();return false;">
    </div></div>
</div>
<div class="header">
	<div class="logo lf"><a href="./admin.php" target="_self"><span class="invisible"><?=lang('admin_site_title')?></span></a></div>
    <div class="rt-col">
    	<div class="tab_style white cut_line text-r">
    	<?php echo lang('hello'),$user_name?><span>|</span><a href="?c=index&m=logout">[<?=lang('exit')?>]</a><span>|</span>
    	<a href="javascript:;" onclick="lock_screen()"><img src="<?=base_url('assets/admin/images/icon/lockscreen.png')?>"> <?=lang('lockscreen')?></a><span>|</span>
    	<a href="<?php echo base_url()?>" target="_blank" id="site_homepage">首页</a><span>|</span>
    <ul id="Skin">
		<li class="s1 styleswitch" rel="styles1"></li>
		<li class="s2 styleswitch" rel="styles2"></li>
		<li class="s3 styleswitch" rel="styles3"></li>
        <li class="s4 styleswitch" rel="styles4"></li>
	</ul>
        </div>
    </div>
    <div class="col-auto">
    	<div class="log white cut_line">
    	</div>
        <ul class="nav white" id="top_menu">
        <?php
        foreach($admin_menu as $_value) {
            if(! get_view($_value['c'], $_value['m'], $_value['a'])) continue;
        	if($_value['id']==1) {
        		echo '<li id="_M'.$_value['id'].'" class="on top_menu"><a href="javascript:_M('.$_value['id'].',\'\')" hidefocus="true" style="outline:none;">'.lang($_value['name']).'</a></li>';
        		
        	} else {
        		echo '<li id="_M'.$_value['id'].'" class="top_menu"><a href="javascript:_M('.$_value['id'].',\'\')"  hidefocus="true" style="outline:none;">'.lang($_value['name']).'</a></li>';
        	}      	
        }
        ?>
        </ul>
    </div>
</div>
<div id="content">
	<div class="col-left left_menu">
    	<div id="Scroll"><div id="leftMain"></div></div>
        <a href="javascript:;" id="openClose" style="outline-style: none; outline-color: invert; outline-width: medium;" hideFocus="hidefocus" class="open" title="<?=lang('spread_or_closed')?>"><span class="hidden"><?=lang('expand')?></span></a>
    </div>
	<div class="col-1 lf cat-menu" id="display_center_id" style="display:none" height="100%">
	<div class="content">
        	<iframe name="center_frame" id="center_frame" src="" frameborder="false" scrolling="auto" style="border:none" width="100%" height="auto" allowtransparency="true"></iframe>
            </div>
        </div>
    <div class="col-auto mr8">
    <div class="crumbs">
    <div class="shortcut cu-span"><a href="" target="right"><span><?=lang('update_backup')?></span></a><a href="javascript:art.dialog({id:'map',iframe:'?c=index&m=site_map', title:'<?=lang('background_map')?>', width:'700', height:'500', lock:true});void(0);"><span><?= lang('background_map')?></span></a></div>
    <?=lang('current_position')?><span id="current_pos"></span></div>
    	<div class="col-1">
        	<div class="content" style="position:relative; overflow:hidden">
                <iframe name="right" id="rightMain" src="?c=index&m=info" frameborder="false" scrolling="auto" style="border:none; margin-bottom:30px" width="100%" height="auto" allowtransparency="true"></iframe>
                <div class="fav-nav">
                 	<div id="panellist">
						<?php foreach($adminpanel as $v) {?>
								<span>
								<a onclick="paneladdclass(this);" target="right" href="<?php echo $v['url'].'/'.$v['menu_id'];?>"><?php echo lang($v['name'])?></a>
								<a class="panel-delete" href="javascript:delete_panel(<?php echo $v['menu_id']?>, this);"></a></span>
						<?php }?>
					</div>
                    <div id="paneladd"></div>
					<input type="hidden" id="menuid" value="">
					<input type="hidden" id="bigid" value="" />
                    <div id="help" class="fav-help"></div>
				</div>
        	</div>
        </div>
    </div>
</div>
<div class="scroll"><a href="javascript:;" class="per" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(1);"></a><a href="javascript:;" class="next" title="使用鼠标滚轴滚动侧栏" onclick="menuScroll(2);"></a></div>
<script type="text/javascript"> 
if(!Array.prototype.map)
Array.prototype.map = function(fn,scope) {
  var result = [],ri = 0;
  for (var i = 0,n = this.length; i < n; i++){
	if(i in this){
	  result[ri++]  = fn.call(scope ,this[i],i,this);
	}
  }
return result;
};

var getWindowSize = function(){
return ["Height","Width"].map(function(name){
  return window["inner"+name] ||
	document.compatMode === "CSS1Compat" && document.documentElement[ "client" + name ] || document.body[ "client" + name ]
});
}
window.onload = function (){
	if(!+"\v1" && !document.querySelector) { // for IE6 IE7
	  document.body.onresize = resize;
	} else { 
	  window.onresize = resize;
	}
	function resize() {
		wSize();
		return false;
	}
}
function wSize(){
	//这是一字符串
	var str=getWindowSize();
	var strs= new Array(); //定义一数组
	strs=str.toString().split(","); //字符分割
	var heights = strs[0]-150,Body = $('body');$('#rightMain').height(heights);   
	//iframe.height = strs[0]-46;
	if(strs[1]<980){
		$('.header').css('width',980+'px');
		$('#content').css('width',980+'px');
		Body.attr('scroll','');
		Body.removeClass('objbody');
	}else{
		$('.header').css('width','auto');
		$('#content').css('width','auto');
		Body.attr('scroll','no');
		Body.addClass('objbody');
	}
	
	var openClose = $("#rightMain").height()+39;
	$('#center_frame').height(openClose+9);
	$("#openClose").height(openClose+30);	
	$("#Scroll").height(openClose-20);
	windowW();
}
wSize();
function windowW(){
	if($('#Scroll').height()<$("#leftMain").height()){
		$(".scroll").show();
	}else{
		$(".scroll").hide();
	}
}
windowW();
//站点下拉菜单
$(function(){
	var offset = $(".tab_web").offset();
	var tab_web_panel = $(".tab-web-panel");
	$(".tab_web").mouseover(function(){
			tab_web_panel.css({ "left": +$(this).offset().left+4, "top": +offset.top+$('.tab_web').height()});
			tab_web_panel.show();
			if(tab_web_panel.height() > 200){
				tab_web_panel.children("ul").addClass("tab-scroll");
			}
		});
	$(".tab_web span").mouseout(function(){hidden_site_list_1()});
	$(".tab-web-panel").mouseover(function(){clearh();$('.tab_web a').addClass('on')}).mouseout(function(){hidden_site_list_1();$('.tab_web a').removeClass('on')});
	//默认载入左侧菜单
	$("#leftMain").load("?c=index&m=left_menu&menuid=1");

	//面板切换
	$("#btnx").removeClass("btns2");
	$("#Site_model,#btnx h6").css("display","none");
	$("#btnx").hover(function(){$("#Site_model,#btnx h6").css("display","block");$(this).addClass("btns2");$(".bg_btn").hide();},function(){$("#Site_model,#btnx h6").css("display","none");$(this).removeClass("btns2");$(".bg_btn").show();});
	$("#Site_model li").hover(function(){$(this).toggleClass("hvs");},function(){$(this).toggleClass("hvs");});
	$("#Site_model li").click(function(){$("#Site_model li").removeClass("ac"); $(this).addClass("ac");});
})

//隐藏站点下拉。
var s = 0;
var h;
function hidden_site_list() {
	s++;
	if(s>=3) {
		$('.tab-web-panel').hide();
		clearInterval(h);
		s = 0;
	}
}
function clearh(){
	if(h)clearInterval(h);
}
function hidden_site_list_1() {
	h = setInterval("hidden_site_list()", 1);
}

//左侧开关
$("#openClose").click(function(){
	if($(this).data('clicknum')==1) {
		$("html").removeClass("on");
		$(".left_menu").removeClass("left_menu_on");
		$(this).removeClass("close");
		$(this).data('clicknum', 0);
		$(".scroll").show();
	} else {
		$(".left_menu").addClass("left_menu_on");
		$(this).addClass("close");
		$("html").addClass("on");
		$(this).data('clicknum', 1);
		$(".scroll").hide();
	}
	return false;
});

function _M(menuid,targetUrl) {
	$("#menuid").val(menuid);
	$("#bigid").val(menuid);
	$("#paneladd").html('<a class="panel-add" href="javascript:add_panel();"><em><?=lang('add')?></em></a>');
	$("#leftMain").load("?c=index&m=left_menu&menuid="+menuid,  function(){
		   windowW();
		 });

	//$("#rightMain").attr('src', targetUrl);
	$('.top_menu').removeClass("on");
	$('#_M'+menuid).addClass("on");
	$.get("?c=index&m=current_pos&menuid="+menuid, function(data){
		$("#current_pos").html(data);
	});
	//当点击顶部菜单后，隐藏中间的框架
	$('#display_center_id').css('display','none');
	//显示左侧菜单，当点击顶部时，展开左侧
	$(".left_menu").removeClass("left_menu_on");
	$("#openClose").removeClass("close");
	$("html").removeClass("on");
	$("#openClose").data('clicknum', 0);
	$("#current_pos").data('clicknum', 1);
}
function _MP(menuid,targetUrl) {
	$("#menuid").val(menuid);
	$("#paneladd").html('<a class="panel-add" href="javascript:add_panel();"><em><?=lang('add')?></em></a>');

	$("#rightMain").attr('src', targetUrl);
	$('.sub_menu').removeClass("on fb blue");
	$('#_MP'+menuid).addClass("on fb blue");
	$.get("?c=index&m=current_pos&menuid="+menuid, function(data){
		$("#current_pos").html(data+'<span id="current_pos_attr"></span>');
	});
	$("#current_pos").data('clicknum', 1);
}
function add_panel() {
	var menuid = $("#menuid").val();
	$.ajax({
		type: "POST",
		url: "?c=index&m=ajax_add_panel",
		data: "menuid=" + menuid,
		success: function(data){
			if(data) {
				$("#panellist").html(data);
			}
		}
	});
}
function delete_panel(menuid, id) {
	$.ajax({
		type: "POST",
		url: "?c=index&m=ajax_delete_panel",
		data: "menuid=" + menuid,
		success: function(data){
			$("#panellist").html(data);
		}
	});
}

function paneladdclass(id) {
	$("#panellist span a[class='on']").removeClass();
	$(id).addClass('on')
}
setInterval("session_life()", 1800000);
function session_life() {
	$.get("?c=index&m=session_life");
} 
function lock_screen() {
	$.get("?c=index&m=lock_screen");
	$('#dvLockScreen').css('display','');
}
function check_screenlock() {
	var lock_password = $('#lock_password').val();
	if(lock_password=='') {
		$('#lock_tips').html('<font color="red"><?=lang('password_can_not_be_empty');?></font>');
		return false;
	}
	$.get("?c=index&m=login_screenlock", { lock_password: lock_password},function(data){
		if(data==1) {
			$('#dvLockScreen').css('display','none');
			$('#lock_password').val('');
			$('#lock_tips').html('<?=lang('lockscreen_status');?>');
		} else if(data==3) {
			$('#lock_tips').html('<font color="red"><?=lang('wait_1_hour_lock');?></font>');
		} else {
			strings = data.split('|');
			$('#lock_tips').html('<font color="red"><?=lang('password_error_lock');?>'+strings[1]+'<?=lang('password_error_lock2');?></font>');
		}
	});
}
$(document).bind('keydown', 'return', function(evt){check_screenlock();return false;});

(function(){
    var addEvent = (function(){
             if (window.addEventListener) {
                return function(el, sType, fn, capture) {
                    el.addEventListener(sType, fn, (capture));
                };
            } else if (window.attachEvent) {
                return function(el, sType, fn, capture) {
                    el.attachEvent("on" + sType, fn);
                };
            } else {
                return function(){};
            }
        })(),
    Scroll = document.getElementById('Scroll');
    // IE6/IE7/IE8/IE10/IE11/Opera 10+/Safari5+
    addEvent(Scroll, 'mousewheel', function(event){
        event = window.event || event ;  
		if(event.wheelDelta <= 0 || event.detail > 0) {
				Scroll.scrollTop = Scroll.scrollTop + 29;
			} else {
				Scroll.scrollTop = Scroll.scrollTop - 29;
		}
    }, false);

    // Firefox 3.5+
    addEvent(Scroll, 'DOMMouseScroll',  function(event){
        event = window.event || event ;
		if(event.wheelDelta <= 0 || event.detail > 0) {
				Scroll.scrollTop = Scroll.scrollTop + 29;
			} else {
				Scroll.scrollTop = Scroll.scrollTop - 29;
		}
    }, false);
	
})();
function menuScroll(num){
	var Scroll = document.getElementById('Scroll');
	if(num==1){
		Scroll.scrollTop = Scroll.scrollTop - 60;
	}else{
		Scroll.scrollTop = Scroll.scrollTop + 60;
	}
}

if (self != top)
{
    /* 在框架内，则跳出框架 */
    top.location = self.location;
}


</script>
</body>
</html>