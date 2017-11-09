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


集計ページの作成
問題ページの作成
問題管理ページの作成
アンケートページの作成

171109: アンケート表示まで完成、
171109: index.php, index.tpl の作成
171109: 更新と削除が動いていない？→動いた
171108: アンケート追加画面の作成→追加画面はできた。
・追加画面は画面下に追加ボタンがあって、それを押したら確認画面の後に、qstadd.phpにPOSTして、POSTのデータを登録して、qst.php に戻る
171031: アンケート削除→完成お
171031: アンケート編集画面の作成→完成
171031: アンケート管理ページの作成
171031: qst.php -> AddQst() の作成→完成
171031: getAllQst() のテスト作りたい→DBUnitの使いかた調査？
171025: 管理者ログインチェックの完成、
どうもややこしいやりかたをしている気がする。
171024: Session.php, SessionTest.php ひととおり完成
171024: User.php に CngUserPassword の追加
171023: User.php と UserTest.php が動くようになった
171020: Account から User に変更、
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
