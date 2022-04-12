{{ Html::style('css/styles.css'); }}

<div class="logged_in_nav">
        <div class="flex">
            <p>MFA Example Application</p>
        </div>
        <div>
            
            <img src="{{ URL::to('/')}}/images/workos_logo_new.png" alt="workos logo">
        </div>
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
                <a href="https://workos.com/docs/reference" target="_blank"><button class='button'>API
                        Reference</button></a>
                <a href="https://workos.com/blog" target="_blank"><button class='button'>Blog</button></a>

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
                            <p>Environment: <code>{{$factor->environmentId}}</code></p>
                            @if ($factor->type == "sms") 
                            <p>Phone Number: <code>{{$phone_number}}</code></p>
                            @endif 
                            <p>Created At: <code>{{$factor->createdAt}}</code></p>
                            <p>Updated At: <code>{{$factor->updatedAt}}</code></p>
                        </div>
                    </div>
                    @if ($factor->type == "totp")                                
                    <div class="qr_div">
                        <img class="qr_code" src="{{$qrCode}}" alt="qr_code">
                    </div>                              
                    @endif
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