<?php
namespace Manager\Model;
use Think\Model;
/***
*   Author yankee
*   Date	 2016-01-22
***/
class ActionModel extends Model{

  protected $tableName = 'Admin_action';
    
/**
   *   desc   yankee查询当前权限状态
   *   Email  1638500136@qq.com
   *   Date 2016-11-23
   */
  public function actionStatus($data = array())
  {

    $actionList = genTree(M($this->tableName)->where(" IsDel=0  ")->select());
        foreach ($actionList as $k => $v) {

            //判断是否被选中
            $actionList[$k]['checked'] = in_array($v['id'], explode(",", $data)) ? 'checked' : '';
            foreach ($v['child'] as $ck => $cv) {
                //判断是否被选中
                $actionList[$k]['child'][$ck]['checked'] = in_array($cv['id'], explode(",", $data)) ? 'checked' : '';
                foreach ($cv['child'] as $cck => $ccv) {
                    //判断是否被选中
                    $actionList[$k]['child'][$ck]['child'][$cck]['checked'] = in_array($ccv['id'], explode(",", $data)) ? 'checked' : '';
                }
            }
        }

        return $actionList;
  }
  
 
   
}