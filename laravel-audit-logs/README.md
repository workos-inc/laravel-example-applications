# Laravel Example App with Audit Logs powered by WorkOS

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
    ```
    WORKOS_API_KEY=sk_xxxxxxxxxxxxx
    WORKOS_CLIENT_ID=project_xxxxxxxxxxxx
    ```

## Audit Logs Setup with WorkOS

5. Follow the [Audit Logs configuration steps](https://workos.com/docs/audit-logs/emit-an-audit-log-event/sign-in-to-your-workos-dashboard-account-and-configure-audit-log-event-schemas) to set up the following 5 events that are sent with this example:

Action title: "user.signed_in" | Target type: "team"
Action title: "user.logged_out" | Target type: "team"
Action title: "user.organization_set" | Target type: "team"
Action title: "user.organization_deleted" | Target type: "team"
Action title: "user.connection_deleted" | Target type: "team"

6. Next, take note of the Organization ID for the Org which you will be sending the Audit Log events for. This ID gets entered into the splash page of the example application.

7. Once you enter the Organization ID and submit it, you will be brought to the page where you'll be able to send the audit log events that were just configured. You'll also notice that the action of setting the Organization triggered an Audit Log already. Click the buttons to send the respective events.

8. To obtain a CSV of the Audit Log events that were sent for the last 30 days, click the "Export Events" button. This will bring you to a new page where you can download the events. Downloading the events is a 2 step process. First you need to create the report by clicking the "Generate CSV" button. Then click the "Access CSV" button to download a CSV of the Audit Log events for the selected Organization for the past 30 days.


## Testing the Integration

9. Start the server and head to `http://localhost:8000/ to begin the login flow! 

```sh
php artisan serve
```


## Need help?

If you get stuck and aren't able to resolve the issue by reading our [WorkOS Laravel SDK documentation](https://docs.workos.com/sdk/laravel), API reference, or tutorials, you can reach out to us at support@workos.com and we'll lend a hand.
