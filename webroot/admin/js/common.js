window.onload = function errchk(){
    var errormode = document.getElementById("errormode").textContent;
    if(errormode == 1){
        alert("ログインIDもしくはパスワードが間違っています。")
    } else if ( errormode == 2) {
        alert("管理者権限がありません。")
    }
}

function qstadd(){
    if(window.confirm("アンケートを追加します。よろしいですか？")){
        document.qstaddfrm.submit();
    } else {
        return false;
    }
}

function qstupdate(){
    if(window.confirm("アンケートを更新します。よろしいですか？")){
        document.qsteditfrm.submit();
        return true;
    } else {
        return false;
    }
}

function qstdel(){
    if(window.confirm("問題を削除します。よろしいですか？")){
        document.qstdelfrm.submit();
        return true;
    } else {
        return false;
    }
}

function examupdate(){
    if(window.confirm("問題を更新します。よろしいですか？")){
        document.exameditfrm.submit();
        return true;
    } else {
        return false;
    }
}

function examadded(){
    if(window.confirm("問題を追加します。よろしいですか？")){
        document.examaddfrm.submit();
        return true;
    } else {
        return false;
    }
}

function examdelete(){
    if(window.confirm("問題を削除します。よろしいですか？")){
        document.examdelfrm.submit();
        return true;
    } else {
        return false;
    }
}

