<?php
namespace Manager\Controller;
use Think\Controller;
class bokeController extends Controller {
	//id
	public $MyId;
	function __construct()
	{
		
		if(!$_SESSION['admin']['id'] ){
            redirect(U('Manager/Public/login'));
        }
		parent::__construct();
		$this->MyId 	= $_SESSION['admin']['id'];
		$this->Group 	= $_SESSION['admin']['group'];
        $this->catelist = M("cate")->where("isdel = 0")->select();

        //当前功能的ID
        $action = CONTROLLER_NAME.'/'.ACTION_NAME;
        $this->ActionId = M("admin_action")->where("url = '{$action}' ")->getField('id');
        //当前自身权限ID
        $this->MenuId   = M('admin_group')->where("id = '{$this->Group}' ")->getField("rules");//($this->ActionId);
    	//判断是否有权限访问
        if(!strpos($this->MenuId,$this->ActionId))
        {
                // echo C('TMPL_ACTION_ERROR_ACTION');
                $this->error("您没有权限访问该功能");
        }
    
        


	}
}	