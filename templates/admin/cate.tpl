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
        <div class="col-md-10 col-md-offset-1">
          <div class="main">
            <table class="table table-bordered">
              <tbody>
                {foreach $arCate as $cate}
                  {if $cate@first}
                    <tr>
                      <th class="col-md-1">#</th>
                      <th class="col-md-6">カテゴリ名</th>
                      <th class="col-md-2">必須</th>
                      <th class="col-md-2">達成点数</th>
                      <th class="col-md-1">*</th>
                    </tr>
                  {/if}
                  <tr>
                    <td class="center" style="vertical-align: middle;">{$cate.cd}</td>
                    <td style="vertical-align: middle;">{{$cate.nm}|nl2br nofilter}</td>
                    <td class="center" style="vertical-align: middle;">                    
                      {if $cate.mstflag eq 1}
                        <input type="checkbox" name="mstflag" checked="checked" disabled="disabled" />
                      {elseif $cate.mstflag eq 0}
                        <input type="checkbox" name="mstflag" disabled="disabled" />
                      {/if}
                    </td>
                    <td class="center" style="vertical-align: middle;">{$cate.mstten}</td>

                    <td class="center" style="vertical-align: middle;">
                      <form action="cate.php" method="post">
                        <input type="hidden" name="cd" value="{$cate.cd}" />
                        <input type="hidden" name="sid" value="{$sid}" />
                        <input type="hidden" name="mode" value="edit" />
                        <button type="submit" class="btn btn-default">編集</button>
                      </form>
                    </td>
                  </tr>
                {/foreach}
              </tbody>
            </table>
            <form class="form" action="#" method="POST">
              <input type="hidden" name="mode" value="add" />
              <button type="submit" class="btn btn-default" >追加</button>
            </form>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>

    </div>

{include file='footer.tpl'}
  
