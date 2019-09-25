<?php

class MessageController extends Controller 
{

    //判斷是否有登入
    public function checkSignIn()
    {
        $oUserInfo = $_SESSION;
        if (!isset($oUserInfo["m_id"])) {
            $this->smarty->display("sign_in.html");
            exit;
        }
    }


    //留言板index
    public function index()
    {
        $m_id = $_SESSION["m_id"];
        $m_no = $_SESSION["m_no"];
        $m_permission = $_SESSION['m_permission'];
        $sUrl = $_SERVER["REQUEST_URI"];
        $gPage = (isset($_GET['page'])) ?  intval($_GET['page']) : 1; 

        $this->checkSignIn();

        $data = $this->model('message')->getAllMessage();
        $row_data_nums = mysqli_num_rows($data);
        $list_row = 3; //每頁顯示數量
        $Page = new Page($row_data_nums, $list_row, $gPage, $sUrl);
        $start = ( $Page->now_page-1 ) * $list_row; //每一頁開始的資料序號
        $data = $this->model('message')->getPageMessage($start, $list_row);

        $message_data = [];
        while ($row_data = mysqli_fetch_assoc($data)) {
            $message_data[] = array(
                "mb_no"          => $row_data["mb_no"],
                "m_id"           => $row_data["m_id"],
                "content"        => $row_data["content"],
                "insert_time"    => $row_data["insert_time"],
                "update_time"    => $row_data["update_time"],
                "qualifications" => ($m_id === $row_data["m_id"] or $m_permission === '1') ? true : false,
            );
        }

        $this->smarty->assign("title", "留言板");
        $this->smarty->assign("m_id", $m_id);
        $this->smarty->assign("m_no", $m_no);
        $this->smarty->assign("message_data", $message_data);
        $this->smarty->assign("showPage", $Page->showPage());
        $this->smarty->display("message_select.html");
    }


    //新增留言
    public function addMessage()
    {
        $member_no = (isset($_POST["m_no"])) ? $_POST["m_no"] : null;
        $content = (isset($_POST["content"])) ? htmlspecialchars(addslashes($_POST["content"])) : null;

        if (empty($content)) {
            $result_data['status'] = false;
            $result_data['msg'] = '留言不能為空';
        } else {
            $addMember = $this->model('message')->addMessage($member_no, $content);
            if ($addMember) {
                $result_data['status'] = true;
            } else {
                $result_data['status'] = false;
                $result_data['msg'] = '新增失敗';
            }
        }
        echo json_encode($result_data);
    }


    //修改留言
    public function updateMessage()
    {
        $time = date("Y-m-d H:i:s");
        $mb_no = (int)$_POST['mb_no'];
        $content = (isset($_POST['content'])) ? htmlspecialchars(addslashes($_POST['content'])) : null;
        $decode_content = (isset($_POST['content'])) ? $_POST['content'] : null;

        if (empty($content)) {
            $result_data['status'] = false;
            $result_data['msg'] = '留言不能為空';
        } else {
            $updateMessage = $this->model('message')->updateMessage($mb_no, $content, $time);      
            if ($updateMessage) {
                $result_data['status'] = true;
                $result_data['mb_no'] = $mb_no;
                $result_data['up_content'] = $decode_content;
                $result_data['up_time'] = $time;
                $result_data['msg'] = '修改成功';
            } else {
                $result_data['status'] = false;
                $result_data['msg'] = '修改失敗';
            }
        }
        echo json_encode($result_data);
    }


    //刪除留言
    public function deleteMessage()
    {
        $mb_no = $_POST["mb_no"];

        $deleteMessage = $this->model('message')->deleteMessage($mb_no);
        if ($deleteMessage) {
            $result_data['status'] = true;
            $result_data['mb_no'] = $mb_no;
            $result_data['msg'] = '刪除成功';
        } else {
            $result_data['status'] = false;
            $result_data['msg'] = '刪除失敗';
        }
        echo json_encode($result_data);
    }


}
