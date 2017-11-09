{include file='header.tpl'}
  <body>
    <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle"><h1>アンケート追加</h1></div>
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
            <form name="qstaddfrm" action="qstadd.php" method="post">            
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
                    <td class="center" style="vertical-align: middle;"></td>
                    <td><textarea class="qsttxt" name="question" ></textarea></td>
                    <td class="center" style="vertical-align: middle;">
                      <select name="type">
                          <option value="1">単一選択</option>
                          <option value="2">複数選択</option>       
                      </select>
                    </td>
                    <td class="center" style="vertical-align: middle;">
                      <table class="table table-bordered">
                        <tbody>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans1"  /></td></tr>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans2"  /></td></tr>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans3"  /></td></tr>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans4"  /></td></tr>
                          <tr><td class="left"><input type="text" class="anstxt" name="ans5"  /></td></tr>
                        </tbody>
                      </table>
                    </td>
                    <td class="center" style="vertical-align: middle;">
                      <input type="hidden" name="mode" value="qstadd" />
                      <button type="button" class="btn btn-default" name="mode" value="qstadd" onClick="qstadd()">追加</button>
                      <br /><br />
                    </td>
            </form>                    
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>

    </div>

{include file='footer.tpl'}
  
