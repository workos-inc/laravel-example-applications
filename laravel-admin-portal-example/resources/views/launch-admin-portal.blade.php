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
                    <h2>Which Admin Portal would you like to launch?</h2>
                    <div>
                        <a href="/sso-admin-portal"><button class='button dsync_button'>Launch SSO</button></a>
                    </div>
                    <div>
                        <a href="/dsync-admin-portal"><button class='button dsync_button'>Launch Directory Sync</button></a>
                    </div>
                </div>
            </div>
  </div>
</div>
