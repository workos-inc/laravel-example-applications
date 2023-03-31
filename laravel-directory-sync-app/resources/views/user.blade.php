{{ Html::style('css/styles.css'); }}
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>


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
            <h2>User</h2>
            <div class="text_box">
                <h4 class="center">{{$user -> firstName}} {{$user -> lastName}} - {{$user -> username}} (Status: <span class='{{$user -> state}}'>{{$user -> state}})</span> </h4>

                <ul style="list-style: none;">

                    <li class = "center">
                    </li>

                    <li>
                        <strong> Raw Attributes</strong>
                    </li>
                    <li>
                    <pre class="prettyprint">{{print_r($user -> rawAttributes)}}</pre>
                        

                    </li>
                    <li>
                        <strong>Custom Attributes</strong>
                    </li>
                    <li>
                        
                        <pre class="prettyprint">{{print_r($user -> customAttributes)}}</pre>

                    </li>

                
                    @if ($user -> groups)
                        <li class = "attribute_title">
                        <strong> Groups</strong>
                        </li>
                        <div class="column_4">
                            @foreach($user -> groups as $group)
                            <li class = "center">
                                <p class='button' id='group_user_button'>{{$group['name']}}</p>
                            </li>
                        @endforeach
                    @endif

                    </div>

                </ul>

            </div>
            <a href="{{ url('directory/'.$directoryId) }}"><button class='button back'> ❮ Back </button></a>

        </div>
    </div>
</div>



