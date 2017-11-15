<?php
namespace Manager\Controller;
use Think\Controller;
class ActionController extends BokeController {
     /***
     *  desc    首页
     *  Author  lizongyang
     *  web     www.lizongyang.cn
     *  email    1638500136
     ***/
    public function index()
    {
        
        $this->display();
    }

    /***
     *  desc    添加子菜单
     *  Author  lizongyang
     *  web     www.lizongyang.cn
     *  email    1638500136
     ***/
    public function addaction()
    {
        if(IS_POST)
        {
            $data = I('post.');
            if($data['id'])
            {
                
                if(M('admin_action')->where("id = '{$data['id']}'")->save($data))
                {
                    echo json_encode(1);exit;
                }else{
                    echo json_encode(2);exit;
                }  

            }else{
                if(M('admin_action')->add($data))
                {
                    echo json_encode(1);exit;
                }else{
                    echo json_encode(2);exit;
                }  
            }    
        }


        $this->edit = I("get.type");
        $this->pid  = I('get.pid');
        //父级标示
        $this->name = M("admin_action")->where("id = '{$this->pid}' and isdel= 0")->getField("name");
        if($this->edit == 'edit')
        {
            $this->data = M("admin_action")->where("id = '{$this->pid}' and isdel= 0")->find();
        }

        $this->mark  = I('get.mark');
        if($this->mark == 2)
        {
            $this->data = M("admin_action")->where("id = '{$this->pid}' and isdel= 0")->find();
            $this->name = M("admin_action")->where("id = '{$this->data['pid']}' and isdel= 0")->getField("name");
        }

        $this->display();
    }
    



















    
}	