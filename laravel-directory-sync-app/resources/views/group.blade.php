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
                <div class="flex_column">
                <h4 class="center">Group {{$group -> name}}: {{$group ->id}}</h4>

            <div class="text_box">
                    <h4 class='center'>Group Users</h4>

                <ul style="list-style: none;">
                <div class="column_2">


                    @foreach($group -> raw['raw_attributes']['members'] as $member)

                            <li>
                                <p class='button' id='group_user_button'>{{$member['display']}}</p>  
                            </li>

                    @endforeach

                    </div>



                    </div>

                </ul>

            </div>

        </div>

        </div>
    </div>
</div>



