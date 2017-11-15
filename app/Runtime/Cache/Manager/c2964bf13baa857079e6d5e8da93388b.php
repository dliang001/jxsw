<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <link rel="stylesheet" href="<?php echo (BOKE_STATIC_PATH); ?>/manager/css/pintuer.css">
    <link rel="stylesheet" href="<?php echo (BOKE_STATIC_PATH); ?>/manager/css/admin.css">
    <script src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/jquery.js"></script>   
    <script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/common.js"></script>
	<script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/layer/layer.js"></script>
	<script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/js/select.js"></script>
</head>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 数据库备份列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th width="30%">文件名</th>
        <th width="20%">备份时间</th>
        <th width="10%">文件大小</th>
        <th width="10%">操作</th>
      </tr>
       <?php if(is_array($lists)): foreach($lists as $key=>$row): if($key > 1): ?><tr>
                    <td><?php echo ($key-1); ?></td>
                    <td ><a href="<?php echo U('Bak/index',array('Action'=>'download','file'=>$row));?>"><?php echo ($row); ?></a></td>
                    <td><?php echo (getfiletime($row,$datadir)); ?></td>
                    <td><?php echo (getfilesize($row,$datadir)); ?></td>
                    <td>
                        <td><div class="button-group"> 
                        <a class="button border-main" href="<?php echo U('Bak/index',array('Action'=>'download','file'=>$row));?>" onclick="edit(<?php echo ($v['id']); ?>);">下载</a>
                        <a class="button border-main" onclick="return confirm('确定将数据库还原到当前备份吗？')"href="<?php echo U('Bak/index',array('Action'=>'RL','File'=>$row));?>" >还原</a>
                        <a class="button border-red" onclick="return confirm('确定删除该备份文件吗？')"href="<?php echo U('Bak/index',array('Action'=>'Del','File'=>$row));?>"> 删除</a> </div></td>

                    </td>
                </tr><?php endif; endforeach; endif; ?>
          
      <tr>
        <!-- <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="7" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a> <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a> 操作：
          
          </td> -->
      </tr>
      <tr>
        <td colspan="8"><div class="pagelist" style="float: left;"> <a style="margin-left: 50px;" class="btn" type="button" onClick="location.href = '/boke/manager.php/Bak/index/Action/backup'">备份添加</a></div></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>