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

        @if ($directories)
        <h2>Directories</h2>

        <div class = "flex directory_list">
            <div class="text_box">
                <ul style="list-style: none;">
                @foreach ($directories as $directory)
                
                        <h4 class = "center">{{$directory->name}} - {{$directory->id}}<h4>
                        <li class = "center">
                            <a href="{{ url('directory/'.$directory->id . '/users') }}"><button class='button'>Users</button></a>
                            <a href="{{ url('directory/'.$directory->id . '/groups') }}"><button class='button'>Groups</button></a>
                            
                        </li>
                @endforeach
                </ul>
                </div>
            </div>  
            <h2>Webhooks</h2>
        <a href="{{ url('webhooks') }}"><button class='button'>Test Webhooks</button></a>
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

