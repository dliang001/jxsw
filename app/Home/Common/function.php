<?php 

/**
 * 是否开启伪静态转换函数
 * @param  boolean
 * @return string
 */
function bk_url($url, $vars = array())
{
    $is_rewrite = M('setup')->where(" id = 1 ")->cache(true)->getField("urltype");
    if ($is_rewrite == 0 )
    {
        switch ($url) {
        	case 'Index/catelist':
        		return "cl-".$vars['id'].'.html';
        		break;
        	case 'Index/deta':
                return "detail-".$vars['id'].'.html';
                break;
            case 'Index/search':
                return "s.html";
                break;
        	default:
        		# code...
        		break;
        }
        
        // 这里是伪静态处理，后面再设计
    } else {
        return U($url, $vars);
    }
}




?>