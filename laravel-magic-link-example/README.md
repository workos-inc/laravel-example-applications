# Laravel Example App with Magic Link powered by WorkOS

An example application demonstrating to use the [WorkOS laravel SDK](https://github.com/workos/workos-laravel) to authenticate users via SSO. 

## Prerequisites

Laravel 4.X.XX

## Laravel Project Setup

1. Clone the main repo and install dependencies for the app you'd like to use:
    ```bash
    # HTTPS
    git clone https://github.com/workos/laravel-example-applications.git
    ```
    or

    ```bash
    # SSH
    git clone git@github.com:workos-inc/laravel-example-applications.git
    ```

2. Navigate to the Magic Link app within the cloned repo. 
   ```bash
   $ cd laravel-example-applications/laravel-magic-link-example
   ```

3. Install the dependencies. 
    ```bash
    $ composer i
    ```

## Configure your environment

1. Grab your [API Key](https://dashboard.workos.com/api-keys).
2. Run `cp .env.example .env` and add all add values for all WORKOS_ prefixed environmental variables at bottom of .env file
3. Set your [Default Redirect Link](https://dashboard.workos.com/configuration) to `http://localhost:8000/callback`.

## Run the server

```sh
php artisan serve
```

Head to `http://localhost:8000/` and enter the email address to which you want to send the Magic Link!


## Need help?

If you get stuck and aren't able to resolve the issue by reading our [WorkOS Magic Link documentation](https://workos.com/docs/magic-link/guide/introduction), API reference, or tutorials, you can reach out to us at support@workos.com and we'll lend a hand.
