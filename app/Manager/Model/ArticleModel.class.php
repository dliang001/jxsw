<?php
namespace Manager\Model;
use Think\Model;
/***
*   Author yankee
*   Date	 2016-01-22
***/
class ArticleModel extends Model{

    protected $tableName = 'Article';
    protected $tableName_visit = 'visit';
    protected $tableName_img = 'img';
    
  /***
  *   Author yankee
  *   Date   2016-01-22
  *   DESC   文章列表
  ***/
  public function getArticleList($where = "1=1", $field = "*", $order = "id asc",$limit="0")
  {
      $data =  M($this->tableName)->where($where)->field($field)->order($order)->limit($limit)->select(); 
      if($data)
      {
        foreach ($data as $key => $value) {
          # code...
           $data[$key]['picurl'] = D("Assets")->getAssets($value['pic']);
           $data[$key]['cname'] = M("cate")->where("id = '{$value['cid']}' ")->getField("name");
        }
        return $data;
      }else{
        return array('');
      }
  }


  /***
  *   Author yankee
  *   Date   2016-01-22
  *   DESC   访客列表
  ***/
  public function getvisitList($where = "1=1", $field = "*", $order = "id asc",$limit="0")
  {
      $data =  M($this->tableName_visit)->where($where)->field($field)->order($order)->limit($limit)->select(); 
      if($data)
      {
        foreach ($data as $key => $value) {
          # code...
          
        }
        return $data;
      }else{
        return array('');
      }
  }

  /***
  *   Author yankee
  *   Date   2016-01-22
  *   DESC   首页轮播图列表
  ***/
  public function getImgList($where = "1=1", $field = "*", $order = "id desc",$limit="0")
  {
      $data =  M($this->tableName_img)->where("isdel = 0")->select(); 
      if($data)
      {
        foreach ($data as $key => $value) {
          # code...
           $data[$key]['picurl'] = D("Assets")->getAssets($value['pic']);
           $data[$key]['cname'] = M("cate")->where("id = '{$value['cid']}' ")->getField("name");
        }
        return $data;
      }else{
        return array('');
      }
  }

 
   
}