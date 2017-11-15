<?php
namespace Manager\Model;
use Think\Model;
/***
*   Author yankee
*   Date	 2016-01-22
***/
class AdminModel extends Model{

  protected $tableName = 'admin';
    
   /***
    *   Author yankee
    *   Date   2016-11-24
    *   DESC   管理员列表
    ***/
    public function getUserList($where = "1=1", $field = "*", $order = "id asc",$limit="0")
    {
        $data =  M($this->tableName)->where($where)->field($field)->order($order)->limit($limit)->select(); 
        if($data)
        {
          foreach ($data as $key => $value) {
            # code...
             $data[$key]['groupname'] = M("Admin_group")->where("id = '{$value['group']}' ")->getField("title");
          }
          return $data;
        }else{
          return array('');
        }
    }
 
   
}