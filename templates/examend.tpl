{include file='header.tpl'}
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle"><h1>基礎知識確認問題</h1></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <p>{$uid}</p>
          <div class="main">
            <form name="examfrm" action="index.php" method="post" >
              <input type="hidden" name="uid" value="{$uid}" />
              <input type="hidden" name="sid" value="{$sid}" />
              <p>
                解答を受取ました。
              </p>
              <input type="submit" class="btn btn-default" value="トップページへ">
            </form>
          </div>
        </div>
      </div>
    </div>

{include file='footer.tpl'}
