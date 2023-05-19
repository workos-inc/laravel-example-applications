{{ Html::style('css/styles.css'); }}
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>

<div class="logged_in_nav">
    <div class="flex">
        <div>
            <img src="{{ URL::to('/images/workos-logo-with-text.png') }}" alt="workos logo">
        </div>
    </div>
    <div class="flex">
        <a href="https://workos.com/docs" target="_blank">
            <button class='button nav-item'>Documentation</button>
        </a>
        <a href="https://workos.com/docs/reference" target="_blank">
            <button class='button nav-item'>API Reference</button>
        </a>
        <a href="https://workos.com/blog" target="_blank">
            <button class='button nav-item blog-nav-button'>Blog</button>
        </a>
        <a href="https://workos.com/" target="_blank">
            <button class='button button-outline'>WorkOS</button>
        </a>
    </div>
</div>
<div class="logged_in_div_right">
    <div id="webhooks-view-div" class="flex_column">
        <div class="flex width-40vw space-between">
            <h2>Live Webhooks View</h2>
            <div id="tutorial_button">
                <a href="https://workos.com/blog/test-workos-webhooks-locally-ngrok" target="_blank"
                    class="button mt-15">Tutorial</a>
                <a href="/webhooks" class="button mt-10">Clear</a>
                <a href="{{ url('/') }}"><button class='button button-outline'>Back</button></a>
            </div>
        </div>
        <div id="webhooks-view" class="width-40vw webhooks-container">
            <div class="text_box">
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/app.js') }}"></script>
<script> 
        Echo.channel('webhooks')
            .listen('NewWebhook', (e) => {
                document.querySelector('.text_box').innerHTML = JSON.stringify(e.webhook)
            })
</script>
