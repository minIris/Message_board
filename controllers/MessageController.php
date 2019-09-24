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
        $data = $this->model('message')->getMessage();
        $row_data = mysqli_fetch_assoc($data);
        $message_data = [];
        while ($row_data = mysqli_fetch_assoc($data)) {
            $message_data[] = array(
                "mb_no"          => $row_data["mb_no"],
                "m_id"           => $row_data["m_id"],
                "content"        => $row_data["content"],
                "insert_time"    => $row_data["insert_time"],
                "update_time"    => $row_data["update_time"],
                "qualifications" => ($_SESSION['m_id'] === $row_data["m_id"] or $_SESSION['m_permission'] === '1') ? true : false,
            );
        }
        $this->smarty->assign("title", "留言板");
        $this->smarty->assign("m_id", $_SESSION["m_id"]);
        $this->smarty->assign("m_no", $_SESSION["m_no"]);
        $this->smarty->assign("message_data", $message_data);
        $this->smarty->display("message_select.html");
    }


}
