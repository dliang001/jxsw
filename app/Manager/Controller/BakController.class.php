<?php
namespace Manager\Controller;
use Think\Controller;
class BakController extends BokeController {

    public function index(){
        $DataDir = "sqldatabak/";
        // 创建目录
        mkdir($DataDir); 
        if (!empty($_GET['Action'])) 
        {
            // 加班数据配置信息
            $config = array(
                'host' => C('DB_HOST'),
                'port' => C('DB_PORT'),
                'userName' => C('DB_USER'),
                'userPassword' => C('DB_PWD'),
                'dbprefix' => C('DB_PREFIX'),
                'charset' => 'UTF8',
                'path' => $DataDir,
                'isCompress' => 0, //是否开启gzip压缩
                'isDownload' => 0
            );
            // 加载Mysql类
            $mr = new \Org\Net\MySQLReback($config);
            $mr->setDBName(C('DB_NAME'));
            if ($_GET['Action'] == 'backup') 
            {
                $mr->backup();
                // echo "<script>document.location.href='" . U("Bak/index") . "'</script>";
                // $this->success( '数据库备份成功！');
            }elseif($_GET['Action'] == 'RL') 
            {
                $mr->recover($_GET['File'].'.sql');
                // echo "<script>document.location.href='" . U("Bak/index") . "'</script>";
                $this->success( '数据库还原成功！');exit();
            }elseif($_GET['Action'] == 'Del') 
            {
                if (@unlink($DataDir . $_GET['File'].'.sql')) 
                {
                    // $this->success('删除成功！');
                    // echo "<script>document.location.href='" . U("Bak/index") . "'</script>";
                } else {
                    $this->error('删除失败！');
                }
            }

            if ($_GET['Action'] == 'download') {
                $this->DownloadFile($DataDir . $_GET['file'].'.sql');
                exit();
            }
        }

        $lists = $this->MyScandir('sqldatabak/');
        $this->datadir = $DataDir;
        $this->lists =  $lists;
        $this->display();
    }



    /***
     *  desc    读取sql数据
     *  Author  lizongyang
     *  web     www.lizongyang.cn
     *  email    1638500136
     ***/
    Public function MyScandir($FilePath = './', $Order = 0){
        $FilePath = opendir($FilePath);
        while (false !== ($filename = readdir($FilePath)))
        {
            $FileAndFolderAyy[] = $filename;
        }
        $Order == 0 ? sort($FileAndFolderAyy) : rsort($FileAndFolderAyy);
        return $FileAndFolderAyy;
    }

   
    /***
     *  desc    下载
     *  Author  lizongyang
     *  web     www.lizongyang.cn
     *  email    1638500136
     ***/
     function DownloadFile($fileName){
        ob_end_clean();
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Length: ' . filesize($fileName));
        header('Content-Disposition: attachment; filename=' . basename($fileName));
        readfile($fileName);
    }

}

?>