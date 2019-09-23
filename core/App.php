<?php
class App
{
    public function __construct()
    {
        $url = $this->parseUrl();
        $controllerName = $url[0]."Controller";

        require_once "controllers/$controllerName.php"
        $controller = new $controllerName;
        $methodName = $url[1];
        unset($url[0]); unset($url[1]);
        $params = $url ? array_values($url) : Array();
        call_user_func_array(Array($controller, $methodName), $params);  //呼叫$controller中的$methodName方法
    }

    public function parseUrl()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = explode("/", $url);
            return $url;
        }
    }

}
