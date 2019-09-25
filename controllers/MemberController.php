<?php

class MemberController extends Controller 
{

    //登入頁面
    public function index()
    {
        $this->smarty->display("sign_in.html");
        exit;
    }


    //登入
    public function signIn()
    {
        $m_id = (isset($_POST['m_id'])) ? addslashes($_POST['m_id']) : null;
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

    
    //註冊頁面
    public function registeredIndex()
    {
        $this->smarty->display("registered.html");
        exit;
    }

    //註冊
    public function registered()
    {
        $m_id = (isset($_POST['m_id'])) ? addslashes($_POST['m_id']) : null;
        $m_password = (isset($_POST['m_password'])) ? addslashes($_POST['m_password']) : null;
        $re_m_password = (isset($_POST['re_m_password'])) ? addslashes($_POST['re_m_password']) : null;

        if (empty($m_id) or empty($m_password) or empty($re_m_password)) {
            $result_data['status'] = false;
            $result_data['msg'] = '輸入資料不完整';
        } else {
            $data = $this->model('member')->getMember($m_id);
            $presence = mysqli_num_rows($data);
            if ($presence > 0) {  //是否有此會員
                $result_data['status'] = false;
                $result_data['msg'] = '此帳號已有人使用';
            } elseif ($m_password !== $re_m_password) {
                $result_data['status'] = false;
                $result_data['msg'] = '密碼不相符，請再確認';
            } else {
                $addMember = $this->model('member')->addMember($m_id, $m_password);
                if ($addMember) {
                    $result_data['status'] = true;
                    $result_data['msg'] = '註冊成功，請新登入';
                } else {
                    $result_data['status'] = false;
                    $result_data['msg'] = '註冊失敗請，重新再試';
                }
            }
        }
        echo json_encode($result_data);
    }


}
