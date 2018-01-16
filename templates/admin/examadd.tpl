{include file='header.tpl'}
<body>
  <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="header">
            <div class="pagetitle"><h1>問題追加</h1></div>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="menu">
          <a href="exam.php"><button class="btn btn-default">問題編集</button></a>
          <a href="cate.php"><button class="btn btn-default">問題カテゴリ編集</button></a>
          <a href="qst.php"><button class="btn btn-default">アンケート編集</button></a>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="main">
          <form name="examaddfrm" action="exam.php" method="POST" enctype="multipart/form-data">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>カテゴリ</th>
                  <td>
                    <select name="catecd" class="form-control">
                      {foreach $cate as $cat}
                        <option value="{$cat.cd}">{$cat.nm}</option>
                      {/foreach}
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>問題文</th>
                  <td><textarea name="exam" class="form-control" rows="5"></textarea></td>
                </tr>
                <tr>
                  <th>画像</th>
                  <td>
                    <p>
                      <input type="file" name="fileup" />
                    </p>
                  </td>
                </tr>
                <tr>
                  <th>正解</th>
                  <td>
                    <select name="correct" class="form-control">
                      <option value="1" >1</option>
                      <option value="2" >2</option>
                      <option value="3" >3</option>
                      <option value="4" >4</option>
                      <option value="5" >5</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>タイプ</th>
                  <td>
                    <select name="type" class="form-control">
                      <option value="1">択一選択</option>
                      <option value="2">複数選択</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>選択肢1</th>
                  <td><input class="form-control" type="text" name="ans1" value="" /></td>
                </tr>
                <tr>
                  <th>選択肢2</th>
                  <td><input class="form-control" type="text" name="ans2" value="" /></td>
                </tr>
                <tr>
                  <th>選択肢3</th>
                  <td><input class="form-control" type="text" name="ans3" value="" /></td>
                </tr>
                <tr>
                  <th>選択肢4</th>
                  <td><input class="form-control" type="text" name="ans4" value="" /></td>
                </tr>
                <tr>
                  <th>選択肢5</th>
                  <td><input class="form-control" type="text" name="ans5" value="" /></td>
                </tr>
              </tbody>
            </table>
            <input type="hidden" name="mode" value="added" />
            <button type="button" class="btn btn-default" name="btnUpdate" onClick="examadded()">追加</button>
            <a href="exam.php">
              <button type="button" class="btn btn-default">キャンセル</button>
            </a>
          </form>
        </div>
      </div>

      <div class="col-md-1"></div>
    </div>

  </div>

</body>
{include file='footer.tpl'}
