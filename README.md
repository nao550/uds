# Understanding degree survey system

理解力調査テスト

5問前後のアンケートがあり、その後にチェックテストが続けて表示される

*検討事項
-ログインのチェックは Auth->chkLogined にて $_SESSION['sid'] == $_POST['sid'] でチェックしているがこれで十分か？


*log

・
・アンケート分の追加フォームの作成
・トップページのデザイン
・データベースの設計


qstlib.php -> AddQst() の作成
GetAllQst() のテスト作りたい→DBUnitの使いかた調査？

171020: Account から Users に変更、
    admin のチェックをユーザレベルですることにした
171005: qstlib.php -> GetAllQst() できた
171005: qst.php の表示できた
171003: アンケートライブラリの作成中


*DB

・アンケート文tb
    複数の選択肢は同じアンケート番号にする。
    qst
    cd, sirial, CD
    num, int, アンケート番号
    sub, int, アンケートサブ番号
    type, int, アンケートタイプ
        1：単一選択肢
        2：複数選択肢
        3：テキスト入力
    question, varchar(300), アンケート文
    ans, varchar(300), 解答選択肢
    
・解答tb
    一人の一アンケートの解凍が1レコードになる。
    複数選択は区切り記号'|'を使って格納
    resp
    cd, sirial, CD
    uid, varchar(20), ユーザID(学籍番号？)
    qstcd, int, 
    type, int, アンケートタイプ
    ans, varchar(900), 解答選択肢|解凍選択肢|...
    regdate, date, 解答日

・問題文tb
    exam
    
・解答tb
    ans
