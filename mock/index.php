<!DOCTYPE html>
<html lang="ja">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>{$page_title}</title>

   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

   <link rel="stylesheet" type="text/css" href="./css/base.css" />
   <script src="./js/common.js"></script>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle"><h1>理解度調査アンケート</h1></div>
          </div>
          000000000 さん
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="guidance">
            ガイダンスなどの注意事項が表示されます。
            <dt class="guidtitle">注意事項</dt>
            <dd class="guidtext">
              <ul>
                <li>皆さんの現在のICTスキルを調査するためのアンケートです。今後の授業の進め方などの参考に使用しますが、成績には一切関係しません。</li>
                <li>「アンケート」に回答してから、「確認問題」を解答してください。</li>
                <li>「アンケート」は一度しか回答することができません。</li>
                <li>「確認問題」はセキュリティに関する問題で80点以上の取得ができない場合のみ、セキュリティの問題を24時間に1回再度解答することができす。</li>
                <li>80点以上を取得すると、「確認問題」ボタンが表示されなくなります。</li>
                <li>「アンケート」は一度回答するとボタンは再表示されません。</li>

              </ul>

            </dd>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 col-md-offset-1">

        <form action="qsttop.php" method="POST" name="indexform" >
          <input type="hidden" name="uid" value="{$uid}" />
          <input type="hidden" name="sid" value="{$sid}" />
          <button type="submit" class="btn btn-default">アンケート</button>

        </form>
      </div>
      <div class="col-md-5">
        <form action="exam.php" method="POST" name="indexform" >
          <input type="hidden" name="uid" value="{$uid}" />
          <input type="hidden" name="sid" value="{$sid}" />
          <button type="submit" class="btn btn-default">確認問題</button>

        </form>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>
