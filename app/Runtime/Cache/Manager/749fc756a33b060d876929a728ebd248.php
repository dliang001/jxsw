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
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="<?php echo U('Admin/add');?>"> 添加内容</a> </li>
    
        <form class="form-inline" role="form" action="<?php echo u('Admin/arlist');?>" method="get">
              <!--     <select name="cate" class="input" onchange="changesearch()" style="width:160px; line-height:14px; display:inline-block">
                  <option value="">请选择分类</option>
                  <?php if(is_array($cate)): foreach($cate as $key=>$v): if($id < 5 ): ?>value1
                  <?php else: ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v['name']); ?></option><?php endif; endforeach; endif; ?>
                </select> -->
                <select name="cate" class="input" style="width:160px; line-height:14px; display:inline-block" >
                        <option selected="selected" value="0">
                          请选择分类
                        </option>
                        <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($cate == $v['cate_id'] ): ?><option selected="selected" value="<?php echo ($v['cate_id']); ?>">
                              <?php echo ($v['name']); ?>
                            </option>
                            <?php else: ?>
                            <option value="<?php echo ($v['cate_id']); ?>">
                              <?php echo ($v['name']); ?>
                            </option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                      </select>

                    <input type="text" placeholder="请输入搜索关键字" name="qstr" class="input" style="width:250px; line-height:14px;display:inline-block" value="<?php echo ($qstr); ?>" />



                      <button type="submit" class="button border-main icon-search">搜索</button>


                  </div>
      </ul>

    </div>
  <td colspan="10">
    <table class="table table-hover text-center">
      
      <tr>
              <div class="pagelist paging_bootstrap" style='text-align:center'>
              <ul class="pagination"><?php echo ($Page); ?></ul>
              </div>

        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>标题</th>
        <!-- <th>图片</th> -->
        <th>分类名称</th>

        <th width="10%">添加时间</th>
        <th width="10%">缩略图</th>
        <th width="10%">描述</th>

        <th width="310">操作</th>
      </tr>

     
      <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
          <td style="text-align:left; padding-left:20px;">
            <!-- <input type="checkbox" name="id[]" value="<?php echo ($v['id']); ?>" /> -->
            <?php echo ($v['id']); ?>
            </td>
          <td><?php echo ($v['title']); ?></td>
          <!-- <td width="10%"><img src="<?php echo ($v['picurl'][0]['src']); ?>" alt="" width="70" height="50" /></td> -->
          <!-- <td><font color="#00CC99"><?php echo ($v["cname"]); ?></font></td> -->
          <td><?php echo ($v['name']); ?></td>
          
          <td><?php echo ($v['createtime']); ?></td>
          <td><img style="height: 50px; width: 50px;" src="/boke/Uploads/<?php echo ($v['img']); ?>"></td>
          <td><?php echo ($v['desc']); ?></td>




          <td><div class="button-group"> <a class="button border-main" href="<?php echo U('Admin/add');?>?id=<?php echo ($v['id']); ?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="<?php echo U('Admin/del');?>?id=<?php echo ($v['id']); ?>"><span class="icon-trash-o"></span> 删除</a> </div></td>
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

</body>
</html>