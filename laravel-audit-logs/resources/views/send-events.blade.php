{{ Html::style('css/styles.css'); }}

<body class="container_success">
    <div class="logged_in_div_left flex_column">
        <div class="flex logged_in_div_left_title">
            <div><h2>{{$organization->name}}</h2></div>
                <x-lucide-settings class="icon" style="width: 20px; height: 20px" stroke_width="1" />
        </div>
        <hr style="height:0.5px;width:75%;">
        <div class="flex flex_column success-buttons">
            <a href="/">
                <div class="flex sidebar-button">
                    <x-lucide-settings-2 class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                    <div>
                        <p>Organizations</p>
                    </div>
                </div>
            </a>
            <div class="flex sidebar-button selected">
                <x-lucide-clipboard-edit class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                <div>
                    <p>Audit Logs</p>
                </div>
            </div>
        </div>
    </div>

    <div class="logged_in_div_right">
        <div class="logged_in_nav">
            <div class="flex">
                <div>
                    <a href="https://workos.com/docs" target="_blank"><button class='button nav-item'>Documentation</button></a>
                </div>
                <div>
                    <a href="https://workos.com/docs/reference" target="_blank"><button class='button nav-item'>API
                        Reference</button></a>
                </div>
                <div>
                    <a href="https://workos.com/blog" target="_blank"><button
                        class='button nav-item blog-nav-button'>Blog</button></a>
                </div>
                <div>
                    <a href="https://workos.com/" target="_blank">
                    <img src="{{ URL::to('/assets/img/workos_favicon.png') }}" class="nav-image"  alt="link to workos.com logo">
                    </a> 
                </div>
            </div>
        </div>
        <div class="flex_column width-65vw logged_in_right_content">
            <div class="flex flex-start width-65vw page-title">
                <div><h2>Audit Logs</h2></div>
            </div>
            <div class="flex card width-65vw space-between ">
                <code class="org-id">{{$organization->id}}</code>
                <div>                    
                    <a href="/"><button class="button">Change Org</button></a>
                </div>               
            </div>
            <div class="card events-card">
                <div class="flex flex-start">
                    <div class="flex-column flex-start">
                        <div data-tab-target="#send-events" name='#send-events' class="flex space-evenly width-11vw content-button tab">
                        <x-lucide-send class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                            <div>
                                <a href="#send-events" class="remove-style"><button class="remove-style">Send Events</button></a>
                            </div>                            
                        </div>
                        <div data-tab-target="#export-events" name='#export-events' class="flex space-evenly width-11vw content-button  tab">
                        <x-lucide-download class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                            <div>
                                <a href="#export-events" class="remove-style"><button class="remove-style">Export Events</button></a>
                            </div>                            
                        </div>
                        <div class="flex space-evenly width-11vw content-button tab">
                        <x-lucide-eye class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                            <div>
                            <a href="{{url('/events?intent=audit_logs&organization_id='.$organization->id)}}" class="remove-style"><button class="remove-style">View Logs</button></a>
                            </div>                            
                        </div>
                        <div class="flex space-evenly width-11vw content-button tab">
                        <x-lucide-share class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                            <div>
                                <a href="{{url('/events?intent=log_streams&organization_id='.$organization->id)}}" class="remove-style"><button class="remove-style">Configure Log Streams</button></a>
                            </div>                            
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="send-events" name='#send-events' data-tab-content class="flex_column">                          
                          <div>
                            <h3>Send Events</h3>
                            <p>Configure and send a "User Organization Deleted" Event</p>  
                          </div>
                          <hr style="height:0.5px;width:100%;margin-bottom:25px;">                                                 
                          <form action="/send_events" method="POST">
                            @csrf
                            <input type="hidden" name="organization_id" value="{{$organization->id}}" >
                           <div class="event-form-input-group flex-column flex-start">
                            <div><label for="event-version">Event Version</label></div>
                            <div><input required name="event_version" class="text-input" type="text" placeholder="[Integer] schema version of the event"></div>
                           </div>
                           <div class="event-form-input-group flex-column flex-start">
                            <div><label for="actor-name">Actor Name</label></div>
                            <div><input required name="actor_name" class="text-input" type="text" placeholder="Name of the user who completed the action"></div>
                           </div>
                           <div class="event-form-input-group flex-column flex-start">
                            <div><label for="actor-type">Actor Type</label></div>
                            <div><input required name="actor_type" class="text-input" type="text" placeholder="Type of the user who completed the action"></div>
                           </div>
                           <div class="event-form-input-group flex-column flex-start">
                            <div><label for="target-name">Target Name</label></div>
                            <div><input required name="target_name" class="text-input" type="text" placeholder="Name of the target"></div>
                           </div>
                           <div class="event-form-input-group flex-column flex-start">
                            <div><label for="target-type">Target Type</label></div>
                            <div><input required name="target_type" class="text-input" type="text" placeholder="Defined in WorkOS Dashboard"></div>
                           </div>                                                  
                            <div>
                                <button class="button button-outline" name="event" id="user_org_deleted" value="user-organization-deleted" type="submit" onclick="showSnackbar()">                            
                                    <div class="flex width-100p">
                                        <p>Send Event</p> 
                                    </div>                           
                                </button>
                            </div>                        
                          </form>                                         
                        </div>
    
                        <div id="export-events" name='#export-events' data-tab-content>
                            <form action='/get_events' method="POST">
                                @csrf
                                <h3>Export Events</h3>
                                <div>
                                    <p>Audit Log events can be exported in a 2 step process. First, generate a CSV, and then Download it.</p>                                    
                                </div>
                                <hr style="height:0.5px;width:100%;margin-bottom:25px;">
                                <div class="flex-column">
                                     <input type="hidden" name="organization_id" value="{{$organization->id}}" >
                                    <div class="event-form-input-group flex-column flex-start">
                                        <div><label for="range_start">Range Start</label></div>
                                        <div><input required name="range_start" class="text-input" type="text" value="{{ \Carbon\Carbon::now()->subDays(30)->toISOString() }}" placeholder="ISO-8601 value for start of the export range"></div>
                                    </div> 
                                    <div class="event-form-input-group flex-column flex-start">
                                        <div><label for="range_end">Range End</label></div>
                                        <div><input required name="range_end" class="text-input" type="text" value="{{ \Carbon\Carbon::now()->toISOString() }}" placeholder="ISO-8601 value for end of the export range"></div>
                                    </div> 
                                    <div class="event-form-input-group flex-column flex-start">
                                        <div><label for="filter_actions">Actions</label></div>
                                        <div><input  name="filter_actions" class="text-input" type="text" placeholder="Optional list of actions to filter on"></div>
                                    </div> 
                                    <div class="event-form-input-group flex-column flex-start">
                                        <div><label for="filter_actors">Actors</label></div>
                                        <div><input  name="filter_actors" class="text-input" type="text" placeholder="Optional list of actors to filter on"></div>
                                    </div> 
                                    <div class="event-form-input-group flex-column flex-start">
                                        <div><label for="filter_targets">Targets</label></div>
                                        <div><input  name="filter_targets" class="text-input" type="text" placeholder="Optional list of targets to filter on"></div>
                                    </div> 
                                </div>
                                <div class="flex flex-start">                                    
                                        <div class="flex width-150px">
                                            <button class="button button-outline" name="event" id="generate_csv" value="generate_csv" type="submit">Generate CSV</button>                           
                                        </div>                                                                                                                 
                                        <div class="flex width-150px">
                                            <button class="button button-outline" name="event" id="access_csv" value="access_csv" type="submit">Download CSV</button>
                                        </div>                                                               
                                </div> 
                            </form>
                        </div>                                      
                      </div>                       
                </div>                                        
            </div>
            
            <div id="snackbar">Log Event Sent</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
    <script>
        function showSnackbar() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 500);
        }

        const tabs = document.querySelectorAll('[data-tab-target]')
        const tabContents = document.querySelectorAll('[data-tab-content]')
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = document.querySelector(tab.dataset.tabTarget)
                tabContents.forEach(tabContent => {
                    tabContent.classList.remove('active')
                })
                tabs.forEach(tab => {
                    tab.classList.remove('active')
                })
                tab.classList.add('active')
                target.classList.add('active')            
                localStorage.setItem('selectedTab', target.getAttribute('name'))                
            })
        })
        
        tabs.forEach(tab => {
            if(localStorage.getItem('selectedTab') != undefined || null) {
                if(tab.getAttribute('name') == localStorage.getItem('selectedTab')){
                    const target = document.querySelector(tab.dataset.tabTarget)
                    tabContents.forEach(tabContent => {
                        tabContent.classList.remove('active')
                    })
                    tabs.forEach(tab => {
                        tab.classList.remove('active')
                    })
                    tab.classList.add('active')
                    target.classList.add('active')
                }                                                        
            }
        })
    </script>
</body>
