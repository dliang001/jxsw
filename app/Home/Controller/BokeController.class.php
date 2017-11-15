<?php
namespace Home\Controller;
use Think\Controller;
class BokeController extends Controller {
	//id
	public $MyId;
	//domain
	
	function __construct()
	{
		
		parent::__construct();
		
		//获取分类
        $this->cate = genTree(D("Article")->getCateData());
         //随机2条数据
        $randwhere = "isdel = 0 ";
      	$this->randlist = D("Article")->getArticleList($randwhere,'','viewnum desc',10);
        $this->setup = M("setup")->where("id =1 ")->find();
        //友情
        $this->listyouqing = M("youqing")->cache(864000)->select();
        
        $this->acname = D("cate")->where("url like '%{$this->ac_name}%' ")->cache(864000)->field("name")->find();//getCateData();

	}
    

}	