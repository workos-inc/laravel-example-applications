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
        <div>
        <h2>Webhooks</h2>
        <a href="{{ url('webhooks') }}"><button class='button'>Test Webhooks</button></a>

        </div>
        @if ($directories)
            <h2>Directories</h2>
                <ul style="list-style: none;">
                @foreach ($directories as $directory)
                <div class="text_box">
                        <h4 class = "center">{{$directory->name}} - {{$directory->id}}<h4>
                        <li class = "center">
                            <a href="{{ url('directory/'.$directory->id . '/users') }}"><button class='button'>Users</button></a>
                            <a href="{{ url('directory/'.$directory->id . '/groups') }}"><button class='button'>Groups</button></a>
                              
                        </li>
                </div>

                @endforeach
                </ul>

        </div>
    </div>
    </div>

    @else
    <div class="container_login">
        <div class='flex_column'>
        <div class="flex heading_div">
            <div class="heading_text_div">
                <h1>WorkOS</h1>
            </div>
        </div>
        <h2>You Don't Have Any Directories Yet</h2>
        </div>
    </div>
@endif

