{include file='header.tpl'}
  <body>
    <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 ml-sm-auto mr-sm-auto">
          <div class="header">
            <div class="pagetitle">問題編集</div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-10 ml-sm-auto mr-sm-auto">
          <div class="menu">
            <form class="form" action="qst.php" method="POST">
              <button class="btn btn-default" type="submit" name="mode" value="editQst">アンケート編集</button>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-10 ml-sm-auto mr-sm-auto">
          <div class="body">
            <form class="form" action="editexam.php" method="POST">
              
            </form>
          </div>
        </div>
      </div>

    </div>

  </body>
{include file='footer.tpl'}
  
