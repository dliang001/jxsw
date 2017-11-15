<?php
namespace Home\Model;
use Think\Model;
/***
*   Author yankee
*   Date	 2016-01-22
***/
class ArticleModel extends Model{

    protected $tableName = 'Article';

    
  /***
  *   Author yankee
  *   Date   2016-01-22
  *   DESC   文章列表
  ***/
  public function getArticleList($where = "1=1", $field = "*", $order = "id desc",$limit="0")
  {
      $data =  M($this->tableName)->where($where)->cache(true)->field($field)->order($order)->limit($limit)->select();
      if($data)
      {
        foreach ($data as $key => $value) {
          # code...
           $data[$key]['picurl'] = D("Assets")->getAssets($value['pic']);
           $data[$key]['cname'] = M("cate")->where("id = '{$value['cid']}' ")->getField("name");
        }
          
        return $data;
      }else{
        return '';
      }
  }
   /***
  *   Author yankee
  *   Date   2016-01-22
  *   DESC   获取分类标签
  ***/
  Public function getCateData(){
     $data = M("cate")->where("isdel = 0")->select();
     foreach ($data as $key => $value) {
        $iddata = M("cate")->where("pid = {$value['id']}")->getField("id",true);
        $strid = implode(',',$iddata);
        if($strid){
            $cid = $value['id'].','.$strid;//
         }else{
            $cid = $value['id'];//
         }
       # code...
            $data[$key]['artnum'] = M($this->tableName)->where("cid IN({$cid}) ")->count();
     }
       if($data){
          return $data;
       }else{
          return $res;
       }
  }

 
   
}