<?php
namespace Manager\Controller;
use Think\Controller;

class IndexController extends BokeController {
	/***
		     *  desc    首页
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function index() {
		$groupid = M("admin")->where("id = '{$this->MyId}' ")->getField("group");
		$actionid = M("admin_group")->where("isdel = 0 and id = '{$groupid}' ")->getField("rules");

		if ($this->MyId > 1) {
			$where = "isdel=0 and id IN({$actionid})";
		} else {
			$where = "isdel=0";
		}

		$this->actionList = genTree(M('admin_action')->where($where)->select());
		$this->display();
	}

}