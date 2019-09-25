<?php

class Message extends Sql
{

    public function getAllMessage()
    {
        $query_data = "SELECT mb_no, m_id, content, insert_time, update_time 
        FROM message inner join member on message.m_no = member.m_no order by mb_no DESC";
        $data = mysqli_query($this->link, $query_data) or die (mysqli_error());
        return $data;
    }

    public function getPageMessage($start, $list_row)
    {
        $query_data = "SELECT mb_no, m_id, content, insert_time, update_time 
        FROM message inner join member on message.m_no = member.m_no order by mb_no DESC";
        $query_data .= " LIMIT ". $start. ",". $list_row;
        return mysqli_query($this->link, $query_data);
    }

    /**
     * 新增留言
     */
    public function addMessage($member_no, $content)
    {
        $time = date("Y-m-d H:i:s");
        $sqlIns = "INSERT INTO message (content, insert_time, m_no) VALUES ('$content', '$time', '$member_no');";
        return mysqli_query($this->link, $sqlIns);  ## 回傳布林值
    }

   /**
    * 修改留言
    */
    public function updateMessage($mb_no, $content, $time)
    {
        $sqlUpd = "UPDATE message SET content = '$content', update_time = '$time' WHERE message.mb_no = '$mb_no';";
        return mysqli_query($this->link, $sqlUpd);  ## 回傳布林值
    }

   /**
    * 刪除留言
    */
    public function deleteMessage($mb_no)
    {
        $sqlDel = sprintf("DELETE FROM message WHERE mb_no = '%s'", $mb_no);
        return mysqli_query($this->link, $sqlDel); ## 回傳布林值
    }

}
