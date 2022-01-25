{{ Html::style('css/styles.css'); }}

@if ($profile)

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
          <h2>Raw Profile Response Details</h2>
          <div class="text_box">
          @foreach ($profile as $row)
            @json($row)
          @endforeach
          </div>
      </div>
      <a class='button logout_button' href='/logout'>Sign Out</a>
  </div>
</div>

@else
<div class="container_login">
    <div class='flex_column'>
    <div class="flex heading_div">
        <!-- <img src="<%= url("/workos_logo_new.png")%>" alt="workos logo"> -->
        <div class="heading_text_div">
            <h1>WorkOS</h1>
        </div>
    </div>

    <h2>Ruby SSO Example App</h2>
    <a class="button login_button" href="/auth">Login</a>
    </div>
</div>
@endif
