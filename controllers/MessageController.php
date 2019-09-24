<?php

class MessageController extends Controller 
{
    // 如果沒有登入的SESSION，就轉址
    public function checkSignIn()
    {
        $oUserInfo = $_SESSION;
        if (!isset($oUserInfo["m_id"])) {
            $this->smarty->display("sign_in.html");
            exit;
        }
    }

    public function index()
    {
        $this->checkSignIn();
        // $data = $this->model('message')->getMessage();
        // $message_data = mysqli_fetch_assoc($data);
        // $this->$smarty->assign("message_data", $message_data);
        $this->smarty->display("message_select.html");
    }


}
