{{ Html::style('css/styles.css'); }}
<html>
<body >
    <div class="logged_in_nav">
        <div class="flex space-between width-100vw">
            <div><p>Ruby Directory Sync Example App</p></div>
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
                    <img src="{{ URL::to('/images/workos_favicon.png') }}" class="nav-image"  alt="link to workos.com logo">
                    </a> 
                </div>
            </div>
            
        </div>
    </div>
    <div class='flex_column  height-70vh'>
        <div class="flex width-70vw space-between">
            <div>
                <h2>Select a Directory</h2>
            </div>
            <div>
                <a href="/webhooks" class="button button-outline">Test Webhooks</a>
            </div>
        </div>
        <div class='flex_column card width-65vw'>                
                <div>
                    <table class="width-65vw">
                        <tr>
                          <th>Directory</th>
                          <th>ID</th>
                          <th>View Settings</th>
                        </tr>
                        @foreach ($directories as $directory)   
                          <tr>
                            <td>{{$directory->name}}</td>
                            <td>{{$directory->id}}</td>                
                            <td><a class="button button-outline width-95" href="{{ url('directory/'.$directory->id) }}"><x-lucide-settings-2 class="icon" style="width: 20px; height: 20px" stroke_width="1" /></a></td>
                          @endforeach          
                      </table>   
                </div>                     
                <div class="flex flex-end width-65vw">
                    @if ($after)
                    <div>
                        <a href="{{ url('?after='.$after) }}"><button class="button page-title">Previous</button></a>
                    </div>                        
                    @endif
                    @if ($before)
                    <div>
                        <a href="{{ url('?before='.$before) }}"><button class="button page-title">Next</button></a>
                    </div>                    
                    @endif        
                </div>    
            </div>
        </div>
    </div>
</body>

</html>