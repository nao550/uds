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
        return true;
    } else {
        return false;
    }
}

function examsubmit(){
    if(window.confirm("解答を送信します。よろしいですか？")){
        document.examfrm.submit();
        return true;
    } else {
        return false;
    }
}
