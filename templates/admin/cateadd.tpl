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
            <form name="cateaddfrm" action="#" method="POST" >            
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th class="col-md-8">カテゴリ名</th>
                    <th class="col-md-2">必須</th>
                    <th class="col-md-2">達成点数</th>
                  </tr>
                  <tr>
                    <td><input class="form-control" type="text" name="nm" value="" /></td>
                    <td class="center" style="vertical-align: middle;"><input type="checkbox" name="mstflag" value="false" /></td>
                    <td class="center" style="vertical-align: middle;"><input class="form-control" type="text" name="mstten" value="0" /></td>
                  </tr>
                </tbody>
              </table>
              <input type="hidden" name="sid" value="{$sid}" />
              <input type="hidden" name="mode" value="added" />
              <input type="hidden" name="num" value="0" />                      
              <button type="button" class="btn btn-default" onClick="cateadded()">追加</button>
            <a href="cate.php">
              <button type="button" class="btn btn-default" >キャンセル</button>
            </a>
            </form>                          
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>

    </div>

    {include file='footer.tpl'}
  
