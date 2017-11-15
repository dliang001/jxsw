<?php
namespace Home\Controller;
require_once "./QL/vendor/autoload.php";
use Think\Controller;
use QL\QueryList;

class PublicController extends Controller {

	// Public function deta(){
	// 	$url = "http://mp.weixin.qq.com/s?__biz=MjM1ODIzNTU2MQ==&mid=2659248622&idx=2&sn=2e8c50ba8e9c5bbb9237bdf113742c6c&chksm=bfc46f2888b3e63e1bf83c8d83691db65d9dcf816eeb887dc621f43b7b065c037638173f6502&scene=0#rd";
	// 	$reg = array("data"=>array(".rich_media_content p",'html'));
	// 	$rang = "";
	// 	// QueryList::Query($page,array $rules, $range = ‘’, $outputEncoding = null, $inputEncoding = null,$removeHead = false)
	// 	// $data = QueryList::Query('http://yusi123.com/web/seo',array('image' => array('img','src')  ))->data;
	// 	$datalist = QueryList::Query($url,$reg,$rang,'','');
	// 	dump($datalist->data);
	// }




	Public function qlist(){
		$p = dump($_GET['p']);
		$cid = 21;
		$rand = rand(50,100);
		//采集某页面所有的图片
		$url = "http://www.liqingbo.cn/category/31/".$p."";
		$reg = array("url"=>array(".post-title a",'href'),"title"=>array(".post-title",'text'),'pic'=>array('.post-thumb img','src'),'desc'=>array('.post-entry p','text'));
		$rang = "";
		// QueryList::Query($page,array $rules, $range = ‘’, $outputEncoding = null, $inputEncoding = null,$removeHead = false)
		// $data = QueryList::Query('http://yusi123.com/web/seo',array('image' => array('img','src')  ))->data;
		$datalist = QueryList::Query($url,$reg,$rang,'','');

		//打印结果
		foreach ($datalist->data as $key => $value) {
			$clasreg = array('content'=>array(".post-entry",'html'));
			$rangclass = "";
			// echo file_get_content($value['pic']);
    		if($value['title']){
				$content = QueryList::Query($value['url'],$clasreg,$rangclass,'','');
				foreach ($content->data as $k => $v) {

					# code...
					// $studate = str_replace("所属分类","",$v);
					// $studate = str_replace("浏览","",$v);
					// $studate = str_replace("发布时间","",$v);
				 $cond = $v['content'];

					
				}

    	
    		}

			// $image 	 = file_get_contents($value['pic']);
			// file_put_contents('./uploads/assets/img/image'.$key.$rand.'.jpg', $image); 

	        // $domain  = "http://" . $_SERVER['SERVER_NAME'] .":". $_SERVER["SERVER_PORT"] . __ROOT__;
	    		if($value['title']){
	    // 			    $assetid = M('Assets')->add(array(
					// 'domain'      => $domain,
					// 'savepath'    => 'assets/img/',
					// 'savename' 	  => 'image'.$key.$rand.'.jpg',
					// 'createtime'  => date("Y-m-d H:i:s"),
			  //      	));

					
			        $res = M("article")->add(array(
				        	'title' 	  => $value['title'],	
				        	'desc'		  => $value['desc'],	
				        	'cid' 		  => $cid,
				        	'content' 		  => $cond,
				        	'createtime'  => date("Y-m-d H:i:s"),	
			        ));
	
	    		}
	    
	        echo $res;

			
		}

	
	}







		// $cid = 5;
		// $rand = rand(50,100);
		// //采集某页面所有的图片
		// $url = "http://yusi123.com/share";
		// $reg = array("url"=>array(".focus a",'href'),"title"=>array(".excerpt h2",'text'),'pic'=>array('.excerpt img','src'),'desc'=>array('.excerpt .note','text'));
		// $rang = "";
		// // QueryList::Query($page,array $rules, $range = ‘’, $outputEncoding = null, $inputEncoding = null,$removeHead = false)
		// // $data = QueryList::Query('http://yusi123.com/web/seo',array('image' => array('img','src')  ))->data;
		// $datalist = QueryList::Query($url,$reg,$rang,'','');
		// //打印结果
		// foreach ($datalist->data as $key => $value) {
			
		// 	$clasreg = array('content'=>array(".article-content",'html'));
		// 	$rangclass = "";

		// 	// echo file_get_content($value['pic']);
		// 	$content = QueryList::Query($value['url'],$clasreg,$rangclass,'','');
		// 	foreach ($content->data as $k => $v) {

		// 		# code...
		// 		$studate = str_replace("欲思","李洋",$v);
		// 		$cond = $studate['content'];

				
		// 	}


		// 	$image 	 = file_get_contents($value['pic']);
		// 	file_put_contents('./uploads/assets/img/image'.$key.$rand.'.jpg', $image); 
	 //        $domain  = "http://" . $_SERVER['SERVER_NAME'] .":". $_SERVER["SERVER_PORT"] . __ROOT__;
	 //        $assetid = M('Assets')->add(array(
		// 			'domain'      => $domain,
		// 			'savepath'    => 'assets/img/',
		// 			'savename' 	  => 'image'.$key.$rand.'.jpg',
		// 			'createtime'  => date("Y-m-d H:i:s"),
	 //       	));
			
	 //        $res = M("article")->add(array(
		//         	'title' 	  => $value['title'],	
		//         	'desc'		  => $value['desc'],	
		//         	'pic' 		  => $assetid,	
		//         	'cid' 		  => $cid,
		//         	'content' 		  => $cond,
		//         	'createtime'  => date("Y-m-d H:i:s"),	
	 //        ));

	 //        echo $res;

			
		// }






	function getHtml($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_REFERER, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
	}



















	/***
	 *	Author	yaopengtao
	 *	desc	网站留言(一分钟之内不能重复提交)
	 *	web		www.t28.cn
	 *	Date	2016-10-18
	 ***/
	public function add_message()
	{
		$post = I('post.');

		if ($post['content'] == '')
		{
			$this->ajaxReturn(array('msg'=>'留言内容不能为空','code'=>0), 'JSON', true);
		}

		//根据ip地址检测一分钟之内提交
		if (M('message')->where("ip = '".get_client_ip()."' and create_time > '".date('Y-m-d H:i:s', time()-60)."' ")->getField("id"))
		{
			$this->ajaxReturn(array('msg'=>'Sorry, 您的留言太频繁, 请稍等1分钟后再留言~','code'=>0), 'JSON', true);
		}

		$rs = M('message')->add(array(
			'realname' => trim($post['realname']),
			'email'    => trim($post['email']),
			'content'  => trim($post['content']),
			'ip' 	   => get_client_ip(),
			'create_time'=> date('Y-m-d H:i:s'),
			'page_url'   => $_SERVER['HTTP_REFERER'],
			'user_id'    => $post['user_id'] ? $post['user_id'] : 1,
		));

		$this->ajaxReturn(array('msg'=>'留言成功, 感谢您的关注!','code'=>200), 'JSON', true);
	}

	/***
	 *	Author	yaopengtao
	 *	desc	注册页面
	 *	web		www.t28.cn
	 *	Date	2016-10-18
	 ***/
	public function reg()
	{
		$this->display(Template.'/Index/reg');
	}

	/***
	 *	Author	yaopengtao
	 *	desc	注册账号
	 *	web		www.t28.cn
	 *	Date	2016-10-18
	 ***/
	public function add_reg()
	{
		$username = I('post.username', '', 'trim');
		$password = I('post.password', '', 'trim');
		$email    = I('post.email', '', 'trim');
		$vcode    = I('post.vcode', '', 'trim');

		if (!check_verify($vcode))
		{
			$this->ajaxReturn(array('msg'=>'验证码不正确','val'=>strip_tags($username),'code'=>0 ));die;
		}


		$rs = M('admin')->add(array(
			'realname' => '新用户',
			'username' => $username,
			'password' => md5Sign($password),
			'email'    => $email,
			'create_time' => date('Y-m-d H:i:s'),
			'reg_ip'   => get_client_ip(),
		));
		if ($rs)
		{
			//注册成功发送邮件
			// ....

			$this->ajaxReturn(array('msg'=>'注册成功','val'=>'','code'=>200 ));die;
		}
	}

	/***
	 *	Author	yaopengtao
	 *	desc	验证码
	 *	web		www.t28.cn
	 *	Date	2016-10-18
	 ***/
	public function vcode()
	{
		$Verify = new \Think\Verify();
		$Verify->fontSize = 30;
		$Verify->length   = 3;
		$Verify->useNoise = false;
		$Verify->entry();
	}

	/***
     *  Author  yaopengtao
     *  desc    检测域名是否已经添加过
     *  web     www.t28.cn
     *  Date    2016-10-13
     ***/
    public function check_username()
    {
        if (IS_AJAX)
        {
            $username = I("post.username", '', 'trim');

            if(!preg_match("/^[0-9a-z]{1,16}$/",$username))
            {
            	$this->ajaxReturn(array('msg'=>'用户名不合法, 仅限长度1-16位字母或数字!', 'val'=>''), 'JSON', true);die;
            }
            $exists = M('username')->where(array('username'=>$username))->getField("id");

            if ($exists)
            {
				$this->ajaxReturn(array('msg'=>'用户名已存在!', 'val'=>''), 'JSON', true);die;
            }
            $this->ajaxReturn(array('msg'=>'','val'=>strip_tags($username) ));die;
        }
    }
}