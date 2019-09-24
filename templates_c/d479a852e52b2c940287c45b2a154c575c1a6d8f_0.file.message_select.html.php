<?php
/* Smarty version 3.1.33, created on 2019-09-24 12:10:18
  from 'C:\xampp\htdocs\message_board\templates\message_select.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d89eb8a3477b2_12559215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd479a852e52b2c940287c45b2a154c575c1a6d8f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\message_board\\templates\\message_select.html',
      1 => 1569319596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d89eb8a3477b2_12559215 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <meta http-equiv="Content-Type" content="text/htmlcharset=utf-8">
        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/message_select.css">
        
        <?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="../js/message_select.js" charset="UTF-8" defer><?php echo '</script'; ?>
>
        
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    </head>
    <body id="mybody">
        <div class="container">
            <div class="wrap">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">會員留言板</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right out-btn">
                        <input type="hidden" id="m_no" value="<?php echo $_smarty_tpl->tpl_vars['m_no']->value;?>
">
                        <?php echo $_smarty_tpl->tpl_vars['m_id']->value;?>
 
                        <input type="button" class="btn btn-warning" id="out" name="out" value="登出" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['message_data']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                                <tr id="msg_tr_<?php echo $_smarty_tpl->tpl_vars['data']->value['mb_no'];?>
">
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['data']->value['qualifications']) {?>
                                            <input type="hidden" name="memberID" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mb_no'];?>
">
                                            <input type="button"  class="Buttonupd btn btn-info"  value="修改">
                                            <input type="button"  class="Buttondel btn btn-info"  value="刪除">
                                            <br>
                                        <?php }?>
                                        留言人：<?php echo $_smarty_tpl->tpl_vars['data']->value['m_id'];?>
<br>
                                        內容：<pre id="msg_text_<?php echo $_smarty_tpl->tpl_vars['data']->value['mb_no'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</pre>
                                        留言時間：<?php echo $_smarty_tpl->tpl_vars['data']->value['insert_time'];?>
<br>
                                        <span id="msg_up_time_<?php echo $_smarty_tpl->tpl_vars['data']->value['mb_no'];?>
">
                                        <?php if ($_smarty_tpl->tpl_vars['data']->value['update_time'] != null) {?>
                                            最後修改留言時間：<?php echo $_smarty_tpl->tpl_vars['data']->value['update_time'];?>

                                        <?php }?>
                                        </span>
                                    </td>
                                </tr>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row null-footer">
            </div>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="pagination">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['showPage']->value['url'];?>
page=1">&laquo;</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['showPage']->value['url'];?>
page=<?php echo $_smarty_tpl->tpl_vars['showPage']->value['prev'];?>
">&lt;</a></li>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['showPage']->value['pageList'], 'page');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
?>
                                        <li<?php if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['showPage']->value['now_page']) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['showPage']->value['url'];?>
page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['showPage']->value['url'];?>
page=<?php echo $_smarty_tpl->tpl_vars['showPage']->value['next'];?>
">&gt;</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['showPage']->value['url'];?>
page=<?php echo $_smarty_tpl->tpl_vars['showPage']->value['total_page'];?>
">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>新增留言</h4>
                            <textarea class="form-control" id="in_content" name="in_content"></textarea>
                            <br>
                            剩餘<span id="textCount">50</span>個字
                            <input type="button" class="btn btn-success" id="in_submit" value="送出">
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="div_update">
                <div class="row">
                    <div class="col-md-12">
                        <h4 id="update_title">修改留言內容</h4>
                        <input type="hidden" name="mb_no" id="mb_no" />
                        <textarea class="form-control" id="up_conkent" name="content"></textarea>
                        <div class="row up_btn_row">
                            <div class="col-md-12">
                                <input type="button" class="btn btn-info" id="btn_update" name="update" value="送出修改">
                                <input type="button" class="btn btn-info" id="up_cancel" name="up_cancel" value="取消">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html><?php }
}
