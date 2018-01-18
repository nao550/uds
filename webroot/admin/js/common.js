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
    var typeElm = document.getElementsByName('type')[0];
    var typeSelect = typeElm.options[typeElm.selectedIndex].value;

    var correctElm = document.getElementsByName('correct[]')
    var correctCount = 0;
    for( var i = 0; i <correctElm.length; i++){
        if(correctElm[i].checked == true){
            correctCount++;
        }
    }

    if(correctCount ==  0){
        alert("正解番号を選択してください")
        return false;
    } else if (( typeSelect == 1)&&( correctCount != 1 )){
        alert('択一問題選択時には、正解番号は一つだけチェックしてください')
        return false;
    }

    if(window.confirm("問題を更新します。よろしいですか？")){
        document.exameditfrm.submit();
        return true;
    } else {
        return false;
    }
}

function examadded(){
    var typeElm = document.getElementsByName('type')[0];
    var typeSelect = typeElm.options[typeElm.selectedIndex].value;

    var correctElm = document.getElementsByName('correct[]')
    var correctCount = 0;
    for( var i = 0; i <correctElm.length; i++){
        if(correctElm[i].checked == true){
            correctCount++;
        }
    }

    if(correctCount ==  0){
        alert("正解番号を選択してください")
        return false;
    } else if (( typeSelect == 1)&&( correctCount != 1 )){
        alert('択一問題選択時には、正解番号は一つだけチェックしてください')
        return false;
    }

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

function cateadded(){
    if(window.confirm("問題カテゴリを追加します。よろしいですか？")){
        document.cateaddfrm.submit();
    } else {
        return false;
    }
}

function cateedit(){
    if(window.confirm("問題カテゴリを編集します。よろしいですか？")){
        document.cateeditfrm.submit();
    } else {
        return false;
    }
}

function catedel(){
    if(window.confirm("問題カテゴリを削除します。よろしいですか？")){
        document.catedelfrm.submit();
    } else {
        return false;
    }
}
