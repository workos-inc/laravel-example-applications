{{ Html::style('css/styles.css'); }}
<div class="container_login">
    <div class='flex_column'>
        <div class="flex heading_div">
            <img src="{{ URL::to('/assets/img/workos-logo-with-text.png') }}"alt="workos logo">
        </div>

        <h2>Laravel Audit Logs Example App</h2>
        <form method="POST" action="/organization">
                <div class="flex_column">
                    <div class="form-group">
                        <input class="text-input" type="text" id="orgID" name="orgID">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="button">Submit Organization ID</button>
                    </div>
                {{ csrf_field() }}
                </div>
            </form>
        @if (Session::has('message'))
            <div class="alert error-info">{{ Session::get('message') }}</div>
        @endif
    </div>
</div>