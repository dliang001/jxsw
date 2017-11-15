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
    <div class="panel-head"><strong class="icon-reorder"> 管理员列表</strong> 
    </div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="javascript:void(0);" onclick="adduser();"> 添加管理员</a> </li>
      
          <input type="text" placeholder="请输入管理员名字" name="keywords" class="input" style="width:250px; line-height:14px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li> 
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>用户名</th>
        <th>用户组</th>
        <th width="10%">添加时间</th>
        <th width="">操作</th>
      </tr>
      <?php if(is_array($userlist)): foreach($userlist as $key=>$v): ?><tr>
          <td style="text-align:left; padding-left:20px;">
            <!-- <input type="checkbox" name="id[]" value="<?php echo ($v['id']); ?>" /> -->
            <?php echo ($v['id']); ?>
            </td>
          <td><?php echo ($v['username']); ?></td>
          <td><?php echo ($v['g_name']); ?></td>
          
          <td><?php echo ($v['create_time']); ?></td>
          <td><div class="button-group"> <a class="button border-main" href="javascript:void(0);" onclick="edituser(<?php echo ($v['id']); ?>);"><span class="icon-edit"></span> 修改用户组 | 密码</a>
           </div></td>
        </tr><?php endforeach; endif; ?>
      <tr>
        <!-- <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="7" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a> <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a> 操作：
          
          </td> -->
      </tr>
      <!-- <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr> -->
    </table>
  </div>
</form>
<script type="text/javascript">
//  友情
function adduser(){
    
    layer.open({
          type: 2,
          title: false,
          area: ['60%', '50%'],
          shade: 0.8,
          shadeClose: true,
          content: '<?php echo U("Admin/adduser");?>'
        });

}

function edituser(id){
    
    layer.open({
          type: 2,
          title: false,
          area: ['60%', '50%'],
          shade: 0.8,
          shadeClose: true,
          content: '<?php echo U("Admin/adduser");?>?id='+id
        });

}

function delyouqing(id){
      
    layer.confirm('确认要删除吗？', {icon: 3, title:''}, function(index){
           
    $.post(
          '<?php echo U("Admin/delyq");?>',{id:id},
          function(rs)
          {
              if (rs ==1)
              {
                  layer.msg("删除成功");
                   setTimeout(function(){window.location.reload();},1000);
              }else{
                  layer.msg("删除失败");

              }
          },'json'
        );
  });
    
  
}





//搜索
function changesearch(){  
    
}



//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
    if (this.checked) {
      this.checked = false;
    }
    else {
      this.checked = true;
    }
  });
})

//批量删除
function DelSelect(){
  var Checkbox=false;
   $("input[name='id[]']").each(function(){
    if (this.checked==true) {   
    Checkbox=true;  
    }
  });
  if (Checkbox){
    var t=confirm("您确认要删除选中的内容吗？");
    if (t==false) return false;   
    $("#listform").submit();    
  }
  else{
    alert("请选择您要删除的内容!");
    return false;
  }
}

//批量排序
function sorts(){
  var Checkbox=false;
   $("input[name='id[]']").each(function(){
    if (this.checked==true) {   
    Checkbox=true;  
    }
  });
  if (Checkbox){  
    
    $("#listform").submit();    
  }
  else{
    alert("请选择要操作的内容!");
    return false;
  }
}


//批量首页显示
function changeishome(o){
  var Checkbox=false;
   $("input[name='id[]']").each(function(){
    if (this.checked==true) {   
    Checkbox=true;  
    }
  });
  if (Checkbox){
    
    $("#listform").submit();  
  }
  else{
    alert("请选择要操作的内容!");    
  
    return false;
  }
}

//批量推荐
function changeisvouch(o){
  var Checkbox=false;
   $("input[name='id[]']").each(function(){
    if (this.checked==true) {   
    Checkbox=true;  
    }
  });
  if (Checkbox){
    
    
    $("#listform").submit();  
  }
  else{
    alert("请选择要操作的内容!");  
    
    return false;
  }
}

//批量置顶
function changeistop(o){
  var Checkbox=false;
   $("input[name='id[]']").each(function(){
    if (this.checked==true) {   
    Checkbox=true;  
    }
  });
  if (Checkbox){    
    
    $("#listform").submit();  
  }
  else{
    alert("请选择要操作的内容!");    
  
    return false;
  }
}


//批量移动
function changecate(o){
  var Checkbox=false;
   $("input[name='id[]']").each(function(){
    if (this.checked==true) {   
    Checkbox=true;  
    }
  });
  if (Checkbox){    
    
    $("#listform").submit();    
  }
  else{
    alert("请选择要操作的内容!");
    
    return false;
  }
}

//批量复制
function changecopy(o){
  var Checkbox=false;
   $("input[name='id[]']").each(function(){
    if (this.checked==true) {   
    Checkbox=true;  
    }
  });
  if (Checkbox){  
    var i = 0;
      $("input[name='id[]']").each(function(){
        if (this.checked==true) {
        i++;
      }   
      });
    if(i>1){ 
        alert("只能选择一条信息!");
      $(o).find("option:first").prop("selected","selected");
    }else{
    
      $("#listform").submit();    
    } 
  }
  else{
    alert("请选择要复制的内容!");
    $(o).find("option:first").prop("selected","selected");
    return false;
  }
}

</script>
</body>
</html>