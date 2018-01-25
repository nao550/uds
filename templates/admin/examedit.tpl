{include file='header.tpl'}
<body>
  <div id="errormode" name="errormode" style="display:none">{$errormode}</div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="header">
            <div class="pagetitle"><h1>問題編集</h1></div>
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
          <form name="exameditfrm" action="exam.php" method="POST" enctype="multipart/form-data">
            <table class="table table-bordered">
              <input type="hidden" name="cd" value="{$arExam.cd}" />
              <tbody>
                <tr>
                  <th>カテゴリ</th>
                  <td>
                    <select name="catecd" class="form-control">
                      {foreach $cate as $cat}
                        <option value="{$cat.cd}"
                                {if $cat.cd eq $arExam.catecd}
                                selected
                                {/if}
                        >{$cat.nm}</option>
                      {/foreach}
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>問題文</th>
                  <td><textarea name="exam" class="form-control" rows="5">{{$arExam.exam}|nl2br nofilter}</textarea></td>
                </tr>
                <tr>
                  <th>画像</th>
                  <td>
                    <p>{$imgpath nofilter}</p>
                    <p>
                      <input type="file" name="fileup" accept="image/png, image/jpeg, image/gif"/>
                    </p>
                  </td>
                </tr>
                <tr>
                  <th>タイプ</th>
                  <td>
                    <select name="type" class="form-control">
                      {if $arExam.type eq '1'}
                        <option value="1" selected>択一選択</option>
                        <option value="2">複数選択</option>
                      {elseif $arExam.type eq '2'}
                        <option value="1">択一選択</option>
                        <option value="2" selected>複数選択</option>
                      {/if}
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>正解</th>
                  <td>
                    <div class="checkbox">
                      <label for="check1">
                        <input type="checkbox" value="1" name="correct[]" id="check1" {if $arExam.correct1 eq '1'}checked{/if} />1
                      </label>
                    </div>
                    <div class="checkbox">
                      <label for="check2">
                        <input type="checkbox" value="2" name="correct[]" id="check2" {if $arExam.correct2 eq '2'}checked{/if} />2
                      </label>
                    </div>
                    <div class="checkbox">
                      <label for="check3">
                        <input type="checkbox" value="3" name="correct[]" id="check3" {if $arExam.correct3 eq '3'}checked{/if} />3
                      </label>
                    </div>
                    <div class="checkbox">
                      <label for="check4">
                        <input type="checkbox" value="4" name="correct[]" id="check4" {if $arExam.correct4 eq '4'}checked{/if} />4
                      </label>
                    </div>
                    <div class="checkbox">
                      <label for="check5">
                        <input type="checkbox" value="5" name="correct[]" id="check5" {if $arExam.correct5 eq '5'}checked{/if} />5
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>選択肢1</th>
                  <td><input class="form-control" type="text" name="ans1" value="{$arExam.ans1}" /></td>
                </tr>
                <tr>
                  <th>選択肢2</th>
                  <td><input class="form-control" type="text" name="ans2" value="{$arExam.ans2}" /></td>
                </tr>
                <tr>
                  <th>選択肢3</th>
                  <td><input class="form-control" type="text" name="ans3" value="{$arExam.ans3}" /></td>
                </tr>
                <tr>
                  <th>選択肢4</th>
                  <td><input class="form-control" type="text" name="ans4" value="{$arExam.ans4}" /></td>
                </tr>
                <tr>
                  <th>選択肢5</th>
                  <td><input class="form-control" type="text" name="ans5" value="{$arExam.ans5}" /></td>
                </tr>
              </tbody>
            </table>
            <div class="row">
              <div class="col-md-6 left">
                <input type="hidden" name="mode" value="update" />
                <button type="button" class="btn btn-default" name="btnUpdate" onClick="examupdate()">更新</button>
          </form>
                <a href="exam.php">
                  <button type="button" class="btn btn-default">キャンセル</button>
                </a>
              </div>
              <div class="col-md-6" style="text-align: right">
                <form name="examdelfrm" action="exam.php" method="POST">
                  <input type="hidden" name="cd" value="{$arExam.cd}" />
                  <input type="hidden" name="mode" value="del">
                  <button type="button" class="btn btn-danger" name="btndel" onClick="examdelete()">削除</button>
                </form>
              </div>

        </div>
      </div>

      <div class="col-md-1"></div>
    </div>

  </div>

</body>
{include file='footer.tpl'}
