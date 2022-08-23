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
            <a href="{{ url('/') }}"><button class='button back'> ❮ Back </button></a>

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

                        {{print_r($user -> rawAttributes)}}

                    </li>
                    <li>
                        CUSTOM ATTRIBUTES
                    </li>
                    <li>
                        {{print_r($user -> customAttributes)}}

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

        </div>
    </div>
</div>



