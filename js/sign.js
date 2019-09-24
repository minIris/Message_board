//限制註冊input字數
$(".re_input").keyup(function(){
    var len = $(this).val().length;
    if(len > 10){
        $(this).val($(this).val().substring(0,10));
    }
});
//限制註冊input不能輸入空白
$(".re_input").keyup(function(){
    this.value=this.value.replace(/\s+/g,'');
});
//限制註冊帳號只能輸入英文和數字
$("#re_m_id").keyup(function(){
    this.value=this.value.replace(/[\W]/g, '');
});
//限制登入帳號只能輸入英文和數字
$("#m_id").keyup(function(){
    this.value=this.value.replace(/[\W]/g, '');
});


//判斷是否按下登入鈕
$('#btn_sign').on('click', function () {
    signin();
});
//判斷是否按下enter登入
$(".sign_input").keydown(function(event){
    if(event.which == 13){
        signin();
    }
});
//登入
function signin(){
    let m_id = $("#m_id").val();
    let m_password = $("#m_password").val();
    $.ajax({
        type: "POST",
        dataType:"json",
        url: "/message_board/member/signin",
        data: {
            m_id: m_id,
            m_password: m_password,
            operating: 'sign_in'
        },
        success: function(Rdata) {
            if (Rdata.atuh === true) {
                document.location.href="/message_board/message/index";
            } else if (Rdata.atuh === false) {
                alert(Rdata.msg);
            }
        },
        error: function () {
            alert("登入Error");
        }
    });
}


//跳註冊頁
$('#btn_registered').on('click', function () {
    document.location.href="../mhtml/registered.html";
});

//註冊
$('#re-button').on('click', function () {
    let m_id = $("#re_m_id").val();
    let m_password = $("#m_password").val();
    let re_m_password = $("#re_m_password").val();
    $.ajax({
        type: "POST",
        dataType:"json",
        url: "/message_board/member/addMember",
        data: {
            m_id: m_id,
            m_password: m_password,
            re_m_password: re_m_password
        },
        success: function(Rdata) {
            if (Rdata.status === true) {
                alert(Rdata.msg);
                document.location.href="../mphp/sign_in.php";
            } else if (Rdata.status === false) {
                alert(Rdata.msg);
            }
        },
        error: function () {
            alert("註冊Error");
        }
    });
});
