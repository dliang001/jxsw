<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>嘉兴市原水投资有限公司</title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/boke/Public/css/bootstrap.min.css">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="/boke/Public/css/hero-slider-style.css">
    <!-- Hero slider style (https://codyhouse.co/gem/hero-slider/) -->
    <link rel="stylesheet" href="/boke/Public/css/magnific-popup.css">
    <!-- Magnific popup style (http://dimsemenov.com/plugins/magnific-popup/) -->
    <link rel="stylesheet" href="/boke/Public/css/templatemo-style.css">
    <!-- Templatemo style -->
    <link rel="stylesheet" type="text/css" href="/boke/Public/css/style.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

<body>
    <div id="top_txt" class="top_txt">
        <ul>
            <li>
                <p>欢迎访问嘉兴市原水投资有限公司！</p>
            </li>
        </ul>
    </div>
    <div class="ys_head"><img src="/boke/Public/img/head.jpg">
        <div class="search">
            <form method="get" action=" <?php echo U('index/index');?>">
                <span class="s_con"><input type="text" name="qstr" value="<?php echo ($qstr); ?>" placeholder="请输入搜索内容"></span>
                <button class="btn btn-success btn-lg" style="height: 30px;width: 20%;line-height: 30px;padding: 0;border-radius: 0;">搜索</button>
            </form>
        </div>
    </div>
    <!-- Content -->
    <div class="cd-hero">
        <!-- Navigation -->
        <div class="cd-slider-nav">
            <nav class="navbar">
                <div class="tm-navbar-bg">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                        &#9776;
                    </button>
                    <div class="collapse navbar-toggleable-md text-xs-center text-uppercase tm-navbar" id="tmNavbar">
                        <ul class="nav navbar-nav">
                            <li class="nav-item active selected">
                                <a class="nav-link" href="<?php echo U('index/index');?>" data-no="1">网站首页 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo U('index/about');?>" data-no="2">公司概况</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo U('company/news');?>" " data-no="3 ">公司动态</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="<?php echo U( 'index/partyBuilding');?> " data-no="4 ">党建动态</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="<?php echo U( 'index/engineering');?> " data-no="5 ">工程动态</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="<?php echo U( 'index/personnel');?> " data-no="6 ">人事信息</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="<?php echo U( 'index/contactus');?> " data-no="6 ">联系我们</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- .cd-hero -->
    <div class="ys_banner "><img src="/boke/Public/img/slide1.jpg "></div>
    <section class="warp1250 ">
       
                            <?php if($qstr == '' ): ?><section class="content_1 ">
            <section class="warp560 ">
                <p class="ys_more ">最新动态<b>NEW</b><a href="<?php echo U( 'company/news');?> ">More</a></p>
                <img src="/boke/Public/img/tiao.jpg ">
                <ul class="ys_list ">
                     <?php if(is_array($rets )): $i = 0; $__LIST__ = $rets ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs ): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U( 'company/newspage',array( 'a_id'=>$vs['a_id']));?> "><?php echo ($vs['title']); ?><span style="float: right;"><?php echo ($vs['time']); ?></span></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        </section>
                        <section class="warp560" style="float: right;margin-right: 15px;">
                            <p class="ys_more">公告公示<b>NEW</b><a href="<?php echo U('company/news',array('id'=>21));?>">More</a></p>
                            <img src="/boke/Public/img/tiao.jpg">
                            <ul class="ys_list">
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('company/newspage',array('a_id'=>$vo['a_id']));?> "><?php echo ($vo['title']); ?><span style="float: right;"><?php echo ($vo['time']); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </section>
                        </section>
                        <section class="content_2">
                            <div class="">
                                <img src="/boke/Public/img/shadow.jpg" style="padding-top: 30px">
                            </div>
                            <section>
                                <div class="imgNews"><img src="/boke/Public/img/imgNews.jpg" style=""></div>
                                <div id="div1">
                                    <ul>
                                        <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                                <a href="<?php echo U('company/newspage',array('a_id'=>$v['a_id']));?>"><img style="width: 100px; height: 100px;" src="/boke/Uploads/<?php echo ($v['imgurl']); ?>" />
                                                <p><?php echo ($v['title']); ?></p>
                                                </a>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div>
                            </section>
                            <?php else: ?>
                             <section class="warp1250" style=" margin-right: 300px;text-align: center;margin: 0 auto">
                            <p class="ys_more">搜索结果<b></b></p>
                            <img src="/boke/Public/img/tiao.jpg">
                            <ul class="ys_list" style="margin: 0;text-align: left;">
                                     <?php if(is_array($lt)): $i = 0; $__LIST__ = $lt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="text-align: left;border-bottom: 1px dashed #ccc;padding: 0 150px"><a href="<?php echo U('company/newspage',array('a_id'=>$vo['a_id']));?> "><?php echo ($vo['title']); ?><span style="float: right;text-align: right;"><?php echo ($vo['time']); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </section><?php endif; ?>
                            <ul class="friendly">
                                <li><a href="http://www.jiaxing.gov.cn" target="_blank"><img src="/boke/Public/img/001.jpg"></a></li>
                                <li><a href="http://www.jxgz.gov.cn" target="_blank"><img src="/boke/Public/img/002.jpg"></a></li>
                                <li><a href="http://www.jxwater.gov.cn" target="_blank"><img src="/boke/Public/img/002-1.jpg"></a></li>
                                <li><a href="http://www.jxdrc.gov.cn" target="_blank"><img src="/boke/Public/img/002-2.jpg"></a></li>
                                <li><a href="http://www.jxswjt.com" target="_blank"><img src="/boke/Public/img/003.jpg"></a></li>
                                <li><a href="http://jxrb.cnjxol.com" target="_blank"><img src="/boke/Public/img/004.jpg"></a></li>
                            </ul>
                        </section>
                        </section>
                        <!-- 底部 -->
                        <footer id="footer_area" class="ys_foot">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2" id="ys_cord" style="text-align: center;">
                                        <div class="company_logo wow slideInDown">
                                            <div><img src="/boke/Public/img/qcode.jpg"></div>
                                            <h2 style="margin-top: 10px">手机扫描访问</h2>
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="company_address wow slideInDown">
                                            <p>网站导航：<a href="<?php echo U('index/index');?>">首页</a>-<a href="<?php echo U('index/about');?>">公司概况</a>-<a href="<?php echo U('company/news');?>">公司动态</a>-<a href="<?php echo U( 'index/partyBuilding');?>">党建动态</a>-<a href="<?php echo U( 'index/engineering');?>">工程动态</a>-<a href="<?php echo U( 'index/personnel');?> ">人事信息</a>-<a href="<?php echo U( 'index/contactus');?>">联系我们</a></p>
                                            <p>嘉兴市原水投资有限公司</p>
                                            <p>地址：嘉兴市洪兴路875号兴禺大厦8F</p>
                                            <p>电话：0573-82815976</p>
                                            <p>传真：0573-82815976</p>
                                            <p>邮箱：master@jxrawwarter.com</p>
                                            <p>CopyRight © 2017 嘉兴市原水投资有限公司 版权所有 All Rights Reserved.浙ICP备23514871号  建议使用IE8.0以上浏览器，屏幕分辨率1440*900以上显示器访问本网站
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <script src="/boke/Public/js/jquery-1.11.3.min.js"></script>
                        <!-- jQuery (https://jquery.com/download/) -->
                        <script src="/boke/Public/js/tether.min.js"></script>
                        <!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
                        <script src="/boke/Public/js/bootstrap.min.js"></script>
                        <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
                        <script src="/boke/Public/js/hero-slider-main.js"></script>
                        <!-- Hero slider (https://codyhouse.co/gem/hero-slider/) -->
                        <script src="/boke/Public/js/jquery.magnific-popup.min.js"></script>
                        <!-- Magnific popup (http://dimsemenov.com/plugins/magnific-popup/) -->
                        <!-- search -->
                        <script type="text/javascript">
                        $('.content').on('keyup', function() {
                            $('.clear').show();
                        });
                        $('.clear').click(function() {
                            $('.content').val('');
                        });
                        </script>
                        <script>
                        function adjustHeightOfPage(pageNo) {

                            var offset = 80;
                            var pageContentHeight = 0;

                            var pageType = $('div[data-page-no="' + pageNo + '"]').data("page-type");

                            if (pageType != undefined && pageType == "gallery") {
                                pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .tm-img-gallery-container").height();
                            } else {
                                pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height();
                            }

                            if ($(window).width() >= 992) { offset = 120; } else if ($(window).width() < 480) { offset = 40; }

                            // Get the page height
                            var totalPageHeight = 15 + $('.cd-slider-nav').height() +
                                pageContentHeight + offset +
                                $('.tm-footer').height();

                            // Adjust layout based on page height and window height
                            if (totalPageHeight > $(window).height()) {
                                $('.cd-hero-slider').addClass('small-screen');
                                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
                            } else {
                                $('.cd-hero-slider').removeClass('small-screen');
                                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
                            }
                        }
                        </script>
                        <!-- 轮播图 -->
                        <script>
                        window.onload = function() {
                            var oDiv = document.getElementById('div1');
                            var oUl = oDiv.getElementsByTagName('ul')[0];
                            var aLi = oUl.getElementsByTagName('li');
                            var speed = -2;

                            oUl.innerHTML = oUl.innerHTML + oUl.innerHTML;
                            oUl.style.width = aLi[0].offsetWidth * aLi.length + 'px';

                            function move() { //无缝滚动
                                if (oUl.offsetLeft < -oUl.offsetWidth / 2) {
                                    oUl.style.left = '0';
                                }
                                if (oUl.offsetLeft > 0) {
                                    oUl.style.left = -oUl.offsetWidth / 2 + 'px';
                                }
                                oUl.style.left = oUl.offsetLeft + speed + 'px';
                            };

                            var otime = setInterval(move, 30);
                            oDiv.onmouseover = function() {
                                clearInterval(otime); //鼠标移入静止
                            };
                            oDiv.onmouseout = function() {
                                otime = setInterval(move, 30); //鼠标移除移动
                            }

                        };
                        </script>
</body>

</html>