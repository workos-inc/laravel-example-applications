{{ Html::style('css/styles.css'); }}

<div class="container_success">
    <div class="logged_in_nav">
        <div class="flex">
            <div>
            <img src="{{ URL::to('/assets/img/workos-logo-with-text.png') }}"alt="workos logo">
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
            <div class="flex flex-start width-40vw">
                <div><h1>{{$organization->name}}</h1></div>
            </div>
            <div class="flex_column width-40vw ">
                <div class="flex card width-40vw space-between ">
                    <code class="org-id">{{$organization->id}}</code>
                    <a href="/logout"><button class="button">Change Org</button></a>
                </div>
                <div class="card width-40vw">
                    <div class="flex space-evenly width-40vw margin-b-25">
                        <div>
                            <div class="button button-outline width-15vw">
                                <a href="https://workos.com/docs/audit-logs"><p>Audit Logs Docs</p></a>                            
                            </div>                    
                        </div>
                        <div>
                            <a href="/export_events">
                                <div class="button button-outline width-15vw">
                                    <p>Export Events</p>
                                </div> 
                            </a>                   
                        </div>
                    </div>
                    <hr style="height:0.5px;width:100%;">
                    <form method="POST" action="/send_event">
                        <input type="hidden" name="orgID" value='{{$organization->id}}'>
                        <div class="flex margin-y-15">                                                                
                            <div>
                                <button class="box" name="event" id="user_signed_in" value="0" type="submit">                            
                                    <div class="flex width-100p">
                                        <p>User Signed In</p> 
                                    </div>                           
                                </button>                    
                                <button class="box" name="event" id="user_logged_out" value="1" type="submit">                            
                                    <div class="flex width-100p">
                                        <p>User Logged Out</p> 
                                    </div>                           
                                </button> 
                            </div>
                            <div>
                                <button class="box" name="event" id="user_org_deleted" value="2" type="submit">                            
                                    <div class="flex width-100p">
                                        <p>User Organization Deleted</p> 
                                    </div>                           
                                </button>                    
                                <button class="box" name="event" id="user_connection_deleted" value="3" type="submit">                            
                                    <div class="flex width-100p">
                                        <p>User Connection Deleted</p> 
                                    </div>                           
                                </button> 
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
