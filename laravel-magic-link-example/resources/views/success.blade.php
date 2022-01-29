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
      <h2>Here is your Magic Link, {{$email}} 🪄</h2> 

      </div>
  </div>
</div>
