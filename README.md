# 理解力調査テストシステム

5問前後のアンケートと、チェックテストがある。

アンケートは一度終了すると再度表示されない。

チェックテストは特定のカテゴリのみ合格点になるまで何度でも再回答可能

集計ページでアンケート集計のダウンロードと、得点状況を確認できる


## 検討事項

- ログインのチェックは Auth->chkLogined にて $_SESSION['sid'] == $_POST['sid'] でチェックしているがこれで十分か？
- トップページのデザイン
- アンケート集計データの表示とDLについて、集計テーブルを作成するか、一時ファイルで作成するか
- 特定カテゴリで未達の場合のチェック方法、表示するたびに集計してチェックか、状況テーブルでデータを保持するか
- 問題表示方法、全問1ページか、1ページ1問か、1ページ1問にしたら回答状況チェックは？
    - とりあえず全問1ページにする
- カテゴリについて、必達カテゴリは複数か単一か、問題数は表示数か越えるか、ランダムか順列か
    - 必達カテゴリは一つ、問題数はあるだけ、順番は順列

## log

    集計ページの作成
    アンケートが集計できるようにする
    アンケートで必須回答がチェックで設定できるようにする
    アンケート集計ページの作成
    アンケート集計関数
    解答状況管理テーブルの作成
    Score へ合計点が入るか、val がチェック付くか確認する
    180315: Score へ insert できるようになった。
    180126: 問題追加と編集が正常にできるかチェック
    180126: bug: 画像のある問題を更新すると画像が消える
    180126: bug: 問題を削除したときに画像が削除されない
    180126: bug: 問題を追加したときに画像がないとエラーメッセージがでる
    180125: アップロードできるファイルを画像に制限
    180125: bug: admin/examedit.tpl を更新するたびに問題文の先頭に空白が追加される
    bug: admin/examadd からtopに戻ってリロードすると、再度問題が追加される
    tkt: examadd, examedit でtypeによるcorrect数のチェック
    180125: admin/examadd でcorrect複数チェック時して追加できいるように
    180125: bug: admin/examedit でcorrect複数チェック時の更新ができない
    180124: Request.php を追加、リクエストデータを整形して返す
    180124: bug: admin/examedit.tpl を開いたとき正解にチェックがつかない
    181018: bug: 複数問題作成時に正解が一つしか選択できない→コンボボックスからチェックボックスへ変更する
    180116: 問題表示時に画像ファイルがあれば表示する
    180116: Fileupのエラーキャッチの設置とアップロード成功のメッセージ追加
    180116: 新規追加時の追加
    180115: 更新時に以前の画像があれば削除
    180115: 画像追加画面に画像があれば表示する
    180115: admin/exam.php に edit 時の画像追加は完成した。
    180110: Fileup.lib は作成した、admin/exam.php に画像の機能追加
    180111: アンケート画面のレイアウト修正
    180111: アンケートを登録できるようにする
    180110: Ansser.php の fmtAns のループが固定になっているのを修正
    171226: 問題ページの作成：解答をDB登録できるようにする
    180110: Anser.php の作成
    171130: 問題ページの作成：問題を表示できるようにする
    171128: アンケート管理ページの修正
    171128: mod: 管理ページボタン順、問題編集、問題カテゴリ編集、アンケート編集にする
    171128: bug: 問題カテゴリ追加で追加できない
    171128: bug: 問題カテゴリ追加で必須、点数項目がない
    171128: bug: 問題カテゴリ編集、削除で確認メッセージでない
    171128: 問題削除機能の作成
    171128: 問題追加機能の作成
    171127: 問題編集ページを作成する
    171122: 問題に正解フィールドを追加したのでクラスの修正
    171122: 問題管理ページの作成
    171121: 問題クラスの作成
    postpone:  問題カテゴリのnumを使って表示順が整列されるようにする
        Cate.php->addCate で $num = $this->countCate + 1 で競合の可能性
    171120: 問題カテゴリに合格点まで表示するカテゴリ選択と達成点の追加
    171120: 問題カテゴリテンプレートページの修正
    171120: 問題カテゴリクラスの修正
    171118: アンケート編集、追加ページにキャンセルボタンの追加
    171118: 問題カテゴリ編集ページの完成
    171115: 問題カテゴリクラスの作成
    171114: アンケートクラス、登録関数の作成
    171114: アンケート集計クラスの作成
    171114: アンケート集計テーブルの作成
    171113: アンケートタイプ 3 の文字列回答の機能実装
    171113: cd を使うようにテストを修正
    171111: qst.num を削除、cdを使うように変更
    171109: アンケート表示まで完成、
    171109: index.php, index.tpl の作成
    171109: 更新と削除が動いていない？→動いた
    171108: アンケート追加画面の作成→追加画面はできた。
    追加画面は画面下に追加ボタンがあって、それを押したら確認画面の後に、qstadd.phpにPOSTして、POSTのデータを登録して、qst.php に戻る
    171031: アンケート削除→完成お
    171031: アンケート編集画面の作成→完成
    171031: アンケート管理ページの作成
    171031: qst.php -> AddQst() の作成→完成
    171031: getAllQst() のテスト作りたい→DBUnitの使いかた調査？
    171025: 管理者ログインチェックの完成、どうもややこしいやりかたをしている気がする。
    171024: Session.php, SessionTest.php ひととおり完成
    171024: User.php に CngUserPassword の追加
    171023: User.php と UserTest.php が動くようになった
    171020: Account から User に変更、admin のチェックをユーザレベルですることにした
    171005: qstlib.php -> GetAllQst() できた
    171005: qst.php の表示できた
    171003: アンケートライブラリの作成中

## テスト

テストは mysql に同じレイアウトでデータベースを作成して、実行する。


## DB

### アンケート文tb

    アンケート文
    Qst
    cd, sirial, CD
    type, int, アンケートタイプ
        1：単一選択肢
        2：複数選択肢
        3：テキスト入力
    question, varchar(300), アンケート文
    ans1, varchar(300), 解答選択肢1
    ans2, varchar(300), 解答選択肢2
    ans3, varchar(300), 解答選択肢3
    ans4, varchar(300), 解答選択肢4
    ans5, varchar(300), 解答選択肢5

### 回答tb

    一人の一アンケートの回答が1レコードになる。
    複数選択は連結して格納
    resp
    cd, sirial, CD
    uid, varchar(20), ユーザID(学籍番号？)
    qstcd, int,
    type, int, アンケートタイプ
    ans, varchar(900), 解答選択肢解凍選択肢...
    regdate, date, 解答日

### 回答状況管理テーブル

    回答未解答の状況を管理
    Udschk
    cd, sirial, CD
    uid, vchaar(30), ユーザID
    qstflag, boolen, 回答状況、true:済、false:未
    exmflag, boolen, 解答状況, true:済、false:未解答
    reqflag, boolen, 必須カテゴリ到達, true:達成、false:未達
    moddate, date, 更新日
    regdate, date, 登録日

### 問題カテゴリtb

    問題カテゴリ、再回答カテゴリ、点数の設定ができる
    Cate
    cd, sirial, CD
    num, int, 表示順
    nm, varchar(30), 問題カテゴリ名
    flag, boolen, 再回答カテゴリ
    ten, int, 点数(int)


### 問題文tb

    問題文
    Exam
    cd, sirial, CD
    catcd, int, カテゴリCD
    type, int, 問題タイプ
        1:単一選択
        2:複数選択
    exam, varchr(300), 問題分
    correct, varchar(100), 正解選択肢
    ans1, varchr(300), 問題選択肢1
    ans2, varchr(300), 問題選択肢2
    ans3, varchr(300), 問題選択肢3
    ans4, varchr(300), 問題選択肢4
    ans5, varchr(300), 問題選択肢5
    regdate, date, 解答日(date)

### 解答tb

    解答が1問1レコードになる。
    Ans
    cd, sirial, CD
    uid, vchar(30), ユーザID
    examcd, int, 問題CD
    catecd, int, カテゴリlCD
    type, int, 問題タイプ
    ans, int, 選択した答え
    correct, int, 正解選択肢
    sid, varchar(100), Session ID
    regdate, datetime, 解答送信日

# 点数管理

    カテゴリ毎の合計点が1レコードになる
    cd, sirial, CD
    uid, varchar(30), UID
    catecd, int, カテゴリCD
    score, int, 点数
    val, boolen, 必須？
    regdate, date, 登録日
