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
    <div class="panel-head"><strong class="icon-reorder"> 访客列表</strong> 
      <span style="margin-left: 10px;"><b style="color: red;"><?php echo ($time); ?> 今日访客：<?php echo ($taycount); ?>次</b></span  > 
      

    </div>
   
  <td colspan="10">
    <table class="table table-hover text-center">
      <tr>
             <!--  <div class="pagelist paging_bootstrap" style='text-align:center'>
              <ul class="pagination"><?php echo ($page); ?></ul>
              </div> -->

        <th width="10%" style="text-align:left; padding-left:20px;">ID</th>
        <th >IP</th>
        <th>浏览器</th>
        <th>浏览器语音</th>
        <th width="10%">操作系统</th>
        <th width="15%">地区</th>
        <th width="15%">访问时间</th>
      </tr>

     
      <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr style="height: 30px;">
          <td width="20" style=""><?php echo ($v['id']); ?> </td>
          <td width="100" ><?php echo ($v['ip']); ?></td>
          <td width="100" ><?php echo ($v['browser']); ?></td>
          <td width="100" ><?php echo ($v['language']); ?></td>
          <td width="100" ><?php echo ($v['os_name']); ?></td>
          <td width="450" ><?php echo ($v['city']); ?></td>
          <td width="250" ><?php echo ($v['createtime']); ?></td>
          <td>
        </tr><?php endforeach; endif; ?>

       <tr>
          <td colspan="10">
          <div class="pagelist paging_bootstrap" style='text-align:center'>
          <ul class="pagination"><?php echo ($page); ?></ul>
          </div>
          </td>
        </tr>
     
    </table>
  </div>
</form>
<script type="text/javascript">


</script>
</body>
</html>