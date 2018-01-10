{include file='header.tpl'}

<body>
  <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="header">
          <div class="pagetitle"><h1>理解度調査アンケート</h1></div>
        </div>
        {$uid} さん
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="guidance">
          ガイダンスなどの注意事項が表示されます。
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

{include file='footer.tpl'}
