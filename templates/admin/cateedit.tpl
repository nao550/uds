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
            <a href="top.php"><button class="btn btn-default">問題編集</button></a>
            <a href="qst.php"><button class="btn btn-default">アンケート編集</button></a>            
          </div>
        </div>
      </div>
         
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="main">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th class="col-md-2">#</th>
                  <th class="col-md-8">カテゴリ</th>
                  <th class="col-md-2">*</th>
                </tr>
                <form action="cate.php" method="post">                
                  <tr>
                    <td class="center" style="vertical-align: middle;">
                      <input type="hidden" name="cd" value="{$arCate.cd}" />
                      {$arCate.cd}
                    </td>
                    <td><input type="text" class="form-control" name="nm" value="{{$arCate.nm}|nl2br nofilter}" /></td>
                    <td class="center" style="vertical-align: middle;">
                      <input type="hidden" name="sid" value="{$sid}" />
                      <input type="hidden" name="mode" value="update" />
                      <button type="submit" class="btn btn-default">更新</button>
                    </td>
                  </tr>
                </form>                  
              </tbody>
            </table>
            <form class="form" action="#" method="POST">
              <input type="hidden" name="mode" value="del" />
              <input type="hidden" name="cd" value="{$arCate.cd}" />
              <button type="submit" class="btn btn-default" >削除</button>
              <a href="cate.php"><button type="button" class="btn btn-default">キャンセル</button></a>              
            </form>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>

    </div>

{include file='footer.tpl'}
  
