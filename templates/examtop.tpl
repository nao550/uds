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
              <div class="form-group">
                {foreach $arexam as $exam name="examnum"}
                  <div class="exam">
                    <div class="examtoi">
                      {$exam@iteration}:
                      {{$exam.exam}|nl2br nofilter}
                    </div>
                    <div class="examselect">
                      {if $exam.type eq '1'}
                          <input type="hidden" name="{$exam.cd}[examcd]" value="{$exam.cd}" />
                          <input type="hidden" name="{$exam.cd}[type]" value="{$exam.type}" />                        
                          {if $exam.ans1 neq ''}
                            <input type="radio" name="{$exam.cd}[ans]" value="1" />{$exam.ans1}<br />
                          {/if}
                          {if $exam.ans2 neq ''}
                            <input type="radio" name="{$exam.cd}[ans]" value="2" />{$exam.ans2}<br />
                          {/if}
                          {if $exam.ans3 neq ''}
                            <input type="radio" name="{$exam.cd}[ans]" value="3" />{$exam.ans3}<br />
                          {/if}
                          {if $exam.ans4 neq ''}
                            <input type="radio" name="{$exam.cd}[ans]" value="4" />{$exam.ans4}<br />
                          {/if}
                          {if $exam.ans5 neq '' }
                            <input type="radio" name="{$exam.cd}[ans]" value="5" />{$exam.ans5}<br />
                          {/if}
                      {elseif $exam.type eq '2'}
                        <input type="hidden" name="{$exam.cd}[examcd]" value="{$exam.cd}" />
                        <input type="hidden" name="{$exam.cd}[type]" value="{$exam.type}" />                        
                        {if $exam.ans1 neq ''}
                          <input type="checkbox" name="{$exam.cd}[ans1]" value="1" />{$exam.ans1}<br />
                        {/if}
                        {if $exam.ans2 neq ''}
                          <input type="checkbox" name="{$exam.cd}[ans2]" value="2" />{$exam.ans2}<br />
                        {/if}
                        {if $exam.ans3 neq ''}
                          <input type="checkbox" name="{$exam.cd}[ans3]" value="3" />{$exam.ans3}<br />
                        {/if}
                        {if $exam.ans4 neq ''}
                          <input type="checkbox" name="{$exam.cd}[ans4]" value="4" />{$exam.ans4}<br />
                        {/if}
                        {if $exam.ans5 neq '' }
                          <input type="checkbox" name="{$exam.cd}[ans5]" value="5" />{$exam.ans5}<br />
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
  
