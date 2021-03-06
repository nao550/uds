{include file='header.tpl'}
  <body>
    <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle"><h1>アンケート管理ページ</h1></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="menu">
            <a href="exam.php"><button class="btn btn-default">問題編集</button></a>
            <a href="cate.php"><button class="btn btn-default">問題カテゴリ編集</button></a>                                    
          </div>
        </div>
      </div>
         
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="main">
            <table class="table table-bordered">
              <tbody>
                {foreach $arqst as $qst}
                  {if $qst@first}
                    <tr>
                      <th class="col-md-1">#</th>
                      <th class="col-md-5">アンケート文</th>
                      <th class="col-md-1">タイプ</th>
                      <th class="col-md-4">選択肢</th>
                      <th class="col-md-1">*</th>
                    </tr>
                  {/if}
                  <tr>
                    <td class="center" style="vertical-align: middle;">{$qst.cd}</td>
                    <td>{{$qst.question}|nl2br nofilter}</td>
                    <td class="center" style="vertical-align: middle;">
                      {if $qst.type eq '1'}
                        択一選択
                      {elseif $qst.type eq '2'}
                        複数選択
                      {elseif $qst.type eq '3'}
                        文字入力
                      {/if}
                    </td>
                    <td class="center" style="vertical-align: middle;">
                      {if $qst.type eq '1' or $qst.type eq '2'}
                        <table class="table table-bordered">
                          <tbody>
                            <tr><td class="left">{$qst.ans1}</td></tr>
                            <tr><td class="left">{$qst.ans2}</td></tr>
                            <tr><td class="left">{$qst.ans3}</td></tr>
                            <tr><td class="left">{$qst.ans4}</td></tr>
                            <tr><td class="left">{$qst.ans5}</td></tr>
                          </tbody>
                        </table>
                      {elseif $qst.type eq '3'}
                        <textarea disabled></textarea>
                      {/if}
                    </td>
                    <td class="center" style="vertical-align: middle;">
                      <form action="qstedit.php" method="post">
                        <input type="hidden" name="cd" value="{$qst.cd}" />
                        <input type="hidden" name="sid" value="{$sid}" />
                        <button type="submit" class="btn btn-default">編集</button>
                      </form>
                    </td>
                  </tr>
                {/foreach}
              </tbody>
            </table>
            <form class="form" action="qstadd.php" mthod="post">
              <button class="btn btn-default" type="submit">新規登録</button>
            </form>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>

    </div>

{include file='footer.tpl'}
  
