# Browser Calls (Laravel)

Learn how to use [Twilio Client](https://www.twilio.com/client) to
make browser-to-phone and browser-to-browser calls with ease. The
unsatisfied customers of the Birchwood Bicycle Polo Co. need your
help!

[![Build Status](https://travis-ci.org/TwilioDevEd/browser-calls-laravel.svg?branch=master)](https://travis-ci.org/TwilioDevEd/browser-calls-laravel)

### Create a TwiML App

This project is configured to use a **TwiML App**, which allows us to easily set the voice URLs for all Twilio phone numbers we purchase in this app.

Create a new TwiML app at https://www.twilio.com/user/account/apps/add and use its `Sid` as the `TWIML_APPLICATION_SID` environment variable wherever you run this app.

![Creating a TwiML App](http://howtodocs.s3.amazonaws.com/call-tracking-twiml-app.gif)

Once you have created your TwiML app, configure your Twilio phone number to use it ([instructions here](https://www.twilio.com/help/faq/twilio-client/how-do-i-create-a-twiml-app)).

If you don't have a Twilio phone number yet, you can purchase a new number in your [Twilio Account Dashboard](https://www.twilio.com/user/account/phone-numbers/incoming).

### Run the application

1. Clone the repository and `cd` into it.
1. Install the application's dependencies with [Composer](https://getcomposer.org/)

   ```bash
   $ composer install
   ```
1. The application uses PostgreSQL as the persistence layer. If you
   don't have it already, you should install it. The easiest way is by
   using [Postgres.app](http://postgresapp.com/).
1. Create a database.

   ```bash
   $ createdb browser_calls
   ```
1. Copy the sample configuration file and edit it to match your configuration.

    ```bash
    $ cp .env.example .env
    ```

   You'll need to set `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, and
   `DB_PASSWORD`. You can often leave `DB_USERNAME` and `DB_PASSWORD`
   blank. `DB_HOST` should be `localhost` if you're running the DB in
   your own machine.

   You can find your `TWILIO_ACCOUNT_SID` and `TWILIO_AUTH_TOKEN` under
   your
   [Twilio Account Settings](https://www.twilio.com/user/account/settings). Set
   `TWILIO_APPLICATION_SID` to the app SID you created
   before. `TWILIO_NUMBER` should be set to the phone number you
   purchased above.

1. Generate an `APP_KEY`:

   ```bash
   $ php artisan key:generate
   ```
1. Run the migrations:

   ```bash
   $ php artisan migrate
   ```
1. Load the seed data:

   ```bash
   $ php artisan db:seed
   ```
1. Run the application using Artisan.

   ```bash
   $ php artisan serve
   ```
1. Expose the application to the wider Internet using [ngrok](https://ngrok.com/)

   ```bash
   $ ngrok http 8000
   ```
   Once you have started ngrok, update your TwiML app's voice URL
   setting to use your ngrok hostname, so it will look something like
   this:

   ```
   http://<your-ngrok-subdomain>.ngrok.io/support/call
   ```

### Dependencies

This application uses this Twilio helper library:
* [twilio-php](https://github.com/twilio/twilio-php)

### Run the tests

1. Run at the top-level directory:

   ```bash
   $ phpunit
   ```
