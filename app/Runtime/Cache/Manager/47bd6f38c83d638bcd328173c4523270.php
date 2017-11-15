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
    width: 300px;
  }
  .form-x .form-group .label {
    width: 14%;
}
</style>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加子菜单</strong></div>
  <div class="body-content" style="margin-left: 50px;">
    <form method="post" class="form-x" action="" onsubmit="return addaction()"  enctype="multipart/form-data"  >  
      <?php if($edit || $pid == 0): else: ?>

      <div class="form-group">
        <div class="label" style="width: 110px;">
          <label>上级名称：</label>
        </div>
        <div class="field">
          <input  type="text" class="input w50" value="<?php echo ($name); ?>"  data-validate="required:请输入菜单" disabled />
          <div class="tips"></div>
        </div>
      </div><?php endif; ?>
      <div class="form-group">
        <div class="label" style="width: 110px;">
          <label>菜单名称：</label>
        </div>
        <div class="field">
          <input  type="text" class="input w50" value="<?php echo ($data['name']); ?>" id='name' name="name" data-validate="required:请输入菜单" />
          <div class="tips"></div>
        </div>
      </div>
      <?php if($edit && $mark != 2): else: ?>
        <div class="form-group">
        <div class="label">
          <label>控制器/方法：</label>
        </div>
        <div class="field">
          <input  type="text" class="input w50" value="<?php echo ($data['url']); ?>" id='url' name="url" data-validate="required:请输入模块方法" />
          <span style="color: #0ae;margin-left: 10px;">输入 控制器/方法即可 例如 Nav/index</span>
        </div>
      </div><?php endif; ?>
      <?php if($pid == 0): ?><div class="form-group">
            <div class="label">
              <label>图标：</label>
            </div>
            <div class="field">
              <input  type="text" class="input w50" value="<?php echo ($data['ico']); ?>" id='ico' name="ico" data-validate="required:请输入图标" />
              <span style="color: #0ae;margin-left: 10px;">icon图标 例如icon-user 输入后边user即可</span>
            </div>
          </div><?php endif; ?>
         <input type="hidden" name="id"  id='id' value="<?php echo ($data['id']); ?>">
      <?php if($edit): else: ?>   
         <input type="hidden" name="pid"  id='pid' value="<?php echo ($pid); ?>"><?php endif; ?>  
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


    function addaction()
    {
        if ($('#name').val() == '')
        {
           layer.msg("请输入菜单名称");  return false;
        }
        if($("#url").val() == '' )
        {
           layer.msg("控制器/方法不能为空");  return false;
        }

        var url  = $("#url").val();
        var name  = $("#name").val();
        var pid  = $("#pid").val();
        var id  = $("#id").val();

        submit('submit', '正在提交..'); 

        $.post(
          '<?php echo U("Action/addaction");?>',{name:name,url:url,pid:pid,id:id},
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
                
              }else{
                layer.msg('请您进行操作！');
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