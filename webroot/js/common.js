window.onload = function errchk(){
    var errormode = document.getElementById("errormode").textContent;
    if(errormode == 1){
        alert("ログインIDもしくはパスワードが間違っています。")
    } else if ( errormode == 2) {
        alert("管理者権限がありません。")
    }
}

function qstsubmit(){
    if(window.confirm("アンケートを送信します。よろしいですか？")){
        document.qstfrm.submit();
    } else {
        return false;
    }
}
