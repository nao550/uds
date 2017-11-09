{include file='header.tpl'}

<body>
  <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="header">
          <div class="pagetitle"><h1>理解度調査アンケート</h1></div>
        </div>
        {$gakusekinum} さん        
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
    <div class="col-md-10 col-md-offset-1">
      <form action="top.php" method="POST" name="indexform" >
        <input class="form-control" type="hidden" name="gakusekinum" value="{$gakusekinum}" />
        <button type="submit" class="btn btn-default">理解度調査開始</button>
        
      </form>
    </div>
  </div>

{include file='footer.tpl'}
  
