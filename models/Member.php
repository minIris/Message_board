<?php

class Member extends Sql
{

    //取得會員資料
    public function getMember($m_id)
    {
        $query = "SELECT * FROM member where m_id = '$m_id'";
        $data = mysqli_query($this->link, $query) or die (mysqli_error());
        return $data;
    }

    //新增會員
    public function addMember($m_id, $m_password)
    {
        $m_password = md5($m_password);
        $sqlIns = "INSERT INTO member (m_id, m_password) VALUES ('$m_id', '$m_password')";
        $sqlI = mysqli_query($this->link, $sqlIns) or die ("MYSQL Error");
        return ($sqlI) ? true : false;
    }

}
