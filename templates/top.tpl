{include file='header.tpl'}
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle"><h1>理解度調査</h1></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="main">
            <form name="qstfrm" action="#" method="post" >
              <div class="form-group">
                {foreach $arqst as $qst name="qstnum"}
                  <div class="qst">
                    <div class="qsttoi">
                      {$qst@iteration}:
                      {{$qst.question}|nl2br nofilter}
                    </div>
                    <div class="qstselect">
                      {if $qst.type eq '1'}                
                        {if $qst.ans1 neq ''}
                          <input type="radio" name="{$qst.num}" value="1" />{$qst.ans1}<br />
                        {/if}
                        {if $qst.ans2 neq ''}
                          <input type="radio" name="{$qst.num}" value="2" />{$qst.ans2}<br />
                        {/if}
                        {if $qst.ans3 neq ''}
                          <input type="radio" name="{$qst.num}" value="3" />{$qst.ans3}<br />
                        {/if}
                        {if $qst.ans4 neq ''}
                          <input type="radio" name="{$qst.num}" value="4" />{$qst.ans4}<br />
                        {/if}
                        {if $qst.ans5 neq '' }
                          <input type="radio" name="{$qst.num}" value="5" />{$qst.ans5}<br />
                        {/if}
                      {elseif $qst.type eq '2'}
                        {if $qst.ans1 neq ''}
                          <input type="checkbox" name="{$qst.num}[]" value="1" />{$qst.ans1}<br />
                        {/if}
                        {if $qst.ans2 neq ''}
                          <input type="checkbox" name="{$qst.num}[]" value="2" />{$qst.ans2}<br />
                        {/if}
                        {if $qst.ans3 neq ''}
                          <input type="checkbox" name="{$qst.num}[]" value="3" />{$qst.ans3}<br />
                        {/if}
                        {if $qst.ans4 neq ''}
                          <input type="checkbox" name="{$qst.num}[]" value="4" />{$qst.ans4}<br />
                        {/if}
                        {if $qst.ans5 neq '' }
                          <input type="checkbox" name="{$qst.num}[]" value="5" />{$qst.ans5}<br />
                        {/if}
                      {/if}                
                    </div>
                  </div>
                {/foreach}
              </div>
              <input type="button" class="btn btn-default" onClick="qstsubmit()" value="送信">
            </form>
          </div>
        </div>
      </div>
    </div>

{include file='footer.tpl'}
  
