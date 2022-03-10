# Laravel Example App with Admin Portal powered by WorkOS

An example application demonstrating to use the [WorkOS Laravel SDK](https://github.com/workos-inc/workos-laravel) to access the Admin Portal for SSO and Directory Sync. 

## Prerequisites

Laravel 4.X.XX

## Laravel Project Setup

1. Clone the main repo and install dependencies for the app you'd like to use:
    ```bash
    # HTTPS
    git clone https://github.com/workos-inc/laravel-example-applications.git
    ```
    or

    ```bash
    # SSH
    git clone git@github.com:workos-inc/laravel-example-applications.git 
    ```

2. Navigate to the Admin Portal app within the cloned repo. 
   ```bash
   $ cd laravel-example-applications/laravel-admin-portal-example
   ```

3. Install the dependencies. 
    ```bash
    $ composer i
    $ composer require laravelcollective/html:^5.5.0
    ```
## Configure your environment

1. Grab your [API Key](https://dashboard.workos.com/api-keys).
2. Get your [Client ID](https://dashboard.workos.com/configuration).
3. Create a `.env` file at the root of the project and populate with the
following environment variables (using values found above):

```typescript
WORKOS_API_KEY=your_api_key_here
WORKOS_CLIENT_ID=your_client_id_here
```

4. Set your [Default Redirect Link](https://dashboard.workos.com/configuration).

## Run the server and log in using SSO

```sh
php artisan serve
```

Head to `http://localhost:8000/` to begin!


## Need help?

If you get stuck and aren't able to resolve the issue by reading our [WorkOS Admin Portal documentation](https://workos.com/docs/admin-portal/guide/introduction), API reference, or tutorials, you can reach out to us at support@workos.com and we'll lend a hand.