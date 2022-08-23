{{ Html::style('css/styles.css'); }}

<div class="logged_in_nav">
        <div class="flex">
            <div>
            <img src="{{ URL::to('/images/workos-logo-with-text.png') }}"alt="workos logo">
            </div>

        </div>
        <div>
            <a href="https://workos.com/docs" target="_blank"><button class='button nav-item'>Documentation</button></a>
            <a href="https://workos.com/docs/reference" target="_blank"><button class='button nav-item'>API
                    Reference</button></a>
            <a href="https://workos.com/blog" target="_blank"><button
                    class='button nav-item blog-nav-button'>Blog</button></a>
            <a href="https://workos.com/" target="_blank"><button class='button button-outline'>WorkOS</button></a>
        </div>
    </div>
    <div class='flex'>
        <div class="logged_in_div_left">
            <div class="title-text">
                <h1>Your app,</h1>
                <h2 class="home-hero-gradient">Enterprise Ready</h2>
            </div>
            <div class="title-subtext">
                <p>Start selling to enterprise customers with just a few lines of code.</p>
                <p>Implement features like single sign-on in minutes instead of months.</p>
            </div>
            <div class="flex success-buttons">
                <a href="https://workos.com/signup" target="_blank"><button class='button'>Get Started</button></a>
                <a href="mailto:sales@workos.com?subject=WorkOS Sales Inquiry" target="_blank"><button
                        class='button button-outline sales-button'>Contact
                        Sales</button></a>
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

