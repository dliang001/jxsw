<?php if (!defined('THINK_PATH')) exit();?><!-- <link rel="stylesheet" type="text/css" href="<?php echo (BOKE_STATIC_PATH); ?>/home/default/css/bootstrap.min.css"> -->
<!DOCTYPE HTML><html>
<head>	
	<meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="baidu-site-verification" content="hyjVb0aEyU" /> <!--百度站长-->
	<link type="text/css" media="all" href="<?php echo (BOKE_STATIC_PATH); ?>/home/default/css/cssstyle.css" rel="stylesheet" />
	<title></title> 
    <script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/js/jquery.min.js"></script>

	<script type='text/javascript' src='<?php echo (BOKE_STATIC_PATH); ?>/home/default/js/jv.js'></script> 
		<!-- <script type='text/javascript' src='<?php echo (BOKE_STATIC_PATH); ?>/home/default/js/css.js'></script>  -->
	<link  href='wp-json/index.html' />
	<meta name="keywords" content="<?php echo ($setup['keyword']); ?>">
	<meta name="description" content="<?php echo ($setup['descript']); ?>">



    <link rel="stylesheet" href="<?php echo (BOKE_STATIC_PATH); ?>/home/default/css/templatemo-style.css"> 
    
     <style type="text/css">
     	.navbar .btn.screen-nav{
     		/*position: relative;*/
			/*float: right;*/
			padding: 6px 11px;
			margin-top: 8px;
			margin-right: 15px;
			margin-bottom: 8px;
			background-color: transparent;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
			border-color: #ddd;

     	}
     	.navbar .screen-mini .btn i{
     		background-color: #cdcdcd;
     	}
     </style>                             
 </head>

 <body class="home blog">
   
        
 	<header id="header" class="header">



		<div id="nav-header" class="navbar">
			<ul class="nav">
				<li <?php if(ACTION_NAME == 'index' || $ac_name == 'Deta' ): ?>style='background-color: #16a085;'<?php endif; ?> id="menu-item-3307" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-3307">		
					<a href="/index.html">首页</a>
				</li>


				<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><li  <?php if($v['id'] == $_GET['id']): ?>style='background-color: #16a085;'<?php endif; ?>  id="menu-item-3305" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-3305">
						<a href="/<?php echo bk_url('Index/catelist',array('id'=>$v['id']));?>"><?php echo ($v['name']); ?></a>
						

						<ul class="sub-menu">
							<?php if(is_array($v['child'])): foreach($v['child'] as $key=>$c): ?><li id="" class="menu-item "><a href="/<?php echo bk_url('Index/catelist',array('id'=>$c['id']));?>"><?php echo ($c['name']); ?></a></li><?php endforeach; endif; ?>
							
						</ul> 
					</li><?php endforeach; endif; ?>
				<li  id="menu-item-3307" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-3307">		
					<a target="_brank" href="http://www.7vz.cn/">趣味站</a>
				</li>>
				

				<li style="float:right;">
					<div class="toggle-search"><img src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/ss.png"></div>
					<div class="search-expand" style="display: none;">
						<div class="search-expand-inner">
							<form method="get" class="searchform themeform" action="/<?php echo bk_url('Index/search');?>" >
								<div > 
									<input type="text" class="search" name="t" placeholder='search...' value="">
								</div>
							</form>
						</div>
					</div>
				</li>
			</ul>
		</div>

		</div>
	</header>
 
<section class="container">
  <div class="speedbar">
    <div class="toptip"><strong class="text-success"><i class="fa fa-volume-up"></i> </strong></div>
  </div>
<div class="content-wrap">
  <div class="content">

    <header class="archive-header">
     <h1 ><i class="fa fa-folder-open"></i><span style="font-size: 19px;">搜索：<?php echo ($title); ?></span> 
     <div style="font-size: 17px;float: right;;"><span style="color: red;"><?php echo ($count); ?></span>条</div> </h1>
    </header>


  <?php if(is_array($list)): foreach($list as $key=>$v): if($v["title"]): ?><article class="excerpt">
              <header>
                <a class="label label-important" href="<?php echo bk_url('Index/catelist',array('id'=>$v['cid']));?>"><?php echo ($v['cname']); ?>
                  <i class="label-arrow"></i></a>
                
                <h2>
                  <a target="_blank" href="<?php echo bk_url('Index/deta',array('id'=>$v['id']));?>" title="<?php echo ($v['title']); ?>"><?php echo ($v['title']); ?></a></h2>
              </header>
              <div class="focus">
                <a target="_blank" href="<?php echo bk_url('Index/deta',array('id'=>$v['id']));?>">
                  <img style='height: 123px; width: 200px;'  class="thumb" src="<?php echo ($v['picurl'][0]['src']); ?>" alt="<?php echo ($v['title']); ?>" /></a>
              </div>
              <span class="note"><?php echo (msubstr($v['desc'],0,150)); ?></span>
              <p class="auth-span">
                <span class="muted">
                  发布时间：<?php echo ($v['createtime']); ?></span>
                <span class="muted">
                  热度：<?php echo ($v['viewnum']); ?>℃</span>
                <span class="muted">
                  <i class="fa fa-comments-o"></i>
                  <!-- <a target="_blank" href="">16评论</a></span> -->
                <!-- <span class="muted">
                  <a href="javascript:;" data-action="ding" data-id="3798" id="Addlike" class="action">
                    <i class="fa fa-heart-o"></i>
                    <span class="count">41</span>喜欢</a></span> -->
              </p>
           </article>
      <?php else: ?>
        <article class="excerpt">
              <header style="margin-left: 15px;">
                <h1 style="color: #ccc; font-size: 15px;">您搜索的 <span style="color: red;"><?php echo ($title); ?></span>没有数据！换个姿势搜搜吧！！😝😝😝😝~</h1>
              </header>
           </article><?php endif; endforeach; endif; ?>


  
  



<div class="pagination">
  <ul>
    <?php echo ($page); ?>
    
  </ul>

</div>
</div>
</div>
<aside class="sidebar">
  
  <div class="widget widget_text">
    <div class="textwidget">
      <div class="social">
        <a href="http://weibo.com/p/1005052173416805/home?from=page_100505&mod=TAB&is_all=1#place" rel="external nofollow" title="新浪微博" target="_blank">
          <img src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/xl.png">
        </a>
        <a href="http://t.qq.com/pop1638500136" rel="external nofollow" title="腾讯微博" target="_blank">
          <img   src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/tx.png">
        </a>
        <a class="weixin">
          <img src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/wx.png">
          <div class="weixin-popover">
            <div class="popover bottom in">
              <div class="arrow"></div>
              <div class="popover-title">订阅号-李宗洋</div>
              <div class="popover-content">
                <img  src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/wxx.png"></div>
            </div>
          </div>
        </a>
        <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=h7axtL_yt7e2tLHH9vap5Ojq" rel="external nofollow" title="Email" target="_blank">
          <img  width="45" src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/em.png">

         <!-- <img width="45" src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/em.png"></div> -->
        </a>
        <a href="" rel="external nofollow" title="联系QQ" target="_blank">
          <img  width="45" src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/qq.png">

         <!-- <img width="45" src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/em.png"></div> -->

        </a>
        <a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http%3A%2F%2Fwww.lizongyang.cn%2F&title=%E6%9D%8E%E5%AE%97%E6%B4%8B%E5%8D%9A%E5%AE%A2&pics=http%3A%2F%2Fwww.boke.com%2Fuploads%2Fassets%2F2016-11-07%2F58200f5eeedfc.jpg&summary=%E6%9D%8E%E5%AE%97%E6%B4%8B%E5%8D%9A%E5%AE%A2-%E5%85%B3%E6%B3%A8%E4%BA%8EPHP%2CLinix%2CPython%2CMySQL%2CJavascript%E6%8A%80%E6%9C%AF%E5%BC%80%E5%8F%91%EF%BC%8C%E5%88%86%E4%BA%AB%E5%AD%A6%E4%B9%A0%E4%B9%8B%E8%B7%AF%E4%B8%8A%E7%9A%84%E7%82%B9%E7%82%B9%E6%BB%B4%E6%BB%B4%E3%80%82" rel="external nofollow" target="_blank" title="QQ空间">

                <img width="45" src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/kj.png"></div>

         <!-- <img width="45" src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/em.png"></div> -->

        </a>
      </div>
    </div>
  </div>
  <div class="widget d_banner">
  <!-- 广告图 -->
    <!-- <div class="d_banner_inner">
      <a target="_blank" href="http://yusi123.com/go/201611">
        <img class="thumb" src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/img/10.png" alt="千万红包，等你来抢。"></a>
    </div> -->
  </div>
 <!--  <div class="widget d_subscribe">
    <div class="title">
      <h2>邮件订阅</h2></div>
    <form action=""  onsubmit="return dingyue();" method="post">
        <p>人生只剩下一场虚假的光阴，而你还在让剩下的光阴从指尖流逝，这是对世界的侮辱，自尊的践踏，也许你也就喜欢这样吧。</p>
        
      </form>
  </div> -->
  <div class="widget d_textbanner">
    <a class="style01" href="javascript:void(0);">
      <div class="title">
        <h2>免费下载</h2></div>
      <p>博客交流群：398954628</p>
    </a>
  </div>
  <!-- div class="widget d_banner">
  
    <div class="d_banner_inner">
      <script type="text/javascript">/*360*300，创建于2013-6-19*/
        var cpro_id = "u1305741";</script>
      <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
    </div>
  </div> -->
  <div class="widget d_tag">
    <div class="title">
      <h2>标签云</h2></div>
    <div class="d_tags">
    <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><a title="<?php echo ($v['artnum']); ?>个话题" href="/<?php echo bk_url('Index/catelist',array('id'=>$v['id']));?>"><?php echo ($v['name']); ?>(<?php echo ($v['artnum']); ?>)</a><?php endforeach; endif; ?>
  </div>

  <div class="widget d_postlist">
    <div class="title">
      <h2>猜你喜欢</h2></div>
    <ul>
    
    <?php if(is_array($randlist)): foreach($randlist as $key=>$v): ?><li>
          <a href="/<?php echo bk_url('Index/deta',array('id'=>$v['id']));?>" title="<?php echo ($v['title']); ?>">
            <span class="thumbnail">
              <img style='height: 60px;' src="<?php echo ($v['picurl'][0]['src']); ?>" alt="<?php echo ($v['title']); ?>" /></span>
            <span class="text"><?php echo ($v['title']); ?></span>
            <span class="muted"><?php echo ($v['createtime']); ?></span>
            <span class="muted" style="float: right;"><?php echo ($v['viewnum']); ?>℃</span></a>
        </li><?php endforeach; endif; ?>
    </ul>
  </div>
  

  <div class="widget widget_links">
    <div class="title">
      <h2>友情链接</h2></div>
    <ul class='xoxo blogroll'>
      <?php if(is_array($listyouqing)): foreach($listyouqing as $key=>$v): ?><li> <a target='_blank' href="<?php echo ($v['url']); ?>"><?php echo ($v['title']); ?></a></li><?php endforeach; endif; ?>
      
    </ul>
  </div>
</aside>



</section>
<footer class="footer">
	<div class="footer-inner">
		<div class="copyright pull-left">
			<?php echo ($setup['foot']); ?>
			<script src="<?php echo (BOKE_STATIC_PATH); ?>/home/default/js/jquery-1.11.3.min.js"></script>   
        <script>

            $(window).load(function(){

                $('body').addClass('loaded');
                           
            });

        </script>   
		
	</div>
</footer>
</body>

</html>