{{ Html::style('css/styles.css'); }}

<div class="logged_in_nav">
    <div class="flex">
        <div>
            <img src="{{ URL::to('/images/workos-logo-with-text.png') }}" alt="workos logo" />
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
<div class="flex">
    <div class="logged_in_div_right">
        <div class="flex_column">
            <h2>Which Admin Portal would you like to launch?</h2>
            <div class="flex">
                <table class="width-65vw">
                    <tr>
                        <th>Intent</th>
                        <th>Create New Session</th>
                    </tr>
                    <tr>
                        <td class="ta-left">SSO</td>
                        <td>
                            <a class="button button-outline" href="{{ url('/launch_admin_portal?intent=sso') }}">
                                <x-lucide-settings-2 class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ta-left">Directory Sync</td>
                        <td>
                            <a class="button button-outline" href="{{ url('/launch_admin_portal?intent=dsync') }}">
                                <x-lucide-settings-2 class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ta-left">Audit Logs</td>
                        <td>
                            <a class="button button-outline" href="{{ url('/launch_admin_portal?intent=audit_logs') }}">
                                <x-lucide-settings-2 class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ta-left">Log Streams</td>
                        <td>
                            <a class="button button-outline" href="{{ url('/launch_admin_portal?intent=log_streams') }}">
                                <x-lucide-settings-2 class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>