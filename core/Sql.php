<?php
class Sql
{
    public $link;

    public function __construct()
    {
        $hostname = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "message_board";

        // 建立資料庫連線
        $this->link = mysqli_connect($hostname, $username, $password, $database) or die ("Could not connect MySQL");
        //資料庫名稱
        mysqli_select_db($this->link, $database) or die ("Could not select database");
        //設定語系
        mysqli_query($this->link, "SET NAMES 'utf8'");
        //設定時區
        date_default_timezone_set('Asia/Taipei');
    }
}

