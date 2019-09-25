<?php
class Page{
    public $total_row;  //總筆數
    public $list_row;  //每頁顯示筆數
    public $total_page;  //總頁數
    public $now_page;  //當前的頁數
    public $url;  //當前的url

    public function __construct($total_row, $list_row, $gPage, $sUrl){
        $this->total_row = $total_row ? $total_row : 1 ;
        $this->list_row = $list_row;
        $this->total_page = ceil( $this->total_row / $this->list_row);;
        $this->now_page = $this->setNowPage($gPage);
        $this->url = $this->setUrl($sUrl);
    }

    //獲取無頁數的url
    protected function setUrl($sUrl)
    {
        $url = $sUrl;
        $par_url = parse_url($url);  //切割獲取的url資訊
        if (isset($par_url['query'])) {  //query=>抓取url?後的資訊
            parse_str($par_url['query'], $url_query);  //將view source以陣列模式放入後面的變數
            unset($url_query['page']);
            $url = $par_url['path']."?".http_build_query($url_query);  //將陣列資訊放回view source
        } else {
            $url .= "?";
        }
        return $url;
    }

    //獲取當前頁數
    protected function setNowPage($gPage)
    {
        if (!empty($gPage)) {
            if ($gPage > 0) {
                if ($gPage > $this->total_page) {
                    return $this->total_page;
                } else {
                    return $gPage;
                }
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }

    //上一頁
    public function prev()
    {
        return ( $this->now_page === 1 ) ? 1 : $this->now_page-1;
    }
    
    //下一頁
    public function next()
    {
        return ($this->now_page == $this->total_page ) ? $this->total_page : $this->now_page+1;
    }


    //數字頁碼
    public function pageList()
    {
        if ($this->total_page < 10) {
            $end = $this->total_page;
        } else {
            if ($this->now_page >= 5) {
                if ($this->now_page+5 >= $this->total_page) {
                    $end = $this->total_page;
                }else{
                    $end = $this->now_page+5;
                }
            }else{
                $end = 10;
            }
        }

        $start = ($end-9 < 1) ? 1 : $end-9;
        $page_list = [];
        for ($i = $start; $i <= $end; $i++) {
            array_push($page_list, $i);
        }
        return $page_list;
    }

    //顯示分頁
    public function showPage()
    {
        $show_page = [];
        $show_page = array(
            "now_page"  => $this->now_page,
            "total_page"=> $this->total_page,
            "first"     => "1",
            "prev"      => $this->prev(),
            "pageList"  => $this->pageList(),
            "next"      => $this->next(),
            "last"      => $this->total_page,
            "url"       => $this->url
        );
        return $show_page;
    }
    
}
