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
<script type="text/javascript" charset="utf-8" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/ueditor/ueditor.all.min.js">
</script>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/ueditor/lang/zh-cn/zh-cn.js"></script>
<style type="text/css">
.input {
    padding: 6px;
    width: 500px;
}
</style>

<body>
    <div class="panel admin-panel">
        <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>领导信息</strong></div>
        <div class="body-content">
            <form method="post" class="form-x" action="<?php echo U('Admin/addarticle');?>" onsubmit="return addarticle()" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo ($data['a_id']); ?>">
                    <input type="hidden" name="cid" value="24">
                    <div class="label">
                        <label>主标题：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" value="<?php echo ($data['title']); ?>" id="title" name="title" data-validate="required:请输入标题" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>副标题：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" value="<?php echo ($data['subtitle']); ?>" id="subtitle" name="subtitle" data-validate="required:请输入副标题" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>图片：</label>
                    </div>
                    <div class="label">
                        <?php if($data['imgurl'] != '' ): ?><img style="height: 50px; width: 50px;" src="/boke/Uploads/<?php echo ($data['imgurl']); ?>">
                            <input type="file" id="xdaTanFileImg" name="imgurl" onchange="xmTanUploadImg(this)" accept="image/*" />
                            <?php else: ?>
                            <input type="file" id="xdaTanFileImg" name="imgurl" onchange="xmTanUploadImg(this)" accept="image/*" /><?php endif; ?>
                        <img id="xmTanImg" />
                    </div>
                    <!-- <div> -->
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>作者：</label>
                    </div>
                    <div class="field">
                        <?php if($data['author'] != '' ): ?><input type="text" class="input w50" name="author" value="<?php echo ($data['author']); ?>" />
                            <?php else: ?>
                            <input type="text" class="input w50" name="author"  /><?php endif; ?>
                        <div class="tips"></div>
                    </div>
                </div>
               <!--  <div class="form-group">
                    <div class="label">
                        <label>是否首页显示:</label>
                    </div>
                    <div class="field">
                        <label>
                            <?php if($data['isindex'] == '0' ): ?><input type="radio" name="isindex" value="0" checked>不首页显示
                                <?php else: ?>
                                <input type="radio" name="isindex" value="0">不首页显示<?php endif; ?>
                        </label>
                        <label>
                           <?php if($data['isindex'] == '1' ): ?><input type="radio" name="isindex" value="1" checked>首页显示
                                <?php else: ?>
                                <input type="radio" name="isindex" value="1">首页显示<?php endif; ?>
                        </label>
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>是否置顶:</label>
                    </div>
                    <div class="field">
                        <label>
                           <?php if($data['istop'] == '0' ): ?><input type="radio" name="istop" value="0" checked>不置顶
                                <?php else: ?>
                                <input type="radio" name="istop" value="0">不置顶<?php endif; ?>
                        </label>
                        <label>
                             <?php if($data['istop'] == '1' ): ?><input type="radio" name="istop" value="1" checked>置顶
                                <?php else: ?>
                                <input type="radio" name="istop" value="1">置顶<?php endif; ?>
                        </label>
                        <div class="tips"></div>
                    </div>
                </div> -->
              <!--   <div class="form-group">
                    <div class="label">
                        <label>是否通过审核:</label>
                    </div>
                    <div class="field">
                        <label>
                           <?php if($data['type'] == '0' ): ?><input type="radio" name="type" value="0" checked>未审核
                                <?php else: ?>
                                <input type="radio" name="type" value="0">未审核<?php endif; ?>
                        </label>
                        <label>
                             <?php if($data['type'] == '1' ): ?><input type="radio" name="type" value="1" checked>已审核
                                <?php else: ?>
                                <input type="radio" name="type" value="1">已审核<?php endif; ?>
                        </label>
                        <div class="tips"></div>
                    </div>
                </div> -->
                <!--  <p>
                图片上传前预览：<input type="file" id="xdaTanFileImg" onchange="xmTanUploadImg(this)" accept="image/*"/>
                <input type="button" value="隐藏图片" onclick="document.getElementById('xmTanImg').style.display = 'none';"/>
                <input type="button" value="显示图片" onclick="document.getElementById('xmTanImg').style.display = 'block';"/>
            </p>
            
            <div id="xmTanDiv"></div> -->
                <div class="form-group">
                    <div class="label">
                        <label>内容：</label>
                    </div>
                    <textarea id="editor" style="width:100%;height:450px;" name="content"><?php echo ($data["content"]); ?></textarea>
                    <div class="tips"></div>
                </div>
                <div class="clear"></div>
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
</body>

</html>
<script type="text/javascript">
//判断浏览器是否支持FileReader接口
if (typeof FileReader == 'undefined') {
    document.getElementById("xmTanDiv").InnerHTML = "<h1>当前浏览器不支持FileReader接口</h1>";
    //使选择控件不可操作
    document.getElementById("xdaTanFileImg").setAttribute("disabled", "disabled");
}

//选择图片，马上预览
function xmTanUploadImg(obj) {
    var file = obj.files[0];

    console.log(obj);
    console.log(file);
    console.log("file.size = " + file.size); //file.size 单位为byte

    var reader = new FileReader();

    //读取文件过程方法
    reader.onloadstart = function(e) {
        console.log("开始读取....");
    }
    reader.onprogress = function(e) {
        console.log("正在读取中....");
    }
    reader.onabort = function(e) {
        console.log("中断读取....");
    }
    reader.onerror = function(e) {
        console.log("读取异常....");
    }
    reader.onload = function(e) {
        console.log("成功读取....");

        var img = document.getElementById("xmTanImg");
        img.src = e.target.result;
        //或者 img.src = this.result;  //e.target == this
    }

    reader.readAsDataURL(file)
}
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor');


function addarticle() {
    if ($('#title').val() == '') {
        layer.msg("请输入标题");
        return false;
    }
    if ($('#subtitle').val() == '') {
        layer.msg("请输入副标题");
        return false;
    }




    return true;
}
</script>