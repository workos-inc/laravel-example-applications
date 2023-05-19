{{ Html::style('css/styles.css'); }}

<body class="container_success">
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
    <div class="flex">
        <div class="logged_in_div_right">
            <div class="flex_column">
                <div class="flex_column">
                    <form method="POST" action="/verify_factor">
                        @csrf
                        <div class="flex_column">
                            <div class="flex form-wrap">
                                <input
                                    type="text"
                                    id="code-1"
                                    name="code-1"
                                    maxlength="1"
                                    class="text_input code-input"
                                    placeholder="-"
                                />
                                <input
                                    type="text"
                                    id="code-2"
                                    name="code-2"
                                    maxlength="1"
                                    class="text_input code-input"
                                    placeholder="-"
                                />
                                <input
                                    type="text"
                                    id="code-3"
                                    name="code-3"
                                    maxlength="1"
                                    class="text_input code-input"
                                    placeholder="-"
                                />
                                <input
                                    type="text"
                                    id="code-4"
                                    name="code-4"
                                    maxlength="1"
                                    class="text_input code-input"
                                    placeholder="-"
                                />
                                <input
                                    type="text"
                                    id="code-5"
                                    name="code-5"
                                    maxlength="1"
                                    class="text_input code-input"
                                    placeholder="-"
                                />
                                <input
                                    type="text"
                                    id="code-6"
                                    name="code-6"
                                    maxlength="1"
                                    class="text_input code-input"
                                    placeholder="-"
                                />
                            </div>
                            <div class="flex space-evenly width_25vw">
                                <div>
                                    <button type="submit" class="button button-sm">Verify Factor</button>
                                </div>
                                <div>
                                    <a href="/"><button type="button" class="button button-sm">Go Back Home</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const container = document.getElementsByClassName('form-wrap')[0]
    container.onkeyup = function (e) {
        const target = e.srcElement
        const maxLength = parseInt(target.attributes['maxlength'].value, 10)
        const myLength = target.value.length
        if (myLength >= maxLength) {
            let next = target
            while ((next = next.nextElementSibling)) {
                if (next == null) break
                if (next.tagName.toLowerCase() == 'input') {
                    next.focus()
                    break
                }
            }
        }
    }
</script>