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
                <h2>Users</h2>
                <div class="text_box">
                    <ul>
                    @foreach ($users as $user)
                        <li>
                        <a href="{{url('directory/'.$directoryId.'/users/'.$user->id)}}">
                            {{$user->username}}
                        </a>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <h2>Groups</h2>
                <div class="text_box">
                    <ul>
                        @foreach ($groups as $group)
                        <li>
                        <a href="{{url('directory/'.$directoryId.'/groups/'.$group->id)}}">
                            {{$group->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a href="/"><button class='button back'> ❮ Back </button></a>
 
        </div>
    </div>
</div>


