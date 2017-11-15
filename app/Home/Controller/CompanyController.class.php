<?php
namespace Home\Controller;
use Think\Controller;

class CompanyController extends BokeController {

	public function news() {

		// $type  = D("Index")->add_visit_info();
		$id = $_GET['id'];
		if ($id == "") {
			$id = 19;
		}
		$where['cid'] = $id;
		$where['type'] = 1;
		$rs = M('article')->where($where)->order('istop desc,createtime desc')->select();
		$this->assign('list', $rs);
		$this->assign('id', $id);
		$this->display();

	}
	public function newspage() {
		$a_id = $_GET['a_id'];
		$rs = M('article')->where('a_id=' . $a_id)->find();
		$data['clicknum'] = $rs['clicknum'] + 1;
		$rt = M('article')->where('a_id=' . $a_id)->save($data);
		$this->assign('list', $rs);
		$this->display();

	}

}
