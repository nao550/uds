{include file='header.tpl'}
  <body>
    <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
    <div class="container">
      <form class="form-signin" action="index.php" method="POST">
        <h2 class="form-signin-heading">管理画面ログイン</h2>
        <label for="inputId" class="sr-only">アカウント</label>
        <input type="text" id="inputId" name="username" class="form-control" placeholder="アカウントを入力" required autofocus>
        <label for="inputPassword" class="sr-only">パスワード</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワードを入力" required>
        <input type="hidden" name="login" value="1">
        <input type="hidden" name="sid" value="{$sid}">        
        <button class="btn btn-default btn-block" type="submit">ログイン</button>
      </form>
    </div>

  </body>
{include file='footer.tpl'}
  
