<?php
namespace Manager\Controller;
require_once "./QL/vendor/autoload.php";
use Think\Controller;
use QL\QueryList;


class CollectionController extends Controller {

    Public function index(){
        $data = M("collect")->where("isdel = 0")->select();
        foreach ($data as $key => $value) {
            $data[$key]['cname'] = M("cate")->where("id = {$value['cid']}")->getField("name");
            # code...
        }
        $this->list = $data;
        $this->display();
    }
    /**
     *   desc   php函数采集
     *   Email  lizongyang
     *   Date   2016-12-8 
     */
    Public function phphanshu(){
        set_time_limit(180);
        //得到最高的页数和现在跑到的页数
        $page = !empty($_GET['page']) ? intval($_GET['page']) : 1;
        $cid = $_GET['cid'];
        //随机参数
        $rand = rand(50,100);
        //采集列表url
        $url = "http://www.liqingbo.cn/category/34/{$page}.html";
        $reg = array(
            "url"=>array(".post-title a",'href'),
            "title"=>array(".post-title",'text'),
            'pic'=>array('.post-thumb img','src'),
            'desc'=>array('.post-entry p','text')
            );
        $rang = "";
        // brush:php;
        $datalist = QueryList::Query($url,$reg,$rang,'','');
        //循环处理数据
        foreach ($datalist->data as $key => $value){
            $clasreg = array('content'=>array(".post-entry",'html','-.post-title -.post-date -a href br'));
            $rangclass = "";
            // echo file_get_content($value['pic']);
            if($value['title']){
                $content = QueryList::Query($value['url'],$clasreg,$rangclass,'','');
                
                $cond = str_replace('相关函数：','',$content->data[0]['content']);
                
            }



           // $image    = file_get_contents($value['pic']);
            // 、、将详情页图片保存到本地
            // $listarr=explode("/",$value['pic']);//字符串转数组
            // $piclistend = end($listarr);//取最后一个数组 
            
            // file_put_contents('./uploads/assets/img/image'.$key.$rand.$piclistend, $image); 
            // $domain  = "http://" . $_SERVER['SERVER_NAME'] .":". $_SERVER["SERVER_PORT"] . __ROOT__;
                if($value['title']){
                    // $assetid = M('Assets')->add(array(
                        // 'domain'      => $domain,
                        // 'savepath'    => 'assets/img/',
                        // 'savename'    => 'image'.$key.$rand.$piclistend,
                        // 'createtime'  => date("Y-m-d H:i:s"),
                    // ));
                    $res = M("article")->add(array(
                            'title'       => $value['title'],   
                            'desc'        => $value['desc'],    
                            'cid'         => $cid,
                            'content'     => $cond,
                            'pic'         => 34,
                            'createtime'  => date("Y-m-d H:i:s"),   
                    ));
                }

        }
        // 最大页数
        $max_page = $_GET['max_page'];
        // 分类id
        $cid = $_GET['cid'];
        echo "<br/>";
        echo 'php函数列表第'.$page.'页，采集完毕！';
        $num = $page * $max_page;
        echo "<hr/>";

        if($page ==$max_page){
        echo $page."页数据，全部采集完毕";exit();
        }
        echo '<script>window.location="/manager.php/Collection/phphanshu?page='.($page+1).'&max_page='.$max_page.'&cid='.$cid.'"</script>';



    }


    /**
     *   desc   趣味图片列表抓取
     *   Email  lizongyang
     *   Date   2016-12-8 
     */
    Public function qvimg(){
        set_time_limit(180);
        //得到最高的页数和现在跑到的页数
        $page = !empty($_GET['page']) ? intval($_GET['page']) : 1;

        $cid = $_GET['cid'];
        //随机参数
        $rand = rand(50,100);
        //采集列表url
        $url = "http://www.dsuu.cc/quwei-category/pic/page/{$page}";
        // 规则
        $reg = array(
            "url"   =>array(".dd a",'href'),
            "title" =>array(".postbox h2 a",'text'),
            'pic'   =>array('.dd a img','data-original'),
            'desc'  =>array('.entry-content','text'));
        $rang = "";
        $datalist = QueryList::Query($url,$reg,$rang,'','');
        //循环处理数据
        foreach ($datalist->data as $key => $value){
            $cond = $this->qvdetaimg($value['url']); //调取详情页图片
            $image   = file_get_contents($value['pic']);
            //将详情页图片保存到本地
            $listarr=explode("/",$value['pic']);//字符串转数组
            $piclistend = end($listarr);//取最后一个数组 
            file_put_contents('./uploads/assets/img/image'.$key.$rand.$piclistend, $image); 
            $domain  = "http://" . $_SERVER['SERVER_NAME'] .":". $_SERVER["SERVER_PORT"] . __ROOT__;
            if($value['title']){
                $assetid = M('Assets')->add(array(
                    'domain'      => $domain,
                    'savepath'    => 'assets/img/',
                    'savename'    => 'image'.$key.$rand.$piclistend,
                    'createtime'  => date("Y-m-d H:i:s"),
                ));
                $res = M("article")->add(array(
                        'title'       => $value['title'],   
                        'desc'        => $value['desc'],    
                        'cid'         => $cid,
                        'content'     => $cond,
                        'pic'         => $assetid,
                        'createtime'  => date("Y-m-d H:i:s"),   
                ));
            }
        }
         // 最大页数
        $max_page = $_GET['max_page'];
        // 分类id
        $cid = $_GET['cid'];
        echo "<br/>";
        echo '趣味列表第'.$page.'页，采集完毕！';
        $num = $page * $max_page;
        echo "<hr/>";
        if($page ==$max_page){
        echo $page."页数据，全部采集完毕，共计！".$num.'条！';exit();
        }
        echo '<script>window.location="/manager.php/Collection/qvimg?page='.($page+1).'&max_page='.$max_page.'&cid='.$cid.'"</script>';
    }



    /**
     *   desc   优酷搞笑视频锦囊
     *   Email  lizongyang
     *   Date   2016-12-8 
     */
    Public function gxvideo(){
        set_time_limit(180);
        //得到最高的页数和现在跑到的页数
        $page = !empty($_GET['page']) ? intval($_GET['page']) : 1;

        $cid = $_GET['cid'];
        //随机参数
        $rand = rand(50,100);
        //采集列表url
        // 1搞笑人物 2雷人动物3恶搞短片4雷人广告5趣味视频6养眼视频7重口味视频
        // $url = "http://www.dsuu.cc/quwei-category/pic/page/{$page}";
        $url = "http://www.soku.com/search_video/q_%E6%90%9E%E7%AC%91%E8%A7%86%E9%A2%91%E9%9B%86%E9%94%A6_orderby_1_limitdate_0?site=14&page={$page}&spm=a2h0k.8191407.0.0";
        // 规则
        $reg = array(
            "url"   =>array(".v-link a",'href'),
            "title" =>array(".v-meta-title a",'title'),
            'pic'   =>array('.v-thumb img','src'),
            );
        $rang = "";
        $datalist = QueryList::Query($url,$reg,$rang,'','');
        //循环处理数据
        foreach ($datalist->data as $key => $value){
            //抓取视频url
            $clasreg = array(
                'videourl'=>array(".form_input_s ",'value'),
                );
            $rangclass = "";
            //必须列表标题存在 才执行抓取详情
            if($value['title']){
                //抓取详情内容
                $content = QueryList::Query($value['url'],$clasreg,$rangclass,'','');
                foreach ($content->data as $k => $v) {
                      //抓取视频url
                    $clasreg = array(
                    'videourl'=>array("iframe",'src'),
                    ); 

                    $yankee = QueryList::Query($v['videourl'],$clasreg,$rangclass,'','');
                    $cond[$k]['yankee'] = $yankee->data[0]['videourl'];

                }
            }
            $image   = file_get_contents($value['pic']);
            //将详情页图片保存到本地
            $listarr=explode("/",$value['pic']);//字符串转数组
            $piclistend = end($listarr);//取最后一个数组 
            file_put_contents('./uploads/assets/video/image'.$key.$rand.$piclistend, $image); 
            $domain  = "http://" . $_SERVER['SERVER_NAME'] .":". $_SERVER["SERVER_PORT"] . __ROOT__;
            if($value['title']){
                $assetid = M('Assets')->add(array(
                    'domain'      => $domain,
                    'savepath'    => 'assets/video/',
                    'savename'    => 'image'.$key.$rand.$piclistend,
                    'createtime'  => date("Y-m-d H:i:s"),
                ));
                $res = M("article")->add(array(
                        'title'       => $value['title'],   
                        'cid'         => $cid,
                        'videourl'     => $cond[0]['yankee'],
                        'pic'         => $assetid,
                        'createtime'  => date("Y-m-d H:i:s"),   
                ));
            }
        }
         // 最大页数
        $max_page = $_GET['max_page'];
        // 分类id
        $cid = $_GET['cid'];
        echo "<br/>";
        echo '优酷搞笑视频锦囊列表第'.$page.'页，采集完毕！';
        if($max_page ==1){
            $num = $page * 10;
        }else{
            $num = $page * $max_page;
        }
        echo "<hr/>";
        if($page ==$max_page){
        echo $page."页数据，全部采集完毕，共计！".$num.'条！';exit();
        }
        echo '<script>window.location="/manager.php/Collection/gxvideo?page='.($page+1).'&max_page='.$max_page.'&cid='.$cid.'"</script>';
    }



    /**
     *   desc   趣味图片详情页方法
     *   Email  lizongyang
     *   Date   2016-12-8 
     */
    Public function qvdetaimg($url){
             // $url = "http://www.dsuu.cc/quwei-43790.html";
        $clasreg = array(
                // 内容过滤手册https://doc.querylist.cc/site/index/doc/23
                'content'=>array(".content ",'html','-noscript -.source -.bdggcb'),
                'detapic'=>array(".content p img",'data-original'),
                //需要替换的
                'picsrc'=>array(".content p img",'src'),
                'alt'=>array(".content p img",'alt'),
                );
            $rangclass = "";
            //抓取详情内容
            $content = QueryList::Query($url,$clasreg,$rangclass,'','');
                $_pic_map=array("src"   => [],'local' => [], );
            // 循环处理详情数据
            foreach ($content->data as $k => $v) {  
                    //截取？后面的附加数据
                    $arr=explode("?",$v['detapic']);
                    $imgend = $arr[0];
                    # code...
                    //将详情页图片保存到本地
                    $arr=explode("/",$arr[0]);//字符串转数组
                    $picend = end($arr);//取最后一个数组 
                    //保存图片到本地
                    $detaimage   = file_get_contents($imgend);
                    file_put_contents('./uploads/assets/img/image'.$picend, $detaimage); 
                    $domain  = "http://" . $_SERVER['SERVER_NAME'] .":". $_SERVER["SERVER_PORT"] . __ROOT__;
                    //新的图片路径
                    $newpic = $domain.'/uploads/assets/img/image'.$picend;
                    $_pic_map["src"][]   = htmlentities($v['detapic']);
                    $_pic_map["local"][] = $newpic ;
                    $content->data[$k]['content'] = str_replace('data-original','src',$v['content']);
            }
                // 批量替换 全部的 图片 为本地图片
                //src="http://www.dsuu.cc/wp-content/themes/dsuu/images/grey.gif" 
                $content->data[0]['content'] = str_replace('src="http://www.dsuu.cc/wp-content/themes/dsuu/images/grey.gif"', '', $content->data[0]['content']);
                return $cond = str_replace($_pic_map["src"],$_pic_map["local"],$content->data[0]['content']);
                // dump($cond);
        }











    /**
     *   desc   趣味段子详情页信息
     *   Email  lizongyang
     *   Date   2016-12-8 
     */
    public function getDetaByListUrl($url){
        
        // $url = "http://www.dsuu.cc/quwei-42756.html";
        $clasreg = array(
                // 内容过滤手册https://doc.querylist.cc/site/index/doc/23
                'content'=>array(".content ",'html','-.bdggcb -.inserter-1  -.source -small'),
                'detapic'=>array(".content p img",'data-original'),
                //需要替换的
                'picsrc'=>array(".content p img",'src'),
                'alt'=>array(".content p img",'alt'),
                );
            $rangclass = "";
            //抓取详情内容
            $content = QueryList::Query($url,$clasreg,$rangclass,'','');
            // 循环处理详情数据
            foreach ($content->data as $k => $v) {
                    # code...
                    //将详情页图片保存到本地
                    $arr=explode("/",$v['detapic']);//字符串转数组
                    $picend = end($arr);//取最后一个数组 
                    //保存图片到本地
                    $detaimage   = file_get_contents($v['detapic']);
                    file_put_contents('./uploads/assets/img/image'.$k.$picend, $detaimage); 
                    $domain  = "http://" . $_SERVER['SERVER_NAME'] .":". $_SERVER["SERVER_PORT"] . __ROOT__;
                    //新的图片路径
                    $newpic = $domain.'/uploads/assets/img/image'.$k.$picend;
                    $v['content']= str_replace($v['detapic'],$newpic,$v['content']);
                    $v['content'] = str_replace($v['picsrc'],$newpic,$v['content']);
                    $v['content'] = str_replace($v['alt'],$value['title'],$v['content']);
                    // 返回数据
                    return $cond = $v['content'];
            }

    }
}	