<?php
/* Smarty version 3.1.33, created on 2019-09-24 12:02:10
  from 'C:\xampp\htdocs\message_board\templates\sign_in.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d89e9a29c6883_68594187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e595c7d8a434e855b4f4b8017db0ebd5bfbdf2ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\message_board\\templates\\sign_in.html',
      1 => 1569319328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d89e9a29c6883_68594187 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/message_board/css/sign.css" type="text/css">

    <?php echo '<script'; ?>
 src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/message_board/js/sign.js" charset="UTF-8" defer><?php echo '</script'; ?>
>
    
    <title>會員登入</title>
</head>
<body>
    <div class="sign-div">
        <form>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-fixed">
                        <div class="text-center">
                            <div class="small-div">
                                <h1>會員登入</h1>
                                <hr>
                                <input type="text" class="form-control re_input sign_input" placeholder="帳號" id="m_id" />
                                <input type="password" class="form-control sign_input" placeholder="密碼" id="m_password" />
                                <div class="btn-div">
                                    <input type="button" class="btn btn-info" id="btn_sign" value="登入" />
                                    <input type="reset" class="btn btn-info" name="reset" value="清除"/>
                                    <input type="button" class="btn btn-primary" id="btn_registered" value="註冊"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html><?php }
}
