<?php
namespace Manager\Model;
use Think\Model;
/**
 * Author yaopengtao
 * Email  276523705@qq.com
 * Date	  2016-10-17
 */
class DomainModel extends Model {
	//表名称
	protected $tableName = 'domain';

	/**
	 * Author yaopengtao
	 * DESC   我的热门域名
	 * Email  276523705@qq.com
	 * Date	  2016-10-17
	 */
	public function hot_domain($user_id = "0", $limit = 15)
	{
		$domain_list = M($this->tableName)->where(" user_id = '".$user_id."' and visit_num > 0 ")->field("domain,price,visit_num")->order("visit_num desc")->limit($limit)->select();
		return $domain_list;
	}

} 