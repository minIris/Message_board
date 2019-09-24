<?php

class MemberController extends Controller 
{
    public function index()
    {
        $this->smarty->display("sign_in.html");
        exit;
    }

    //登入
    public function signIn()
    {
        $m_id = (isset($_POST['m_id'])) ? $_POST['m_id'] : null;
        $m_password = (isset($_POST['m_password'])) ? $_POST['m_password'] : null;

        if (empty($m_id) or empty($m_password) && $m_password!==0) {
            $result_data['atuh'] = false;
            $result_data['msg'] = '輸入資料不完整。';
        } else {
            //判斷此會員是否存在
            $data = $this->model('member')->getMember($m_id);
            $presence = mysqli_num_rows($data);
            if ($presence > 0) {
                $row_data = mysqli_fetch_assoc($data);
                if (md5($m_password) === $row_data['m_password']) {
                    $_SESSION['m_no'] = $row_data['m_no'];
                    $_SESSION['m_id'] = $row_data['m_id'];
                    $_SESSION['m_permission'] = $row_data['m_permission'];
                    $result_data['atuh'] = true;
                } else {
                    $result_data['atuh'] = false;
                    $result_data['msg'] = '密碼錯誤';
                }
            } else {
                $result_data['atuh'] = false;
                $result_data['msg'] = '無此帳號尚未註冊。';
            }
        }
        echo json_encode($result_data);
    }

    //登出
    public function signOut()
    {
        unset($_SESSION['m_no']);
        unset($_SESSION['m_id']);
        unset($_SESSION['m_permission']);
        unset($member);
        $result_data['status'] = true;
        echo json_encode($result_data);
    }

    //新增會員
    public function addMember()
    {
        
    }


}
