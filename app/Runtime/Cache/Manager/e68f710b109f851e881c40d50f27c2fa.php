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
<script type="text/javascript" charset="utf-8" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/ueditor/lang/zh-cn/zh-cn.js"></script>
<style type="text/css">
  .input{
    padding: 6px;
    width: 210px;
  }
</style>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加管理员</strong></div>
  <div class="body-content" style="margin-left: 50px;">
    <form method="post" class="form-x" action="" onsubmit="return adduser()"  enctype="multipart/form-data"  >  
      <div class="form-group">
        <div class="label" style="width: 100px;">
          <label>用户名：</label>
        </div>
        <div class="field">
          <input  type="text" class="input w50" value="<?php echo ($data['username']); ?>" id='username' name="username" data-validate="required:请输入用户名" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label" style="width: 100px;">
          <label>密码：</label>
        </div>
        <div class="field">
        <?php if($data): ?><input  type="password" class="input w50" value="" id='password' name="password" data-validate="required:请输入密码" />
          <span style="color: #0ae; margin-left: 20px;" >注：不修改密码留空即可。</span>
        <?php else: ?>
          <input  type="password" class="input w50" value="<?php echo ($data['password']); ?>" id='password' name="password" data-validate="required:请输入密码" /><?php endif; ?>
            
          
          <div class="tips"></div>
        </div>
      </div>

     <div class="form-group">
          <div class="label" style="width: 100px;">
            <label>用户组：</label>
          </div>
          <div class="field">
            <select name="group" id='group' class="input w50">
             <?php if(is_array($grouplist)): foreach($grouplist as $key=>$v): ?><option  value="<?php echo ($v["id"]); ?>" <?php if($data['group'] == $v['id']): ?>selected<?php endif; ?> ><?php echo ($v['title']); ?></option><?php endforeach; endif; ?>
            </select>
            <div class="tips"></div>
          </div>
      </div>
       
         <input type="hidden" name="id"  id='id' value="<?php echo ($data['id']); ?>">
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" id='submit' type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function adduser()
    {
        var id = $("#id").val();
        
        var username  = $("#username").val();
        if ($('#username').val() == '')
        {
           layer.msg("请输入用户名");  return false;
        }
        var password  = $("#password").val();
        // if ($('#password').val() == '')
        // {
        //    layer.msg("密码不能为空");  return false;
        // }
      
        var group     = $("#group").find("option:selected").val();
        submit('submit', '正在提交..'); 

        $.post(
          '<?php echo U("Admin/adduser");?>',{username:username,password:password,group:group,id:id},
          function(rs)
          {
              if(rs==1)
              {
                layer.msg('操作成功！');
                setTimeout(function(){
                    parent.layer.msg(rs.msg);
                    parent.window.location.reload();
                    parent.layer.close(index);
                },2000);
                
              }
              
          },'json'
        );

        return false;


    }

</script>