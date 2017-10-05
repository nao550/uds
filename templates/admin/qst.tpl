{include file='header.tpl'}
  <body>
    <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle">アンケート編集</div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="menu">
            <form class="form" action="top.php" method="POST">
              <button class="btn btn-default" type="submit" name="mode" value="editQst">問題編集</button>
            </form>
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
                    <td>{$qst.question}></td>
                    <td class="center" style="vertical-align: middle;">{$qst.type}</td>
                    <td class="center" style="vertical-align: middle;">
                      <table class="table table-bordered">
                        <tbody>
                          {foreach $qst.choicestr as $choice}
                            <tr><td class="left">{$choice}</td></tr>
                          {/foreach}
                        </tbody>
                      </table>
                    </td>
                    <td class="center" style="vertical-align: middle;">
                      <form action="#" method="post">
                        <input type="hidden" name="qstnum" value="{$qst.num}" />
                        <button class="btn btn-default">編集</button>
                      </form>
                    </td>
                  </tr>
                {/foreach}
              </tbody>
            </table>
            <form class="form" action="addqst.php" mthod="post">
              <button class="btn btn-default" type="submit">新規登録</button>
            </form>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>

    </div>

  </body>
{include file='footer.tpl'}
  
