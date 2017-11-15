<?php
namespace Manager\Controller;
use Think\Controller;

class AdminController extends BokeController {
	/***
		     *  desc    首页
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function index() {
		$rs = M('article')->where('cid=22')->find();
		$this->assign('data', $rs);
		$this->display();
	}
	/***
		     *  desc    组织机构
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function youqing() {
		$rs = M('article')->where('cid=23')->find();
		$this->assign('data', $rs);
		$this->display();
	}
	/***
		     *  desc    领导信息
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function lingdao() {
		$rs = M('article')->where('cid=24')->find();
		$this->assign('data', $rs);

		// $this->data = M("setup")->where('id= 1')->find();
		$this->display();
	}
	/***
		     *  desc    联系我们
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function phone() {
		$rs = M('article')->where('cid=25')->find();
		$this->assign('data', $rs);

		// $this->data = M("setup")->where('id= 1')->find();
		$this->display();
	}
	/***
		     *  desc    工程动态
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function work() {
		$rs = M('article')->where('cid=26')->find();
		$this->assign('data', $rs);

		// $this->data = M("setup")->where('id= 1')->find();
		$this->display();
	}
	/***
		     *  desc    党建动态
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function party_building() {
		$rs = M('article')->where('cid=27')->find();
		$this->assign('data', $rs);

		// $this->data = M("setup")->where('id= 1')->find();
		$this->display();
	}
	/***
		     *  desc    人事信息
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function person() {
		$rs = M('article')->where('cid=28')->find();
		$this->assign('data', $rs);

		// $this->data = M("setup")->where('id= 1')->find();
		$this->display();
	}
	/***
		     *  desc    分类管理
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function cate() {

		$this->display();
	}
	/***
		     *  desc    首页导航
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function nav() {

		$this->display();
	}

	/***
		     *  desc    文章列表
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function arlist() {
		$cate = $_GET['cate'];
		$qstr = $_GET['qstr'];
		if ($cate != '') {
			if ($cate != 0) {
				$where['cid'] = $cate;
			}
		}
		if ($qstr != '') {
			$where['_string'] = "title like '%" . $qstr . "%'";
		}
		// dump($where);die;
		$User = M('article'); // 实例化User对象
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$count = $User->where($where)->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 20); // 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show(); // 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User
			->join('LEFT JOIN bk_cate on bk_article.cid=bk_cate.id')
			->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();
		// dump($list);die;
		$catelist = M('cate')->select();
		$this->assign('cate', $cate);
		$this->assign('qstr', $qstr);
		$this->assign('catelist', $catelist);
		$this->assign('list', $list); // 赋值数据集
		$this->assign('Page', $show); // 赋值分页输出
		$this->display(); // 输出模板
	}

	/***
		     *  desc    添加文章处理
		     *  Author  lizongyang
		     *  web     www.lizongyang.cn
		     *  email   1638500136
	*/
	public function addarticle() {
		$data = I('post.');

		// dump($rs);die;

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
				if ($_POST['cid'] == 22) {
					$this->success('操作成功', 'index');die;
				}
				if ($_POST['cid'] == 23) {
					$this->success('操作成功', 'youqing');die;
				}
				if ($_POST['cid'] == 24) {
					$this->success('操作成功', 'lingdao');die;
				}
				if ($_POST['cid'] == 25) {
					$this->success('操作成功', 'phone');die;
				}
				if ($_POST['cid'] == 26) {
					$this->success('操作成功', 'work');die;
				}
				if ($_POST['cid'] == 27) {
					$this->success('操作成功', 'party_building');die;
				}
				if ($_POST['cid'] == 28) {
					$this->success('操作成功', 'person');die;
				}
			} else {
				if ($_POST['cid'] == 22) {
					$this->error('操作失败', 'news');die;
				}
				if ($_POST['cid'] == 23) {
					$this->error('操作失败', 'youqing');die;
				}
				if ($_POST['cid'] == 24) {
					$this->error('操作失败', 'lingdao');die;
				}
				if ($_POST['cid'] == 25) {
					$this->error('操作成功', 'phone');die;
				}
				if ($_POST['cid'] == 26) {
					$this->error('操作成功', 'work');die;
				}
				if ($_POST['cid'] == 27) {
					$this->error('操作成功', 'party_building');die;
				}
				if ($_POST['cid'] == 28) {
					$this->error('操作成功', 'person');die;
				}
			}

		}
		// dump($data);die;
		$ret = M('article')->add($data);
		if ($ret) {
			if ($_POST['cid'] == 22) {
				$this->success('操作成功', 'index');die;
			}
			if ($_POST['cid'] == 23) {
				$this->success('操作成功', 'youqing');die;
			}
			if ($_POST['cid'] == 24) {
				$this->success('操作成功', 'lingdao');die;
			}
			if ($_POST['cid'] == 25) {
				$this->success('操作成功', 'phone');die;
			}
			if ($_POST['cid'] == 26) {
				$this->success('操作成功', 'work');die;
			}
			if ($_POST['cid'] == 27) {
				$this->success('操作成功', 'party_building');die;
			}
			if ($_POST['cid'] == 28) {
				$this->success('操作成功', 'person');die;
			}

		} else {
			if ($_POST['cid'] == 22) {
				$this->error('操作失败', 'index');die;
			}
			if ($_POST['cid'] == 23) {
				$this->error('操作失败', 'youqing');die;
			}
			if ($_POST['cid'] == 24) {
				$this->error('操作失败', 'lingdao');die;
			}
			if ($_POST['cid'] == 25) {
				$this->error('操作成功', 'phone');die;
			}
			if ($_POST['cid'] == 26) {
				$this->error('操作成功', 'work');die;
			}
			if ($_POST['cid'] == 27) {
				$this->error('操作成功', 'party_building');die;
			}
			if ($_POST['cid'] == 28) {
				$this->error('操作成功', 'person');die;
			}
		}

	}

	/***
		     *  desc    首页轮播图
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function indeximg() {

		$this->list = D("Article")->getImgList();

		$this->display();
	}

	/***
		     *  desc    admin菜单管理
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function action() {

		// dump($this->list);
		$this->actionList = genTree(M('admin_action')->where("isdel=0")->select());
		$this->display();
	}

	/***
		     *  desc    group用户组
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function group() {

		$this->groupList = M('admin_group')->where("isdel=0")->select();
		$this->display();
	}

	/***
		     *  desc    group用户组
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function fenaction() {
		if (IS_POST) {

			$data = I('post.');
			// $array = array_merge($data['data']['menu'],$data['data']['method'],$data['data']['action']);
			$actionid = implode(',', $data['data']['menu']);

			if (M("admin_group")->where("id = {$data['id']}")->save(array('rules' => $actionid))) {
				$this->success('分配权限成功!', U('Admin/group'));exit;
			} else {
				$this->success('分配权限成功!', U('Admin/group'));exit;
			}
		}

		$this->id = I('get.id', '', 'intval');
		$actionid = M("admin_group")->where("isdel = 0 and id = '{$this->id}' ")->getField("rules");
		$this->title = M("admin_group")->where("isdel = 0 and id = '{$this->id}' ")->getField("title");
		$this->actionList = D('Action')->actionStatus($actionid);

		$this->display();
	}

	/***
		     *  desc    添加group用户组
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function addgroup() {
		if (IS_POST) {
			$data = I('post.');
			$data['createtime'] = date("Y-m-d H:i:s");

			if ($data['id']) {
				if (M('admin_group')->where("id = '{$data['id']}'")->save($data)) {
					echo json_encode(1);exit;
				} else {
					echo json_encode(2);exit;
				}

			} else {
				if (M('admin_group')->add($data)) {
					echo json_encode(1);exit;
				} else {
					echo json_encode(2);exit;
				}
			}
		}
		$id = I('get.id');
		$this->data = M("admin_group")->where("id = {$id}")->find();
		$this->display();
	}

	/***
		     *  desc    del用户组
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function delgroup() {
		if (IS_POST) {

			$id = I('post.id');

			if (M('admin_group')->where("id={$id}")->save(array('isdel' => 1))) {
				echo json_encode(1);
			} else {
				echo json_encode(2);
			}

		}
	}

	/***
		     *  desc    管理员
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function user() {
		// $this->userlist = D('Admin')->getUserList("locked=0 and id >1");
		// $this->grouplist = M("admin_group")->where("isdel =0 ")->select();
		// dump($_session);die;
		// dump($_SESSION['admin']['group']);die;
		if ($_SESSION['admin']['group'] == 1) {
			$list = M('admin')->select();
			for ($i = 0; $i < count($list); $i++) {
				$list[$i]['g_name'] = M('admin_group')->where('id=' . $list[$i]['group'])->getField('title');
			}
		} else {
			$list = M('admin')->where('id=' . $_SESSION['admin']['id'])->select();
			for ($i = 0; $i < count($list); $i++) {
				$list[$i]['g_name'] = M('admin_group')->where('id=' . $list[$i]['group'])->getField('title');
			}
		}
		// dump($list);die;
		$this->assign('userlist', $list);
		$this->display();
	}

	/***
		     *  desc    添加管理员
		     *  web     www.lizongyang.cn
		     *  email    1638500136
	*/
	public function adduser() {

		if (IS_POST) {
			$data = I('post.');
			$data['create_time'] = date("Y-m-d H:i:s");
			if ($data['id']) {
				if ($data['password']) {
					$data['password'] = md5Sign($data['password']);
				} else {
					$data['password'] = M("admin")->where("id = '{$data['id']}' ")->getField('password');
				}

				if (M('admin')->where("id = '{$data['id']}'")->save($data)) {
					echo json_encode(1);exit;
				} else {
					echo json_encode(2);exit;
				}

			} else {
				if ($data['password']) {
					$data['password'] = md5Sign($data['password']);
				}

				if (M('admin')->add($data)) {
					echo json_encode(1);exit;
				} else {
					echo json_encode(2);exit;
				}
			}
		}

		$id = I('get.id');
		$this->data = M('admin')->where("id = '{$id}' ")->find();
		$this->grouplist = M("admin_group")->where("isdel =0 ")->select();
		$this->display();
	}

}