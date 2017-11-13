{include file='header.tpl'}
  <body>
    <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle"><h1>アンケート編集</h1></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="menu">
            <a href="top.php">
              <button class="btn btn-default">問題編集</button>
            </a>
            <a href="qst.php">
              <button class="btn btn-default">アンケート管理</button>
            </a>
          </div>
        </div>
      </div>
         
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="main">
            <form name="qsteditfrm" action="qstedit.php" method="post">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-5">アンケート文</th>
                    <th class="col-md-1">タイプ</th>
                    <th class="col-md-4">選択肢</th>
                    <th class="col-md-1">*</th>
                  </tr>

                  <tr>
                    <td class="center" style="vertical-align: middle;">{$arqst.cd}</td>
                    <td><textarea class="qsttxt" name="question" >{$arqst.question}</textarea></td>
                    <td class="col-md-1" style="vertical-align: middle;">
                      <select name="type" style="height:2em">
                        {if $arqst.type eq '1'}
                          <option value="1" selected>単一選択</option>
                          <option value="2">複数選択</option>
                          <option value="3">文字入力</option>
                        {elseif $arqst.type eq '2'}
                          <option value="1">単一選択</option>
                          <option value="2" selected>複数選択</option>
                          <option value="3">文字入力</option>
                        {elseif $arqst.type eq '3'}
                          <option value="1">単一選択</option>
                          <option value="2">複数選択</option>
                          <option value="3" selected>文字入力</option>
                        {/if}
                      </select>
                    </td>
                    <td class="center" style="vertical-align: middle;">
                      <table class="table table-bordered">
                        <tbody>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans1" value="{$arqst.ans1}" /></td></tr>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans2" value="{$arqst.ans2}" /></td></tr>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans3" value="{$arqst.ans3}" /></td></tr>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans4" value="{$arqst.ans4}" /></td></tr>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans5" value="{$arqst.ans5}" /></td></tr>
                        </tbody>
                      </table>
                    </td>
                    <td class="center" style="vertical-align: middle;">
                      <input type="hidden" name="cd" value="{$arqst.cd}" />
                      <input type="hidden" name="mode" value="qstupdate" />
                      <button type="button" class="btn btn-default" name="mode" value="qstupdate" onClick="qstupdate()">更新</button>
                      <br /><br />
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>                                  
              <div class="row">
                <div class="col-md-12">
                  <form name="qstdelfrm" action="qstedit.php" method="post">
                    <input type="hidden" name="cd" value="{$arqst.cd}" />                    
                    <input type="hidden" name="mode" value="qstdel" />                    
                    <button type="button" class="btn btn-default" name="mode" value="qstdel" onClick="qstdel()">削除</button>
                    </form>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>

    </div>

  </body>
{include file='footer.tpl'}
  
