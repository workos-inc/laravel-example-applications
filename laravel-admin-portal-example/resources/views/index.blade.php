{{ Html::style('css/styles.css'); }}


<div class="logged_in_nav">
</div>
<div class='flex'>
  <div class="logged_in_div_left">
      <div>
          <h1>Your app,</h1>
          <h2>Enterprise Ready</h2>
      </div>
      <div>
          <a href="https://workos.com/" target="_blank"><button class='button'>WorkOS</button></a>
          <a href="https://workos.com/docs" target="_blank"><button class='button'>Documentation</button></a>
          <a href="https://workos.com/docs/reference" target="_blank"><button class='button'>API Reference</button></a>
          <a href="https://workos.com/blog" target="_blank"><button class='button'>Blog</button></a>
          
      </div>
    </div>
    <div class="logged_in_div_right">
        <div class="flex_column">
            <h1>Create Admin Portal</h1>
            <hr style="width:100%">

            <form method="POST" action="/provision-enterprise">
                <div class="flex_column">
                    <div class="form-group">
                        <textarea name="org" id="org" name="org" class="text_input" placeholder='Enter Your Organization Name to Provision' required></textarea>  
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <br>
                        <textarea name="domain" id="domain" name="email" class="text_input" placeholder='Enter a Space Separated List of Domains Used By the Org' required></textarea>  
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="button">Generate Link</button>
                    </div>
                {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>
</div>

