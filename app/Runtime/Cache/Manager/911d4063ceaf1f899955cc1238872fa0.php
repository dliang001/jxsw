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
    width: 500px;
  }
</style>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Admin/addarticle');?>" onsubmit="return addarticle()"  enctype="multipart/form-data"  >  
      <div class="form-group">
      <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
        <div class="label">
          <label>主标题：</label>
        </div>
        <div class="field">
          <input  type="text" class="input w50" value="<?php echo ($data['title']); ?>" id='title' name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <?php if($data['id'] != '' ): ?><img style="height: 50px; width: 50px;" src="/boke/Uploads/<?php echo ($data['img']); ?>"><input type="file" name="photo" />
        <?php else: ?><input type="file" name="photo" /><?php endif; ?>
        <!-- <div> -->
      </div>  
        <div class="form-group">
          <div class="label">
            <label>标签：</label>
          </div>
          <div class="field">
            <select name="cid" class="input w50">
             <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option  value="<?php echo ($v["cate_id"]); ?>" ><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>
            </select>
              
            <div class="tips"></div>
          </div>
        </div>
    
      <div class="form-group">
        <div class="label">
          <label>描述：</label>
        </div>
        <div class="field">
          <textarea class="input"  id='desc' name="desc" style=" height:90px;"><?php echo ($data['desc']); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
            <textarea id="editor"  style="width:100%;height:450px;" name="content"><?php echo ($data["content"]); ?></textarea>
          <div class="tips"></div>
      </div>
     
      <div class="clear"></div>
      
      
     <!--  <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input style="width: 200px;" type="text" class="input w50" id='sort' name="sort" value="<?php echo ($data['sort']); ?>"  data-validate="number:排序必须为数字" />
          <div class="tips"></div>
        </div>
      </div> -->
   
      <!-- <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">/ -->
      <!-- <div class="form-group">
        <div class="label">
          <label>点击次数：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="views" value="" data-validate="member:只能为数字"  />
          <div class="tips"></div>
        </div>
      </div> -->
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
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


    function addarticle()
    {
        if ($('#title').val() == '')
        {
           layer.msg("请输入标题");  return false;
        }
        if($("#desc").val() == '' )
        {
           layer.msg("描述不能为空");  return false;
        }


       

        return true;
    }

</script>