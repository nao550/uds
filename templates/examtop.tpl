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
          <div class="main">
            <form name="examfrm" action="#" method="post" >
              <input type="hidden" name="uid" value="{$uid}" />
              <input type="hidden" name="sid" value="{$sid}" />
              <input type="hidden" name="examnum" value="{$examnum}" />
              <div class="form-group">
                {foreach $arexam as $exam name="examnum"}
                  <div class="exam">
                    <input type="hidden" name="{$exam@iteration}examcd" value="{$exam.cd}" />
                    <input type="hidden" name="{$exam@iteration}catcd" value="{$exam.catecd}" />
                    <input type="hidden" name="{$exam@iteration}correct" value="{$exam.correct}" />
                    <input type="hidden" name="{$exam@iteration}type" value="{$exam.type}" />
                    <div class="examtoi">
                      {$exam@iteration}:
                      {{$exam.exam}|nl2br nofilter}
                    </div>
                    <div class="examselect">
                      {if $exam.type eq '1'}
                        {if $exam.ans1 neq ''}
                          <input type="radio" name="{$exam@iteration}ans[]" value="1" />{$exam.ans1}<br />
                          {/if}
                          {if $exam.ans2 neq ''}
                            <input type="radio" name="{$exam@iteration}ans[]" value="2" />{$exam.ans2}<br />
                          {/if}
                          {if $exam.ans3 neq ''}
                            <input type="radio" name="{$exam@iteration}ans[]" value="3" />{$exam.ans3}<br />
                          {/if}
                          {if $exam.ans4 neq ''}
                            <input type="radio" name="{$exam@iteration}ans[]" value="4" />{$exam.ans4}<br />
                          {/if}
                          {if $exam.ans5 neq '' }
                            <input type="radio" name="{$exam@iteration}ans[]" value="5" />{$exam.ans5}<br />
                          {/if}
                      {elseif $exam.type eq '2'}
                        {if $exam.ans1 neq ''}
                          <input type="checkbox" name="{$exam@iteration}ans[]" value="1" />{$exam.ans1}<br />
                        {/if}
                        {if $exam.ans2 neq ''}
                          <input type="checkbox" name="{$exam@iteration}ans[]" value="2" />{$exam.ans2}<br />
                        {/if}
                        {if $exam.ans3 neq ''}
                          <input type="checkbox" name="{$exam@iteration}ans[]" value="3" />{$exam.ans3}<br />
                        {/if}
                        {if $exam.ans4 neq ''}
                          <input type="checkbox" name="{$exam@iteration}ans[]" value="4" />{$exam.ans4}<br />
                        {/if}
                        {if $exam.ans5 neq '' }
                          <input type="checkbox" name="{$exam@iteration}ans[]" value="5" />{$exam.ans5}<br />
                        {/if}
                      {/if}
                    </div>
                  </div>
                {/foreach}
              </div>
              <input type="hidden" name="mode" value="ans">
              <input type="button" class="btn btn-default" onClick="examsubmit()" value="解答を送信">
            </form>
          </div>
        </div>
      </div>
    </div>

{include file='footer.tpl'}
