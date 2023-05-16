{{ Html::style('css/styles.css'); }}

<div class="logged_in_nav">
    <div class="flex">
        <div>
            <img src="{{ asset('images/workos-logo-with-text.png') }}" alt="workos logo" />
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
<div class='flex'>
    <div class="logged_in_div_right">
        <div class="flex_column">
            <div class="flex space-between width-725px">
                <div class="flex">
                    <h2>MFA Factors</h2>
                </div>
                <div class="flex space-between">
                    <a href="/enroll_factor">
                        <button class="button button-outline button-sm">Enroll New Factor</button>
                    </a>
                    <a href="/clear_session">
                        <button class="button button-outline button-sm">Clear Factors</button>
                    </a>
                </div>
            </div>
        </div>
        <div>
            @if(count($factors) > 0)
            <table class="width-725px">
                <tr>
                    <th>Type</th>
                    <th>ID</th>
                    <th>View Details</th>
                </tr>
                @foreach($factors as $factor)
                <tr>
                    <td>{{ $factor->type }}</td>
                    <td>{{ $factor->id }}</td>
                    <td>
                        <a class="button button-outline" href="/factor_detail?id={{$factor->id}}">
                            <x-lucide-settings-2 class="icon" style="width: 20px; height: 20px" stroke_width="1" />
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
            @else
            <div class="mt-20 card width-40vw">
                <p style="text-align: center; color: gray;">No Current Factors</p>
            </div>
            @endif
        </div>
    </div>
</div>