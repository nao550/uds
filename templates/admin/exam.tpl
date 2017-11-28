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
            <a href="cate.php"><button class="btn btn-default">問題カテゴリ編集</button></a>
            <a href="qst.php"><button class="btn btn-default">アンケート編集</button></a>
          </div>
        </div>
        <div class="col-md-1"></div>        
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="main">
            <table class="table table-bordered">
              {foreach $arExam as $ar name=exams}
                {if $ar@first}
                  <theader>
                    <tr>
                      <th>#</th>
                      <th>カテゴリ</th>
                      <th>問題</th>
                      <th>正解</th>
                      <th>タイプ</th>
                      <th>選択肢1</th>
                      <th>選択肢2</th>
                      <th>選択肢3</th>
                      <th>選択肢4</th>
                      <th>選択肢5</th>
                      <th>*</th>                        
                    </tr>
                  </theader>
                {/if}
                <tbody>
                  <tr>
                    <td class="center" style="vertical-align: middle";>
                      {$smarty.foreach.exams.iteration}
                      <input type="hidden" name="cd" value="{$ar.cd}"/>
                    </td>
                    <td>
                      {foreach $cate as $cat}
                        {if $cat.cd eq $ar.catecd}
                          {$cat.nm}
                        {/if}
                      {/foreach}
                    </td>
                    <td>{{$ar.exam}|nl2br nofilter}</td>
                    <td>{$ar.correct}</td>                      
                    <td>
                      {if $ar.type eq '1'}
                        択一選択
                      {elseif $ar.type eq '2'}
                        複数選択
                      {/if}
                    </td>
                    <td>{$ar.ans1}</td>
                    <td>{$ar.ans2}</td>
                    <td>{$ar.ans3}</td>
                    <td>{$ar.ans4}</td>
                    <td>{$ar.ans5}</td>
                    <td>
                      <form name="frmExam" action="exam.php" method="POST">
                        <input type="hidden" name="cd" value="{$ar.cd}" />
                        <input type="hidden" name="mode" value="edit" />
                        <input type="submit" class="btn btn-default" value="編集" />
                      </form>
                    </td>
                  </tr>
                </tbody>
              {/foreach}
            </table>
            <form name="addExamfrm" action="exam.php" method="post">
              <input type="hidden" name="mode" value="add" />
              <input type="submit" class="btn btn-default" value="問題追加" />
            </form>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>

    </div>

  </body>
{include file='footer.tpl'}
  
