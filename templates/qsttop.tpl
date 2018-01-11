{include file='header.tpl'}
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="header">
            <div class="pagetitle"><h1>アンケート</h1></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="main">
            <form name="qstfrm" action="#" method="post" >
              <input type="hidden" name="uid" value="{$uid}" />
              <input type="hidden" name="sid" value="{$sid}" />
              <input type="hidden" name="qstnum" value="{$qstnum}" />
              <div class="form-group">
                {foreach $arqst as $qst name="qstnum"}
                  <div class="qst">
                    <div class="qsttoi">
                      {$qst@iteration}:
                      {{$qst.question}|nl2br nofilter}
                    </div>
                    <div class="qstselect">
                      {if $qst.type eq '1'}
                          <input type="hidden" name="{$qst@iteration}qstcd" value="{$qst.cd}" />
                          <input type="hidden" name="{$qst@iteration}type" value="{$qst.type}" />
                          {if $qst.ans1 neq ''}
                            <input type="radio" name="{$qst@iteration}ans[]" value="1" />{$qst.ans1}<br />
                          {/if}
                          {if $qst.ans2 neq ''}
                            <input type="radio" name="{$qst@iteration}ans[]" value="2" />{$qst.ans2}<br />
                          {/if}
                          {if $qst.ans3 neq ''}
                            <input type="radio" name="{$qst@iteration}ans[]" value="3" />{$qst.ans3}<br />
                          {/if}
                          {if $qst.ans4 neq ''}
                            <input type="radio" name="{$qst@iteration}ans[]" value="4" />{$qst.ans4}<br />
                          {/if}
                          {if $qst.ans5 neq '' }
                            <input type="radio" name="{$qst@iteration}ans[]" value="5" />{$qst.ans5}<br />
                          {/if}
                      {elseif $qst.type eq '2'}
                        <input type="hidden" name="{$qst@iteration}qstcd" value="{$qst.cd}" />
                        <input type="hidden" name="{$qst@iteration}type" value="{$qst.type}" />
                        {if $qst.ans1 neq ''}
                          <input type="checkbox" name="{$qst@iteration}ans[]" value="1" />{$qst.ans1}<br />
                        {/if}
                        {if $qst.ans2 neq ''}
                          <input type="checkbox" name="{$qst@iteration}ans[]" value="2" />{$qst.ans2}<br />
                        {/if}
                        {if $qst.ans3 neq ''}
                          <input type="checkbox" name="{$qst@iteration}ans[]" value="3" />{$qst.ans3}<br />
                        {/if}
                        {if $qst.ans4 neq ''}
                          <input type="checkbox" name="{$qst@iteration}ans[]" value="4" />{$qst.ans4}<br />
                        {/if}
                        {if $qst.ans5 neq '' }
                          <input type="checkbox" name="{$qst@iteration}ans[]" value="5" />{$qst.ans5}<br />
                        {/if}
                      {elseif $qst.type eq '3'}
                        <input type="hidden" name="{$qst@iteration}qstcd" value="{$qst.cd}" />
                        <input type="hidden" name="{$qst@iteration}type" value="{$qst.type}" />
                        <textarea name="{$qst@iteration}ans[]" style="width:100%;height:10em"></textarea>
                      {/if}
                    </div>
                  </div>
                {/foreach}
              </div>
              <input type="hidden" name="mode" value="ReQst">
              <input type="button" class="btn btn-default" onClick="qstsubmit()" value="送信">
            </form>
          </div>
        </div>
      </div>
    </div>

{include file='footer.tpl'}
