{include file='header.tpl'}
  <body>
    <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle"><h1>問題カテゴリ管理ページ</h1></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="menu">
            <a href="exam.php"><button class="btn btn-default">問題編集</button></a>
            <a href="qst.php"><button class="btn btn-default">アンケート編集</button></a>            
          </div>
        </div>
      </div>
         
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="main">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th class="col-md-2">#</th>
                  <th class="col-md-8">カテゴリ</th>
                  <th class="col-md-2">*</th>
                </tr>
                <tr>
                  <form name="cateeditfrm" action="#" method="POST" >
                    <td name="cd" class="center" style="vertical-align: middle;"><input type="hidden" name="cd" value=""></td>
                    <td><input class="form-control" type="text" name="nm" value="" /></td>
                    <td class="center" style="vertical-align: middle;">
                      <input type="hidden" name="sid" value="{$sid}" />
                      <input type="hidden" name="mode" value="added" />
                      <button type="submit" class="btn btn-default">追加</button>
                    </td>
                  </form>
                </tr>
              </tbody>
            </table>
            <a href="cate.php">
              <button class="btn btn-default" >キャンセル</button>
            </a>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>

    </div>

    {include file='footer.tpl'}
  
