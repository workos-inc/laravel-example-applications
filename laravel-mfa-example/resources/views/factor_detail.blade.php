{{ Html::style('css/styles.css'); }}

<div class="logged_in_nav">
    <div class="flex">
        <div>
            <img src="{{ URL::to('/images/workos-logo-with-text.png') }}" alt="workos logo">
        </div>
    </div>
    <div class="flex">
        <a href="https://workos.com/docs" target="_blank">
            <button class="button nav-item">Documentation</button>
        </a>
        <a href="https://workos.com/docs/reference" target="_blank">
            <button class="button nav-item">API Reference</button>
        </a>
        <a href="https://workos.com/blog" target="_blank">
            <button class="button nav-item blog-nav-button">Blog</button>
        </a>
        <a href="https://workos.com/" target="_blank">
            <button class="button button-outline">WorkOS</button>
        </a>
    </div>
</div>
<div class='flex'>
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
                        @csrf
                        @if ($factor->type == 'sms')
                        <div class="flex width-587px space-between">
                            <div>
                            <input type="text" class="text_input width-350px" id="sms_message"
                                name="sms_message" class="text_input" placeholder="Custom SMS Message Input &#123;&#123;code&#125;&#125;" />
                            </div>
                            <div>
                                <button type="submit" class="button width-175px">
                                    Challenge Factor
                                </button>
                            </div>
                        </div>
                        @else
                        <div class="flex width-587px">
                            <button type="submit" class="button width-175px">
                                Challenge Factor
                            </button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
