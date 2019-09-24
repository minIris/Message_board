<?php

class Member extends Sql
{

    public function getMember($m_id)
    {
        $m_id = addslashes($m_id);
        $query_id = "SELECT * FROM member where m_id = '$m_id'";
        $data = mysqli_query($this->link, $query_id) or die (mysqli_error());
        return $data;
    }

}
