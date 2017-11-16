{include file='header.tpl'}
  <body>
    <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle">問題編集</div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="menu">
            <a href="qst.php"><button class="btn btn-default">アンケート編集</button></a>
            <a href="cate.php"><button class="btn btn-default">問題カテゴリ編集</button></a>                        
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
  
