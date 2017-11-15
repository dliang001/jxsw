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
    <div class="panel-head"><strong class="icon-reorder"> 分配权限 【<?php echo ($title); ?>】</strong> 
    </div>
<style type="text/css">
  input[type="checkbox"], 
  input[type="radio"]{ width:12px; height: 20px;vertical-align:-3px;margin-right:5px;}

</style>
<div class="page-content">

  <div class="col-sm-6" style="width:100%">
    
    <div class="tab-content">
      <div class="row">
                  <div class="col-xs-12">
                   <form action="<?php echo U('Admin/fenaction');?>" method="POST" >
                    <div class="table-responsive">
                    <input type="hidden" name="id" value="<?php echo ($id); ?>"> 
                      <table style="margin:1px;" id="sample-table" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th width="10%">菜单</th>
                            <th width="90%">功能</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(is_array($actionList)): foreach($actionList as $k=>$vo): ?><tr id="tr_<?php echo ($vo["id"]); ?>">
                            <th style="text-align:center;vertical-align:middle;"> 
                              <label> <input type="checkbox" name="data[menu][]" value="<?php echo ($vo["id"]); ?>" onclick="setAuth(this, 'menu', <?php echo ($vo["id"]); ?>)" <?php echo ($vo["checked"]); ?>> <?php echo ($vo["name"]); ?> </label> 
                            </th>
                            <td >
                              <?php if(is_array($vo['child'])): foreach($vo['child'] as $key=>$c): ?><label style="display:block;margin-top:10px;margin-left: 30px;"><input type="checkbox" class="menu_<?php echo ($c["id"]); ?>" id="method_<?php echo ($c["id"]); ?>" pid="<?php echo ($vo["id"]); ?>" name="data[menu][]" value="<?php echo ($c["id"]); ?>" onclick="setAuth(this, 'method', <?php echo ($c["id"]); ?>)"  <?php echo ($c["checked"]); ?>> <?php echo ($c["name"]); ?></label> 
                                  <span style="margin-left: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ∟</span> 
                                  <?php if(is_array($c['child'])): foreach($c['child'] as $key=>$cc): ?><label style="margin-left:10px;margin-left: 30px;"><input class="menu_<?php echo ($c["id"]); ?>" type="checkbox" pid="<?php echo ($c["id"]); ?>" ppid="<?php echo ($vo["id"]); ?>"  name="data[menu][]" value="<?php echo ($cc["id"]); ?>" onclick="setAuth(this, 'action', <?php echo ($vo["id"]); ?>)" <?php echo ($cc["checked"]); ?>> <?php echo ($cc["name"]); ?></label><?php endforeach; endif; endforeach; endif; ?>  
                            </td>
                          </tr><?php endforeach; endif; ?>   
                        </tbody>
                      
                      </table>
                    <div class="form-group" style="margin-left: 140px;">
                      <div class="label">
                        <label></label>
                      </div>
                      <div class="field">
                        <button class="button bg-main icon-check-square-o" id='submit' type="submit"> 提交</button>
                      </div>
                    </div>
                    </form>
                  </div>
                    </div><!-- /.table-responsive -->
                  </div><!-- /span -->
                </div>
      
      
    </div>
  </div>
                   
</div><!-- /.page-content -->
<script type="text/javascript">


    function setAuth(_this, _type, _id)
    {
        switch (_type)
        {
           //点击主菜单所有子菜单都要被选中
           case 'menu' :
             if (! $(_this).is(":checked")) 
             {
                $("#tr_"+_id).find("input").prop("checked",false);
             } else {
                $("#tr_"+_id).find("input").prop("checked", true);
             } 
             break;
           case 'method' :
                if (! $(_this).is(":checked")) 
               {
                  $(".action_"+_id).prop("checked",false);
               } else {
                  $(".action_"+_id).prop("checked", true);
               } 
               menuCheck($(_this).attr('pid'));
           break;
           case 'action' :
                if ($(_this).is(":checked")) 
               {
                  $("#method_"+$(_this).attr('pid')).prop("checked",true);
                  $("#tr_"+$(_this).attr('ppid')).find('input').eq(0).prop("checked", true);
               } 
           break;
        }
    }

    //判断是否选中主菜单
    function menuCheck(_id)
    {
        var status = false;
        $("#tr_"+_id).find('input').each(function(i){
          //排除第一个
            if (i > 0) {
              if ( $("#tr_"+_id).find('input').eq(i).is(":checked") ) status = true;
            }
        });
        if (status)
        {
            $("#tr_"+_id).find('input').eq(0).prop("checked", true);
        } else {
            $("#tr_"+_id).find('input').eq(0).prop("checked", false);
        }
    }

    //系统选择
    function systemOption(_this)
    {
        var app = $(_this).find("option:selected").val();
        window.location.href = "<?php echo ($formAction); ?>?ID=<?php echo ($_GET['ID']); ?>&CityId=<?php echo ($_GET['CityId']); ?>&app="+app;
    }
</script>