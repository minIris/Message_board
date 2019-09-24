<?php

class Message extends Sql
{

    public function getMessage()
    {
        $query_data = "SELECT mb_no, m_id, content, insert_time, update_time 
        FROM message inner join member on message.m_no = member.m_no order by mb_no DESC"; //列出留言內容
        $data = mysqli_query($this->link, $query_data) or die (mysqli_error());
        return $data;
    }

}