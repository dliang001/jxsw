<?php
namespace Manager\Controller;
use Think\Controller;

class PersonController extends BokeController {

	/***
		     *  desc    文章列表
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function index() {
		// 赋值分页输出
		//dump($list);die;
		$this->display(); // 输出模板
	}

}