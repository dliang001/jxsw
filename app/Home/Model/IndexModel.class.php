<?php
namespace Home\Model;
use Think\Model;
/**
 * Author lizongyang
 * Email  1638500136@qq.com
 * Date	  2016-10-17
 */
class IndexModel extends Model {

	protected $tableName = 'visit'; 

	/**
	 * Author lizongyang
	 * DESC   记录访客信息
	 * Email  21638500136@qq.com
	 * Date	  2016-12-17
	 */
	public function add_visit_info()
	{

		//5分后的时间
        $htime = date("Y-m-d H:i:s",strtotime("+5 minute"));
        $userip=ip(); 
        $time=date("Y-m-d H:i:s"); 
        $city = Getaddress();
        $cityname =  implode(',', $city[0]); //地方
        $vistime = M("visit")->where("ip = '{$userip}' ")->order("createtime desc")->getField("time");//查询ip时间
        $jttime = strtotime($vistime);
        $jttime = date('Y-m-d',$jttime);
        //如果当天数据库有数据并且还在5分之内 不重复计算
        if(date("Y-m-d") == $jttime && $time <= $vistime){
            	
        }else{
           // 访客日志
           M("visit")->add(array(
            'ip' => $userip,
            'createtime' => $time,
            'browser' => GetBrowser(),
            'ilanguagep' => GetBrowser(),
            'language' => GetLang(),
            'os_name' => GetOs(),
            'city' => $cityname,
            'time' => $htime,
            ));  
        }
	}
}