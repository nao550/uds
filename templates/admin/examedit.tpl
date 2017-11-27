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
          <form name="exameditfrm" action="exam.php" method="POST">          
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
                  <td><textarea name="exam" class="form-control" rows="5"> {{$arExam.exam}|nl2br nofilter}</textarea></td>
                </tr>
                <tr>
                  <th>正解</th>
                  <td>
                    <select name="correct" class="form-control">
                      <option value="1" {if $arExam.correct eq '1'}selected{/if}>1</option>
                      <option value="2" {if $arExam.correct eq '2'}selected{/if}>2</option>
                      <option value="3" {if $arExam.correct eq '3'}selected{/if}>3</option>
                      <option value="4" {if $arExam.correct eq '4'}selected{/if}>5</option>
                      <option value="5" {if $arExam.correct eq '4'}selected{/if}>5</option>
                      
                    </select>
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
            <input type="hidden" name="mode" value="update" />
            <button type="button" class="btn btn-default" name="btnUpdate" onClick="examupdate()">更新</button>
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
  
