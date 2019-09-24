//限制字數and顯示剩餘字數
$("#in_content").keyup( function ()
{
    var len = $(this).val().length;
    if (len > 50) {
        $(this).val($(this).val().substring(0,50));
    }
    var num = 50 - len;
    if (num <= 0) {
        $("#textCount").text("0");
    } else {
        $("#textCount").text(num);
    }
});
$("#in_content").keyup( function ()
{
    var len = $(this).val().length;
    if (len > 50) {
        $(this).val($(this).val().substring(0,50));
    }
});

//登出
$('#out').on('click', function ()
{
    $.ajax({
        type: "POST",
        dataType:"json",
        url: "/message_board/member/signOut",
        data: {
            operating: 'sign_out'
        },
        success: function (Rdata)
        {
            if (Rdata.status === true) {
                document.location.href="/message_board/";
            }
        },
        error: function ()
        {
            alert("登出Error");
        }
    });
});

//新增
$('#in_submit').on('click', function ()
{
    var ct = $("#in_content").val();
    var m_no = $("#m_no").val();
    $.ajax({
        type: "POST",
        dataType:"json",
        url: "../mphp/message_insert.php",
        data: {
            in_content: ct,
            m_no: m_no
        },
        success: function (Rdata)
        {
            if (Rdata.status === true) {
                document.location.href="../mphp/message_select.php";
            } else if (Rdata.status === false) {
                alert(Rdata.msg);
            }
        },
         error: function ()
         {
            alert("新增Error");
        }
    });
});

//刪除
$('.Buttondel').on('click', function ()
{
    let mb_no = $(this).prev().prev().val();
    var dele = confirm("確定要刪除這則留言嗎？");
    if (dele === true) {
        $.ajax({
            type: "POST", //傳送方式
            dataType:"json",
            url: "../mphp/message_delete.php", //傳送目的地
            data: {
                mb_no: mb_no
            },
            success: function (Rdata)
            {
                if (Rdata.status === true) {
                    alert(Rdata.msg);
                    $("#msg_tr_"+Rdata.mb_no).fadeOut();
                } else if (Rdata.status === false) {
                    alert(Rdata.msg);
                }
            },
            error: function () 
            {
                alert("刪除Error");
            }
        });
    }
});



//修改
$('.Buttonupd').on('click', function ()
{
    let mb_no = $(this).prev().val();
    // showUpdate(mb_no);
    showUpdateDiv(mb_no);
});

$('#btn_update').on('click', function ()
{
    var content = $("#up_conkent").val(); //抓取文字框修改的內容
    var mbno = $("#mb_no").val();
    $.ajax({
        type: "POST", 
        dataType:"json",
        url: "../mphp/message_update.php",
        data: {
            operating: 'update',
            content: content,
            mb_no: mbno
        },
        success: function (Rdata)
        {
            if (Rdata.status === true) {
                alert(Rdata.msg);
                $("#msg_text_"+Rdata.mb_no).text(Rdata.up_content);
                $("#msg_up_time_"+Rdata.mb_no).html('最後修改留言時間：'+Rdata.up_time);
                $("#div_update").hide();
            } else if (Rdata.status === false) {
                alert(Rdata.msg);
            }
        },
        error: function ()
        {
            alert("修改Error");
        }
    });
});


//隱藏修改div
$('#up_cancel').on('click', function ()
{
    $("#div_update").hide();
});

//顯示修改內容
function showUpdateDiv(mb_no)
{
    $("#div_update").show();
    $("#div_update").css({
        "background-color": "#FFCC99",
        "padding": "10px",
        "position": "fixed",
        "top": "40vh",
        "left": "35vw",
        "width":"40vw"
    });
    let content = $('#msg_text_'+mb_no).text();
    content = unHtmlSpecialChars(content);
    $("#up_conkent").val(content);
    $("#mb_no").val(mb_no);
}


function unHtmlSpecialChars(ch)
{
    if (ch===null) return '';
    ch = ch.replace(/&amp;/g, "&");
    ch = ch.replace(/&quot;/g, "\"");
    ch = ch.replace(/&#039;/g, "\'");
    ch = ch.replace(/&lt;/g, "<");
    ch = ch.replace(/&gt;/g, ">");

    return ch;
} 
// function ajax_error(XMLHttpRequest, textStatus, errorThrown) {
//     alert(XMLHttpRequest.status);
//     alert(XMLHttpRequest.readyState);
//     alert(textStatus);
// }
