# Laravel Example App with SSO powered by WorkOS

An example application demonstrating to use the [WorkOS Laravel SDK](https://github.com/workos/workos-laravel) to authenticate users via SSO.

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

2. Navigate to SSO app within the cloned repo.

    ```bash
    $ cd laravel-example-applications/laravel-sso-example
    ```

3. Install the dependencies.
    ```bash
    $ composer i
    ```

## Configure your environment

4. Grab your API Key and Client ID from the WorkOS Dashboard. Create a `.env`
   file at the root of the project, and store these like so:
   `    WORKOS_API_KEY=sk_xxxxxxxxxxxxx
    WORKOS_CLIENT_ID=project_xxxxxxxxxxxx
   `

## SSO Setup with WorkOS

5. Follow the [SSO authentication flow instructions](https://workos.com/docs/sso/guide/introduction) to create a new SSO connection in your WorkOS dashboard.

6. Add `http://localhost:8000/auth/callback` as a Redirect URI in the Configuration section of the Dashboard.

7. Update `env` with:
   WORKOS_ORGANIZATION_ID=org_xxxxxxxxxxxxx (organization ID being tested)
   WORKOS_REDIRECT_URI=https://xxxxxxxxxxxxx (redirect URI being used)

## Testing the Integration

8. Start the server and head to `http://localhost:8000/ to begin the login flow!

```sh
php artisan serve
```

## Need help?

If you get stuck and aren't able to resolve the issue by reading our [WorkOS Laravel SDK documentation](https://docs.workos.com/sdk/laravel), API reference, or tutorials, you can reach out to us at support@workos.com and we'll lend a hand.
