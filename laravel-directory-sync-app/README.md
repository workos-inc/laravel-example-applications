# laraveldirectory-sync-example

An example Laravel application demonstrating how Directory Sync works with WorkOS and our Laravel SDK.

## Clone and Install

1. Clone the main repo:

```sh
git clone https://github.com/workos-inc/laravel-example-applications.git
```

2. Navigate to the Laravel Directory Sync app within the main repo and install dependencies:

```sh
cd laravel-example-applications/laravel-directory-sync-example && conposer i
```

## Configure your environment

1. Grab your [API Key](https://dashboard.workos.com/api-keys).
2. Run `cp .env.example .env` and add your API key. The `workos` gem will read your API key from the ENV variable `WORKOS_API_KEY`. You may also set the API key yourself by adding `WorkOS.key = $YOUR_API_KEY` to `app.rb`.

## Run the app

```sh
php artisan serve
```
Open another terminal and run:
```sh
composer require beyondcode/laravel-websockets
```

Head to `http://localhost:8000`

## Testing Webhooks

### 1. Click on the "Test Webhooks" button to navigate to the webhooks view.


### 2. Start an `ngrok` session

[Ngrok](https://ngrok.com/) is a simple application that allows you to map a local endpoint to a public endpoint.

The application will run on http://localhost:8000. Ngrok will create a tunnel to the application so we can receive webhooks from WorkOS.

```sh
./ngrok http 8000
```

### 3. Set Up a WorkOS Endpoint

Log into the [WorkOS Dashboard](https://dashboard.workos.com/webhooks) and add a Webhook endpoint with the public ngrok URL with `/webhooks` appended.

The local application is listening for webhook requests at http://localhost:8000/webhooks

### 4. Set Up Webhooks Secret

In order for the SDK to validate that WorkOS webhooks, locate the Webhook secret from the dashboard.

Then populate the following environment variable in your `.env` file at the root of the project.

```sh
WORKOS_WEBHOOK_SECRET=your_webhook_secret
```

For more information, see the [WorkOS Laravel SDK documentation](https://docs.workos.com/sdk/laravel).