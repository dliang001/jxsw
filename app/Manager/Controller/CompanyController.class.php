<?php
namespace Manager\Controller;
use Think\Controller;

class CompanyController extends BokeController {

	/***
		     *  desc    文章列表
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function news() {
		$User = M('article'); // 实例化User对象
		$qstr = $_GET['qstr'] && trim($_GET['qstr']) ? trim($_GET['qstr']) : '';
		if (!empty($qstr)) {
			$whereStr = "title like '%" . $qstr . "%' or author like '%" . $qstr . "%'";
		}
		$where['cid'] = 19;
		if ($whereStr != "") {
			$where['_string'] = $whereStr;
		}
		// dump($qstr);die;
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取

		$count = $User->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->join('LEFT JOIN bk_cate on bk_article.cid=bk_cate.id')
			->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('createtime desc')->select();
		$catelist = M('cate')->select();
		$this->assign('cate', $cate);
		$this->assign('qstr', $qstr);
		$this->assign('catelist', $catelist);
		$this->assign('list', $list); // 赋值数据集
		$this->assign('Page', $show); // 赋值分页输出
		//dump($list);die;
		$this->display(); // 输出模板
	}
	/*
		 * ajax修改首页显示状态
	*/
	public function auditing() {
		//返回数组初始化
		$arr = [
			'error' => 1,
			'msg' => '修改失败',
		];

		$status = $_POST['status']; //标识是否置顶设置状态
		$article_id = $_POST['article_id'];

		$articleModel = M('article');
		if ($status == '1') {
			//设置置顶
			$data['type'] = 1;
			$rst = $articleModel->where('a_id=' . $article_id)->save($data);
			if ($rst) {
				$arr['error'] = 0;
				$arr['msg'] = '修改成功';
			}
		} else {
			//传入数据有误
			$arr = [
				'error' => 1,
				'msg' => '数据传入有误',
			];
		}
		echo json_encode($arr);
	}

	/*
		 * ajax修改首页显示状态
	*/
	public function editIndexStatus() {
		//返回数组初始化
		$arr = [
			'error' => 1,
			'msg' => '修改失败',
		];

		$status = $_POST['status']; //标识是否置顶设置状态
		$article_id = $_POST['article_id'];

		$articleModel = M('article');
		if ($status == '1') {
			//设置置顶
			$data['isindex'] = 1;
			$rst = $articleModel->where('a_id=' . $article_id)->save($data);
			if ($rst) {
				$arr['error'] = 0;
				$arr['msg'] = '修改成功';
			}
		} elseif ($status == '0') {
			//不置顶
			$data['isindex'] = 0;
			$rst = $articleModel->where('a_id=' . $article_id)->save($data);
			if ($rst) {
				$arr['error'] = 0;
				$arr['msg'] = '修改成功';
			}
		} else {
			//传入数据有误
			$arr = [
				'error' => 1,
				'msg' => '数据传入有误',
			];
		}
		echo json_encode($arr);
	}
	/*
		 * ajax修改置顶状态
	*/
	public function editistop() {
		//返回数组初始化
		$arr = [
			'error' => 1,
			'msg' => '修改失败',
		];

		$status = $_POST['status']; //标识是否置顶设置状态
		$article_id = $_POST['article_id'];

		$articleModel = M('article');
		if ($status == '1') {
			//设置置顶
			$data['istop'] = 1;
			$where['cid'] = 19;
			$where['istop'] = 1;
			// $rs = $articleModel->where($where)->select();
			// if ($rs) {
			// 	$arr = [
			// 		'error' => 1,
			// 		'msg' => '数据传入有误',
			// 	];
			// }
			// else
			// {

			$rst = $articleModel->where('a_id=' . $article_id)->save($data);
			if ($rst) {
				$arr['error'] = 0;
				$arr['msg'] = '修改成功';
			}
			// }

		} elseif ($status == '0') {
			//不置顶
			$data['istop'] = 0;
			$rst = $articleModel->where('a_id=' . $article_id)->save($data);
			if ($rst) {
				$arr['error'] = 0;
				$arr['msg'] = '修改成功';
			}
		} else {
			//传入数据有误
			$arr = [
				'error' => 1,
				'msg' => '数据传入有误',
			];
		}
		echo json_encode($arr);
	}

	/***
		     *  desc    添加内容
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email   1638500136
	*/
	public function add() {
		// dump($_GET);die;
		$id = $_GET['id'];
		$cid = $_GET['cid'];
		if ($_GET != '') {
			$User = M('article');
			$ret = $User->where('a_id=' . $_GET['id'])->find();
			// dump($id);die;
			$this->assign('data', $ret);
		}
		// dump($ret);die;
		$this->assign('id', $id);
		$this->assign('cid', $cid);
		$this->display();
	}
	public function del() {
		$User = M('article');
		$rs = $User->where('a_id=' . $_GET['id'])->delete();
		if ($rs) {
			$this->success();
		} else {
			$this->error();
		}
	}

	/***
		     *  desc    添加文章处理
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email   1638500136
	*/
	public function addarticle() {
		$data = I('post.');
		if ($_POST['istop'] == 1) {
			$where['cid'] = $_POST['cid'];
			$where['istop'] = 1;
			$retA = M('article')->where($where)->select();
			//判断是否有权限访问
			if ($retA) {
				// echo C('TMPL_ACTION_ERROR_ACTION');
				$this->error("您已有置顶文章");
			}

			// dump($rs);die;
		}
		if ($_POST['type'] == 1) {
			$where['url'] = "Company/auditing";
			$rts = M("admin_action")->where($where)->getField('id');
			$rs = M('admin_group')->where('id=' . $_SESSION['admin']['group'])->getField("rules");
			//判断是否有权限访问
			if (!strpos($rs, $rts)) {
				// echo C('TMPL_ACTION_ERROR_ACTION');
				$this->error("您没有权限审核文章");
			}

			// dump($rs);die;
		}
		if ($_FILES['imgurl']['name'] != '') {
			$upload = new \Think\Upload(); // 实例化上传类
			$upload->maxSize = 3145728; // 设置附件上传大小
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
			$upload->rootPath = './Uploads/'; // 设置附件上传根目录
			$upload->savePath = ''; // 设置附件上传（子）目录
			// 上传文件
			$info = $upload->upload();
			if (!$info) {
// 上传错误提示错误信息
				$this->error($upload->getError());
			} else {
// 上传成功 获取上传文件信息
				foreach ($info as $file) {
					$data['imgurl'] = $file['savepath'] . $file['savename'];
				}
			}
		}
		$data['createtime'] = date("Y-m-d H:i:s");
		// dump($data);die;
		if ($_POST['id'] != '') {
			$data['a_id'] = $_POST['id'];
			$ret = M('article')->save($data);
			if ($ret) {
				if ($_POST['cid'] == 19) {
					$this->success('操作成功', 'news');die;
				}
				if ($_POST['cid'] == 20) {
					$this->success('操作成功', 'lingdao');die;
				}
				if ($_POST['cid'] == 21) {
					$this->success('操作成功', 'notice');die;
				}

			} else {
				if ($_POST['cid'] == 19) {
					$this->error('操作失败', 'news');die;
				}
				if ($_POST['cid'] == 20) {
					$this->error('操作失败', 'lingdao');die;
				}
				if ($_POST['cid'] == 21) {
					$this->error('操作失败', 'notice');die;
				}
			}

		}
		$ret = M('article')->add($data);
		if ($ret) {
			if ($_POST['cid'] == 19) {
				$this->success('操作成功', 'news');die;
			}
			if ($_POST['cid'] == 20) {
				$this->success('操作成功', 'lingdao');die;
			}
			if ($_POST['cid'] == 21) {
				$this->success('操作成功', 'notice');die;
			}
		} else {
			if ($_POST['cid'] == 19) {
				$this->error('操作失败', 'news');die;
			}
			if ($_POST['cid'] == 20) {
				$this->error('操作失败', 'lingdao');die;
			}
			if ($_POST['cid'] == 21) {
				$this->error('操作失败', 'notice');die;
			}
		}

	}
	/////////////////////////////////

	/////////////////////////////////

	/////////////////////////////////

	/***
		     *  desc    文章列表
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function lingdao() {
		$User = M('article'); // 实例化User对象
		$qstr = $_GET['qstr'] && trim($_GET['qstr']) ? trim($_GET['qstr']) : '';
		if (!empty($qstr)) {
			$whereStr = "title like '%" . $qstr . "%' or author like '%" . $qstr . "%'";
		}
		$where['cid'] = 20;
		if ($whereStr != "") {
			$where['_string'] = $whereStr;
		}
		// dump($qstr);die;
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取

		$count = $User->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->join('LEFT JOIN bk_cate on bk_article.cid=bk_cate.id')
			->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('createtime desc')->select();
		$catelist = M('cate')->select();
		$this->assign('cate', $cate);
		$this->assign('qstr', $qstr);
		$this->assign('catelist', $catelist);
		$this->assign('list', $list); // 赋值数据集
		$this->assign('Page', $show); // 赋值分页输出
		//dump($list);die;
		$this->display(); // 输出模板
	}

	/*
		 * ajax修改置顶状态
	*/
	public function lingdao_editistop() {
		//返回数组初始化
		$arr = [
			'error' => 1,
			'msg' => '修改失败',
		];

		$status = $_POST['status']; //标识是否置顶设置状态
		$article_id = $_POST['article_id'];

		$articleModel = M('article');
		if ($status == '1') {
			//设置置顶
			$data['istop'] = 1;
			$where['cid'] = 20;
			$where['istop'] = 1;
			// $rs = $articleModel->where($where)->select();
			// if ($rs) {
			// 	$arr = [
			// 		'error' => 1,
			// 		'msg' => '数据传入有误',
			// 	];
			// } else {

			$rst = $articleModel->where('a_id=' . $article_id)->save($data);
			if ($rst) {
				$arr['error'] = 0;
				$arr['msg'] = '修改成功';
			}
			// }

		} elseif ($status == '0') {
			//不置顶
			$data['istop'] = 0;
			$rst = $articleModel->where('a_id=' . $article_id)->save($data);
			if ($rst) {
				$arr['error'] = 0;
				$arr['msg'] = '修改成功';
			}
		} else {
			//传入数据有误
			$arr = [
				'error' => 1,
				'msg' => '数据传入有误',
			];
		}
		echo json_encode($arr);
	}
	/////////////////////////////////

	/////////////////////////////////

	/////////////////////////////////

	/***
		     *  desc    文章列表
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function notice() {
		$User = M('article'); // 实例化User对象
		$qstr = $_GET['qstr'] && trim($_GET['qstr']) ? trim($_GET['qstr']) : '';
		if (!empty($qstr)) {
			$whereStr = "title like '%" . $qstr . "%' or author like '%" . $qstr . "%'";
		}
		$where['cid'] = 21;
		if ($whereStr != "") {
			$where['_string'] = $whereStr;
		}
		// dump($qstr);die;
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取

		$count = $User->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->join('LEFT JOIN bk_cate on bk_article.cid=bk_cate.id')
			->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('createtime desc')->select();
		$catelist = M('cate')->select();
		$this->assign('cate', $cate);
		$this->assign('qstr', $qstr);
		$this->assign('catelist', $catelist);
		$this->assign('list', $list); // 赋值数据集
		$this->assign('Page', $show); // 赋值分页输出
		//dump($list);die;
		$this->display(); // 输出模板
	}

	/*
		 * ajax修改置顶状态
	*/
	public function notice_editistop() {
		//返回数组初始化
		$arr = [
			'error' => 1,
			'msg' => '修改失败',
		];

		$status = $_POST['status']; //标识是否置顶设置状态
		$article_id = $_POST['article_id'];

		$articleModel = M('article');
		if ($status == '1') {
			//设置置顶
			$data['istop'] = 1;
			$where['cid'] = 21;
			$where['istop'] = 1;
			$rs = $articleModel->where($where)->select();
			// if ($rs) {
			// 	$arr = [
			// 		'error' => 1,
			// 		'msg' => '数据传入有误',
			// 	];
			// } else {

			$rst = $articleModel->where('a_id=' . $article_id)->save($data);
			if ($rst) {
				$arr['error'] = 0;
				$arr['msg'] = '修改成功';
			}
			// }

		} elseif ($status == '0') {
			//不置顶
			$data['istop'] = 0;
			$rst = $articleModel->where('a_id=' . $article_id)->save($data);
			if ($rst) {
				$arr['error'] = 0;
				$arr['msg'] = '修改成功';
			}
		} else {
			//传入数据有误
			$arr = [
				'error' => 1,
				'msg' => '数据传入有误',
			];
		}
		echo json_encode($arr);
	}
}