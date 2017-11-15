<?php
namespace Manager\Model;
use Think\Model;
/***
*   Author yankee
*   Date	 2016-01-22
***/
class AssetsModel extends Model{

    protected $tableName = 'assets';
    
    /***
  *   Author yankee
  *   Date   2016-01-22
  *   DESC   返回图片URL
  ***/
  public function getAssets($assetStr)
  {
      if (!$assetStr) return array();
      $assetList = M('Assets')->where(" id in (".$assetStr.") and IsDel = 0 ")->field('id, domain,savepath,savename')->select();
      $srcArr    = array();
      foreach ($assetList as $key => $info) {
        $srcArr[] = array("src" => $info['domain'] . strtolower('/uploads/') . $info['savepath'] . $info['savename'], "id"=>$info['id']);
      }
      return $srcArr;
  }

 
  /**
     * author yankee
     * desc   上传图片
     * date   2016-01-21
     */
    public function uploadImage(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     26145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './uploads/'; // 设置附件上传根目录
        $upload->savePath  =     'assets/'; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        return $info;
    }

    /**
     * author yankee
     * desc   删除图片
     * date   2016-01-22
     */
    public function delImage()
    {
        M('Assets')->where(" id = ".I('post.id')." ")->save(array('IsDel'=>1));
    }

   
}