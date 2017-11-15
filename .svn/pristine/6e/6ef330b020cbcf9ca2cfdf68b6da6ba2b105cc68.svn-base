<?php
namespace Manager\Controller;
use Think\Controller;
class DomainController extends KfcmsController {
	public $domainModel;
	//初始化
    public function __construct()
    {
        parent::__construct();
        $this->domainModel  = D('domain');
    }

    /***
	 *	Author	yaopengtao
	 *	desc	域名列表
	 *	web		www.t28.cn
	 *	Date	2016-10-16
	 ***/
    public function index(){
    	
    	$where = " user_id = '".$this->MyId."' ";
    	$caid  = I('get.cate_id', '', 'trim');
    	$name  = I('get.name', '', 'trim');
    	if($caid !=''){
    		$where .= " and cate_id  =  '".$caid."' ";
    	}
    	if($name !=''){
    		$where .= " and domain = '".$name."' ";
    	}
    	

    	$count = $this->domainModel->where($where)->count(); 
        // 实例化分页类 传入总记录数和每页显示的记录数
        $Page = new \Think\Page($count, 50); 
    	$list = $this->domainModel->where($where)->order("id desc")->limit($Page->firstRow . ',' . $Page->listRows)->select();

    	foreach ($list as $k => $v) {
    		$list[$k]['sale_status'] = M('dict')->where(array('id'=>$v['sale_status'], 'delete_flag'=>0))->cache("sale_status_id_".$v['sale_status']."_cache", 86400)->getField("name");
    		
    		$list[$k]['sale_type'] = M('dict')->where(array('id'=>$v['sale_type'], 'delete_flag'=>0))->cache("sale_type_id_".$v['sale_type']."_cache", 86400)->getField("name");
    	}
    	$this->cate = genTree(M('cate')->where("user_id in(0,".$this->MyId.") and delete_flag = 0 ")->field("id,name,pid")->cache("cate_cache")->select());
    	$this->list = $list;
    	$this->show_page = $Page->show();
        $this->display();
    }

     /***
	 *	Author	yaopengtao
	 *	desc	添加域名
	 *	web		www.t28.cn
	 *	Date	2016-10-16
	 ***/
	 public function add_domain()
	 {
	 	if (IS_AJAX)
	 	{
	 		$post = I('post.');
	 		
	 		if (!$this->domainModel->autoCheckToken($post)){
			 	$this->ajaxReturn($post, 'JSON', 0);die;
			}

			$length = domain_length($post['domain']);
			
			if ( $length == 0)
			{
				$this->ajaxReturn(array('msg'=>'参数不合法，请重新提交'), 'JSON', true);die;
			}
			$id = I('post.id', 0, 'trim');
 			$arr = array(
		 			'domain' 	 => get_host_domain(I('post.domain', '', 'trim')),
		 			'price' 	 => I('post.price', 0, 'trim'),
		 			'money_type' => I('post.money_type', 'RMB', 'trim'),
		 			'cate_id' 	 => I('post.cate_id', 0, 'trim'),
		 			'remark' 	 => I('post.remark', '', 'trim') ? I('post.remark', '', 'trim') : '出售中',
		 			'sale_url' 	 => I('post.sale_url', '', 'trim'),
		 			'sale_type'  => I('post.sale_type', 8, 'trim'),
		 			'sale_status'=> I('post.sale_status', 2, 'trim'),
		 			'suffix'	 => get_domain_suffix(get_host_domain(I('post.domain', '', 'trim'))),
		 			'add_time'   => date('Y-m-d H:i:s'),
		 			'user_id'    => $this->MyId,
		 			'domain_length'=> $length,
 			);
	 		if($id){
	 			unset($arr['add_time']);	
	 			$rs = $this->domainModel->where("id = '{$id}' and user_id = '{$this->MyId}' ")->save($arr);
	 			//删除缓存
	 			S(get_host_domain(I('post.domain', '', 'trim')).'_cache', null);
	 		}else{
	 			$rs = $this->domainModel->add($arr);
	 			$this->ajaxReturn(array('msg'=>'修改成功!'), 'JSON', true);die;
	 		}
	 		$this->ajaxReturn(array('msg'=>'添加成功!'), 'JSON', true);die;
	 	}
	 	//币种
	 	$this->money_type = M('dict')->where(array('pid'=>4,'create_flag'=>0))->field("id,name,remark")->cache("money_type_cache")->select();
	 	//出售方式
	 	$this->sale_type = M('dict')->where(array('pid'=>7,'create_flag'=>0))->field("id,name,remark")->cache("sale_type_cache")->select();
	 	//出售状态
	 	$this->sale_status = M('dict')->where(array('pid'=>1,'create_flag'=>0))->field("id,name,remark")->cache("sale_status_cache")->select();
	 	//分类
	 	$this->cate = genTree(M('cate')->where("user_id in(0,".$this->MyId.") and delete_flag = 0 ")->field("id,name,pid")->cache("cate_cache")->select());
	 	
	 	if ($_GET['id'])
	 	{
	 		$this->data = $this->domainModel->where("id = '{$_GET['id']}'")->find();
	 	}
	 	
	 	$this->display();
	}

	/***
     *  Author  yaopengtao
     *  desc    检测域名是否已经添加过
     *  web     www.t28.cn
     *  Date    2016-10-13
     ***/
    public function check_domain()
    {
        if (IS_AJAX)
        {
            $domain = get_host_domain(I("post.domain", '', 'trim'));
            $length = domain_length($domain);

            if ($length == 0)
            {
				$this->ajaxReturn(array('msg'=>'域名格式不正确!', 'val'=>''), 'JSON', true);die;
            }
            $this->ajaxReturn(array('msg'=>'','val'=>$domain));die;
        }
    }

    /***
     *  Author  lizongyang	
     *  desc    下架商品
     *  web     www.t28.cn
     *  Date    2016-10-20
     ***/
    Public function xiajia(){
    	if(IS_AJAX){
    		$id = I("post.id",'','trim');
			$idData = implode(',',$id);
    		$res =  $this->domainModel->where("id in({$idData}) and user_id = '".$this->MyId."' ")->save(array("is_show"=>0));
    		if($res){
    			echo json_encode(1);		
    		}else{
    			echo json_encode(2);
    		}
    	}
    	
	}

}	