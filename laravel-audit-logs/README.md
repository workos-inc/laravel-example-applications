# Laravel Example App with Audit Logs powered by WorkOS

An example Flask application demonstrating how to use the [WorkOS Laravel SDK](https://github.com/workos/workos-laravel) to send and retrieve Audit Log events. This example is not meant to show a real-world example of an Audit Logs implementation, but rather to show concrete examples of how events can be sent using the Laravel SDK.

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

2. Navigate to Audit Logs app within the cloned repo.

    ```bash
    $ cd laravel-example-applications/laravel-audit-logs
    ```

3. Install the dependencies.
    ```bash
    $ composer i
    ```

## Configure your environment

4. Grab your API Key and Client ID from the WorkOS Dashboard. Rename .env.example to `.env`, run `artisan key:generate` and then fill out the following information below:
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

## Audit Logs Setup with WorkOS

10. Follow the [Audit Logs configuration steps](https://workos.com/docs/audit-logs/emit-an-audit-log-event/sign-in-to-your-workos-dashboard-account-and-configure-audit-log-event-schemas) to set up the following 2 events that are sent with this example:

Action title: "user.organization_set" | Target type: "team"
Action title: "user.organization_deleted" | Target type: "team"

11. Configure the Admin Portal Redirect URI.

Navigate to the Configuration tab in your WorkOS Dshboard. From there click the Admin Portal tab. Click the Edit Admin Portal Redirect Links button and add "http://localhost:8000" to the "When clicking the back navigation, return users to:" input, then click Save Redirect Links.

12. To obtain a CSV of the Audit Log events that were sent for the last 30 days, click the "Export Events" tab. This will bring you to a new page where you can download the events. Downloading the events is a 2 step process. First you need to create the report by clicking the "Generate CSV" button. Then click the "Access CSV" button to download a CSV of the Audit Log events for the selected Organization for the past 30 days. You may also adjust the time range using the form inputs.

## Need help?

If you get stuck and aren't able to resolve the issue by reading our [WorkOS Laravel SDK documentation](https://docs.workos.com/sdk/laravel), API reference, or tutorials, you can reach out to us at support@workos.com and we'll lend a hand.
