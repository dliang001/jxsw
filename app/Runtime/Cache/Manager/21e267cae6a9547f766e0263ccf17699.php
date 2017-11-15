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
    <div class="panel-head"><strong class="icon-reorder"> 采集列表</strong> <a href="" style="float:right; display:none;">添加采集果子</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="javascript:void(0);" > 添加采集规则</a> </li>
        <!-- <li>分类标签
          <select name="s_ishome" class="input" onchange="changesearch()" style="width:160px; line-height:14px; display:inline-block">
            <option value="">请选择分类</option>
            <?php if(is_array($catelist)): foreach($catelist as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
          </select>
        </li>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:14px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li> -->
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>采集分类</th>
        <th>类型</th>
        <th>采集目标网站</th>
        <th width="10%">采集页数</th>
        <th width="310">操作</th>
      </tr>
      <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
          <td style="text-align:left; padding-left:20px;">
            <!-- <input type="checkbox" name="id[]" value="<?php echo ($v['id']); ?>" /> -->
            <?php echo ($v['id']); ?>
            </td>
          <td><?php echo ($v['cname']); ?></td>
          <td><?php echo ($v['name']); ?></td>
          <td><?php echo ($v['mbcid']); ?></td>
          <td><a target="_blank" href="<?php echo ($v["url"]); ?>"><font color="#00CC99"><?php echo (msubstr($v["url"],0,45)); ?></font></a></td>
          
          <td><?php echo ($v['page']); ?></td>
          <td><?php echo ($v['createtime']); ?></td>
          <td><div class="button-group"> <a class="button border-main" href="javascript:void(0);" onclick="edit(<?php echo ($v['id']); ?>);"><span class="icon-edit"></span> 修改</a>
           <a class="button border-red" href="javascript:void(0);" onclick="caiji('<?php echo ($v['action']); ?>',<?php echo ($v['page']); ?>,<?php echo ($v['cid']); ?>);" ><span class="icon-trash-o"></span> 开始采集</a> </div></td>
        </tr><?php endforeach; endif; ?>
      <tr>
      </tr>
      <!-- <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr> -->
    </table>
  </div>
</form>
<script type="text/javascript">
//  友情
function addyq(){
    
    layer.open({
          type: 2,
          title: false,
          area: ['60%', '50%'],
          shade: 0.8,
          shadeClose: true,
          content: '<?php echo U("Admin/addyouqing");?>'
        });

}

function edit(id){
    
    layer.open({
          type: 2,
          title: false,
          area: ['60%', '50%'],
          shade: 0.8,
          shadeClose: true,
          content: '<?php echo U("Admin/addyouqing");?>?id='+id
        });

}

function caiji(act,page,cid){

 layer.confirm('确认采集吗？', {icon: 3, title:''}, function(index){
     layer.msg('正在采集中,请稍后......', {time: 30000, icon:6});
    location.href = "/manager.php/Collection/"+act+"?max_page=" + page+ "&cid=" + cid;

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