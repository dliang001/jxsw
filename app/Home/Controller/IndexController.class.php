<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends BokeController {

	public function index() {
		$qstr = $_GET['qstr'] && trim($_GET['qstr']) ? trim($_GET['qstr']) : '';
		if ($qstr) {
			$whereStr = "title like '%" . $qstr . "%'";
			$lt = M('article')->where($whereStr)->order('istop desc,createtime desc')->select();
			for ($i = 0; $i < count($lt); $i++) {
				$lt[$i]['time'] = substr($lt[$i]['createtime'], 0, 10);
			}
			$this->assign('lt', $lt);
		}
		// dump($lt);die;
		/***
			     *  desc   首页公告公示
		*/
		$where['cid'] = 21;
		$where['type'] = 1;
		$where['isindex'] = 1;
		$rs = M('article')->where($where)->order('istop desc,createtime desc')->select();
		for ($i = 0; $i < count($rs); $i++) {
			$rs[$i]['time'] = substr($rs[$i]['createtime'], 0, 10);
		}
		$this->assign('list', $rs);
		/***
			     *  desc   首页最新动态
		*/
		$data['type'] = 1;
		$data['isindex'] = 1;
		$data['_string'] = "cid=19 or cid=20";
		$rets = M('article')->where($data)->order('istop desc,createtime desc')->limit(5)->select();
		for ($i = 0; $i < count($rets); $i++) {
			$rets[$i]['time'] = substr($rets[$i]['createtime'], 0, 10);
		}
		// dump($rets);die;
		$this->assign('rets', $rets);
		/***
			     *  desc   首页图片新闻
		*/
		$datas['cid'] = 19;
		$datas['type'] = 1;
		$datas['isindex'] = 1;
		$res = M('article')->where($datas)->order('createtime desc')->select();
		$this->assign('res', $res);
		$this->assign('qstr', $qstr);
		$this->display();

	}
	/***
		     *  desc    公司概况
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function about() {
		$id = $_GET['id'];
		if ($id == "") {
			$id = 22;
		}
		$rs = M('article')->where('cid=' . $id)->find();
		$data['clicknum'] = $rs['clicknum'] + 1;
		$rt = M('article')->where('cid=' . $id)->save($data);

		$this->assign('list', $rs);
		$this->assign('id', $id);
		$this->display();
	}
	/***
		     *  desc    党建动态
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function partyBuilding() {
		$rs = M('article')->where('cid=27')->find();
		$data['clicknum'] = $rs['clicknum'] + 1;
		$rt = M('article')->where('cid=27')->save($data);
		$this->assign('list', $rs);
		$this->display();
	}
	/***
		     *  desc    工程动态
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function engineering() {
		$rs = M('article')->where('cid=26')->find();
		$data['clicknum'] = $rs['clicknum'] + 1;
		$rt = M('article')->where('cid=26')->save($data);
		$this->assign('list', $rs);
		$this->display();
	}
	/***
		     *  desc    人事信息
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function personnel() {
		$rs = M('article')->where('cid=28')->find();
		$data['clicknum'] = $rs['clicknum'] + 1;
		$rt = M('article')->where('cid=28')->save($data);
		$this->assign('list', $rs);
		$this->display();
	}
	/***
		     *  desc    联系我们
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function contactus() {
		$rs = M('article')->where('cid=25')->find();
		$data['clicknum'] = $rs['clicknum'] + 1;
		$rt = M('article')->where('cid=25')->save($data);
		$this->assign('list', $rs);
		$this->display();
	}

}