<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="<?php echo (BOKE_STATIC_PATH); ?>/manager/swfuplod/js/jquery-1.7.1.min.js" xmlns="http://www.w3.org/1999/html"></script>

<?php if(is_array($param)): foreach($param as $key=>$v): ?><div class="form-group" >
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
        <?php echo ($v["output"]); ?></label>
        <div class="col-sm-10">
            <div  class="preview" id="view-"<?php echo ($key); ?>><img width="200px" src= "<?php echo ($v["val"]); ?>"> <?php if($v['val']){ ?><a style="margin-left: 100px;" target="_blank" href="<?php echo ($v["val"]); ?>">点击查看</a> <?php }?></div>
            <input type="file" onchange="preview(this)" name="<?php echo ($v["name"]); ?>"  />
        </div>
    </div>
    <!-- <hr/> --><?php endforeach; endif; ?>
<script type="text/javascript">
    function preview(file)
    {
        var prevDiv = $(file).prev('.preview');
        console.log(prevDiv);
        if (file.files && file.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(evt){
                prevDiv.html();
                prevDiv.html('<img width="200px" src="' + evt.target.result + '" />');
            }
            reader.readAsDataURL(file.files[0]);
        }
        else
        {
            prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
        }
    }
</script>