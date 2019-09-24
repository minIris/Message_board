<?php
class App
{
    public function __construct()
    {
        $url = $this->parseUrl();
        $controllerName = $url[0]."Controller";
        $controllerName = (!file_exists("controllers/$controllerName.php")) ? "MemberController" : $controllerName;
        
        require_once("controllers/$controllerName.php");
        $controller = new $controllerName;

        $action = isset($url[1]) ? $url[1] : "index";
        $action = (!method_exists($controller, $action)) ? "index" : $action;
        unset($url[0]); unset($url[1]);
        $params = $url ? array_values($url) : Array();
        call_user_func_array(Array($controller, $action), $params);  //呼叫$controller中的$methodName方法
    }

    //解析網址
    public function parseUrl()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = explode("/", $url);
            return $url;
        }
    }

}
