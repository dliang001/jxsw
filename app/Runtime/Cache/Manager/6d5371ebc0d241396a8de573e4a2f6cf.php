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
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
        <ul class="search" style="padding-left:10px;">
            <li> <a class="button border-main icon-plus-square-o" href="<?php echo U('Company/add',array('cid'=>19));?>"> 添加内容</a> </li>
            <form class="form-inline" role="form" action="<?php echo u('Company/news');?>" method="get">
                <input type="text" placeholder="请输入搜索关键字(标题/作者)" name="qstr" class="input" style="width:250px; line-height:14px;display:inline-block" value="<?php echo ($qstr); ?>" />
                <button type="submit" class="button border-main icon-search">搜索</button>
    </div>
    </ul>
</div>
<td colspan="10">
    <table class="table table-hover text-center">
        <tr>
            <th width="17%" style="text-align:left; padding-left:30px;">标题</th>
            <th width="8%">作者</th>
            <th width="15%">发布时间</th>
            <th width="10%">审核状态</th>
            <th width="10%">是否首页显示</th>
            <th width="9%">是否置顶</th>
            <th width="350">操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                <td style="text-align:left; padding-left:30px;">
                    <!-- <input type="checkbox" name="id[]" value="<?php echo ($v['id']); ?>" /> -->
                    <?php echo ($v['title']); ?>
                </td>
                <td><?php echo ($v['author']); ?></td>
                <!-- <td width="10%"><img src="<?php echo ($v['picurl'][0]['src']); ?>" alt="" width="70" height="50" /></td> -->
                <!-- <td><font color="#00CC99"><?php echo ($v["cname"]); ?></font></td> -->
                <td><?php echo ($v['createtime']); ?></td>
                <td class="indext<?php echo ($v['a_id']); ?>">
                    <?php switch($v['type']): case "0": ?><span style="color:#045cf1;">审核中</span><?php break;?>
                        <?php case "1": ?><span style="color:#11bb0a;">已通过</span><?php break;?>
                        <?php case "2": ?><span style="color: red;">已驳回</span><?php break; endswitch;?>
                </td>
                <td class="index<?php echo ($v['a_id']); ?>">
                    <?php if($v['isindex'] == 1): ?>是
                        <?php else: ?> <span style="color: red;">否</span><?php endif; ?>
                </td>
                <td class="indexs<?php echo ($v['a_id']); ?>">
                    <?php if($v['istop'] == 1): ?>是
                        <?php else: ?> <span style="color: red;">否</span><?php endif; ?>
                </td>
                <!-- <td><img style="height: 50px; width: 50px;" src="/boke/Uploads/<?php echo ($v['img']); ?>"></td> -->
                <td class="parent_btn<?php echo ($v['a_id']); ?>">
                    <!-- 表示一个成功的或积极的动作 -->
                    <?php if($v['isindex'] == 1): ?><button type="button" class="btn btn-success btn-sm index_btn<?php echo ($v['a_id']); ?>" onclick="editIndex(<?php echo ($v['a_id']); ?>,'0')">取消首页显示</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-success btn-sm index_btn<?php echo ($v['a_id']); ?>" onclick="editIndex(<?php echo ($v['a_id']); ?>,'1')">首页显示</button><?php endif; ?>
                    <?php if($v['istop'] == 1): ?><button type="button" class="btn btn-info btn-sm index_btns<?php echo ($v['a_id']); ?>" onclick="editistop(<?php echo ($v['a_id']); ?>,'0')">取消置顶</button>
                        <?php else: ?>
                        <button type="button" class="btn btn-info btn-sm index_btns<?php echo ($v['a_id']); ?>" onclick="editistop(<?php echo ($v['a_id']); ?>,'1')">置顶</button><?php endif; ?>
                    <!-- 提供额外的视觉效果，标识一组按钮中的原始动作 -->
                        <?php if($v['type'] == 0): ?><button type="button" class="btn btn-primary btn-sm index_btnt<?php echo ($v['a_id']); ?> " onclick="editType(<?php echo ($v['a_id']); ?>,'1')">审核</button><?php endif; ?>
                    <!-- 表示应谨慎采取的动作 -->
                    <a href="<?php echo U('Company/add',array('id'=>$v['a_id'],'cid'=>$v['cid']));?>">
                        <button type="button" class="btn btn-warning btn-sm">编辑</button>
                    </a>
                    <!-- 表示一个危险的或潜在的负面动作 -->
                    <a href="<?php echo U('Company/del',array('id'=>$v['a_id']));?>">
                        <button type="button" class="btn btn-danger btn-sm">删除</button>
                    </a>
                    <!-- 并不强调是一个按钮，看起来像一个链接，但同时保持按钮的行为 -->
                    <!-- <div class="button-group"> <a class="button border-main" href="<?php echo U('Admin/add');?>?id=<?php echo ($v['id']); ?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="<?php echo U('Admin/del');?>?id=<?php echo ($v['id']); ?>"><span class="icon-trash-o"></span> 删除</a> </div> -->
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
    <div class="pagelist paging_bootstrap" style='text-align:center'>
        <ul class="pagination"><?php echo ($Page); ?></ul>
    </div>
    </div>
    </body>
    <script>
    //操作首页是否显示  status参数为1设置置顶 参数为0设置不置顶
    function editIndex(article_id, status) {
        //alert(article_id);alert(status);
        $.ajax({
            url: '/boke/manager.php/Company/editIndexStatus',
            data: { "status": status, "article_id": article_id },
            dataType: "json",
            type: 'post',
            success: function(msg) {
                if (msg.error == 0) { //修改成功
                    if (status == '1') {
                        $("[class=index" + article_id + "]").html('是');
                        $(".index_btn" + article_id).remove();
                        $("[class=parent_btn" + article_id + "]").prepend("<button type='button' class='btn btn-success btn-sm index_btn" + article_id + "' onclick='editIndex(" + article_id + ",0)'>取消首页显示</button>");

                    } else {
                        $("[class=index" + article_id + "]").html("<span style='color: red;'>否</span>");
                        $(".index_btn" + article_id).remove();
                        $("[class=parent_btn" + article_id + "]").prepend("<button type='button' class='btn btn-success btn-sm index_btn" + article_id + "' onclick='editIndex(" + article_id + ",1)'>首页显示</button>");

                    }
                } else { //修改失败
                    alert(msg['msg']);
                }

            }
        });
    }
    //操作首页是否显示  status参数为1设置置顶 参数为0设置不置顶
    function editistop(article_id, status) {
        //alert(article_id);alert(status);
        $.ajax({
            url: '/boke/manager.php/Company/editistop',
            data: { "status": status, "article_id": article_id },
            dataType: "json",
            type: 'post',
            success: function(msg) {
                if (msg.error == 0) { //修改成功
                    if (status == '1') {
                        $("[class=indexs" + article_id + "]").html('是');
                        $(".index_btns" + article_id).remove();
                        $("[class=parent_btn" + article_id + "]").prepend("<button type='button' class='btn btn-info btn-sm index_btns" + article_id + "' onclick='editistop(" + article_id + ",0)'>取消置顶</button>");

                    } else {
                        $("[class=indexs" + article_id + "]").html("<span style='color: red;'>否</span>");
                        $(".index_btns" + article_id).remove();
                        $("[class=parent_btn" + article_id + "]").prepend("<button type='button' class='btn btn-info btn-sm index_btns" + article_id + "' onclick='editistop(" + article_id + ",1)'>置顶</button>");

                    }
                } else { //修改失败
                    alert(msg['msg']);
                }

            }
        });
    }
     //操作首页是否显示  status参数为1设置置顶 参数为0设置不置顶
    function editType(article_id, status) {
        //alert(article_id);alert(status);
        $.ajax({
            url: '/boke/manager.php/Company/auditing',
            data: { "status": status, "article_id": article_id },
            dataType: "json",
            type: 'post',
             success: function(msg) {
                if (msg.error == 0) { //修改成功
                    if (status == '1') {
                        $("[class=indext" + article_id + "]").html("<span style='color:#11bb0a;'>已通过</span>");
                        $(".index_btnt" + article_id).remove();
                        
                    }
                } else { //修改失败
                    alert(msg['msg']);
                }

            }
        });
    }
    </script>

    </html>