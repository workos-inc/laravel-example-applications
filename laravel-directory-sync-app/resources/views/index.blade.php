{{ Html::style('css/styles.css'); }}

<body>
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
    <div class='flex_column  height-70vh'>
        <div class="flex width-70vw space-between">
            <div>
                <h2>Select a Directory</h2>
            </div>
            <div>
                <a href="{{ url('webhooks') }}" class="button button-outline">Test Webhooks</a>
            </div>
        </div>
        <div class='flex_column card width-65vw'>
            <div>
                <table class="width-65vw">
                    <tr>
                        <th>Organization</th>
                        <th>ID</th>
                        <th>View Settings</th>
                    </tr>
                    @foreach ($directories as $directory)
                    <tr>
                        <td>{{$directory->name}}</td>
                        <td>{{$directory->id}}</td>
                        <td>
                            <a class="button button-outline" href="/directory?id={{ $directory->id }}">
                                <x-lucide-settings-2 class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="flex flex-end width-65vw">
                @if ($after)
                <div>
                    <a href="/?after={{ $after }}"><button class="button page-title">Previous</button></a>
                </div>
                @endif
                @if ($before)
                <div>
                    <a href="/?before={{ $before }}"><button class="button page-title">Next</button></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>


