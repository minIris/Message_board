<?php

class Controller
{
    public function __construct()
    {
        //Smarty檔
        include_once("libs/Smarty.class.php"); //包含smarty类文件
        $this->smarty = new Smarty();  //建立smarty实例对象$smarty
        $this->smarty->caching = false;    //true开启缓存，false关闭缓存
        $this->smarty->left_delimiter="<{";
        $this->smarty->right_delimiter="}>";

        session_start();
    }

    public function model($model) {
        require_once("models/$model.php");
        return new $model ();
    }

}
