<?php
namespace Manager\Controller;
use Think\Controller;

class PublicController extends Controller {
	/***
		 *	Author	yaopengtao
		 *	web		www.t28.cn
		 *	Date	2016-10-13
	*/
	public function login() {
		$this->display();
	}

	/***
		 *	Author	yaopengtao
		 *	web		www.lizongyang.cn
		 *	Date	2016-10-13
	*/
	public function dologin() {

		$post = I("post.");
		//验证账号密码
		$info = M('admin')->where(array(
			'username' => $post['username'],
			'password' => md5Sign($post['password']),
		))->find();

		if ($info['locked']) {
			$this->error("您的账号已被锁定，请联系管理员~");
		}

		if ($info) {
			unset($info['password']);
			//保存会话
			session('admin', $info);
			$this->redirect("Manager/Index/index");
		} else {
			$this->error("您输入的账号或密码有误~");
		}
	}

	/***
		     *  Author  yaopengtao
		     *  web     www.lizongyang.cn
		     *  Date    2016-10-13
	*/
	public function logout() {
		session('admin', null);
		$this->redirect("Manager/Public/login");
	}

	/***
		     *  Author  yaopengtao
		     *  web     www.lizongyang.cn
		     *  Date    2016-10-13
	*/
	public function usecache() {
		$filename = "./app/Runtime/Temp/";
		delDirAndFile($filename);
		echo json_encode(1);

	}
}