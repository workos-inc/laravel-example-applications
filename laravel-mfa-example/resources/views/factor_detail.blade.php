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
                <div class="flex">
                    <div class="flex-column">
                        <div>
                            <h2>ID: {{$factor->id}}</h2>
                        </div>
                        <div>
                            <p>Type: <code>{{$factor->type}}</code></p>
                            @if ($factor->type == "sms") 
                            <p>Phone Number: <code>{{$phone_number}}</code></p>
                            @endif 
                            <p>Created At: <code>{{$factor->createdAt}}</code></p>
                            <p>Updated At: <code>{{$factor->updatedAt}}</code></p>
                        </div>
                    </div>
                </div>

                <div class="flex-column">
                    <div>
                        <form method="POST" action="/challenge_factor">
                            <div class='flex_column'>
                                @if ($factor->type == "sms")                                
                                <div>
                                    <input type="text" id="sms_message" name="sms_message" class="text_input"
                                        placeholder="Custom SMS Message Input /{/{code}}'">
                                </div>
                                
                                @endif                                
                                {{ csrf_field() }}
                                <div>
                                    <button type="submit" class="button">Challenge Factor</button>
                                </div>                            
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>