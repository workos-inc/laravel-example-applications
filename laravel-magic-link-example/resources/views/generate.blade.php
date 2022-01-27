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
      <h1>Send a magic link</h1>
        <hr style="width:100%">

        <form method="POST" action="/passwordless">
            <div class="flex_column">
                <div class="form-group">
                    <textarea name="email" id="email" name="email" class="text_input" placeholder='Enter the email' required></textarea>  
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="button">Send Email</button>
                </div>
            {{ csrf_field() }}
            </div>
        </form>

      </div>
  </div>
</div>

