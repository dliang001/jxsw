<?php if (!defined('THINK_PATH')) exit();?>		<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <!DOCTYPE html>
<html lang="zh-cn">

<head>
    <link rel="stylesheet" href="<?php echo (BOKE_STATIC_PATH); ?>/manager/css/pintuer.css">
    <link rel="stylesheet" href="<?php echo (BOKE_STATIC_PATH); ?>/manager/css/admin.css">
    <script src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/common.js"></script>
    <script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/layer/layer.js"></script>
    <script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/select.js"></script>
</head>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="<?php echo (BOKE_STATIC_PATH); ?>/manager/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" /><?php echo ($_SESSION['admin']['username']); ?> 后台管理中心</h1>
  </div>
  <div class="head-l">
  <a class="button button-little bg-green" href="/Index" target="_blank"><span class="icon-home"></span> 前台首页</a>
   &nbsp;&nbsp;<a href="JavaScript:void(0);" onclick="qccache();" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> 
   &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo U('Public/logout');?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<script type="text/javascript">
  
// 清除缓存
function qccache(){
  var id = 1;
  layer.confirm('确认要清除缓存？', {icon: 3, title:''}, function(index){
      $.post(
            '<?php echo U("Public/usecache");?>',{id:id},
            function(rs)
            {
                if (rs ==1)
                {
                    layer.msg("清除缓存成功！");
                     setTimeout(function(){window.location.reload();},1000);
                }else{
                    layer.msg("没有数据缓存可以清理！");

                }
            },'json'
          );
    });
 } 
</script>
		<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>

     <?php if(is_array($actionList)): foreach($actionList as $key=>$vo): ?><h2><span class="icon-<?php echo ($vo["ico"]); ?>"></span><?php echo ($vo["name"]); ?></h2>
           <ul >
               <?php if(is_array($vo['child'])): foreach($vo['child'] as $key=>$c): ?><li><a href="/boke/manager.php/<?php echo ($c['url']); ?>" target="right"><span class="icon-caret-right"></span><?php echo ($c["name"]); ?></a></li><?php endforeach; endif; ?>

           </ul><?php endforeach; endif; ?>

 
 
 
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="<?php echo U('Index/info');?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <!-- <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li> -->
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo U('Admin/index');?>" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
</div>
</body>
</html>