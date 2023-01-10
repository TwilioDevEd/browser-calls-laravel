<a  href="https://www.twilio.com">
<img  src="https://static0.twilio.com/marketing/bundles/marketing/img/logos/wordmark-red.svg"  alt="Twilio"  width="250"  />
</a>

# Browser Calls (Laravel)

> This repository is now archived and is no longer being maintained. 
> Check out the [JavaScript SDK Quickstarts](https://www.twilio.com/docs/voice/sdks/javascript/get-started) to get started with browser-based calling. 

## About

Learn how to use [Twilio's JavaScript SDK](https://www.twilio.com/docs/voice/sdks/javascript) to make browser-to-phone and browser-to-browser calls with ease. The unsatisfied customers of the Birchwood Bicycle Polo Co. need your help!

## Set up

### Requirements

- [PHP >= 7.2.5](https://www.php.net/) and [composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [SQLite](https://www.sqlite.org/index.html)
- A Twilio account - [sign up](https://www.twilio.com/try-twilio)

### Twilio Account Settings

This application should give you a ready-made starting point for writing your own application.
Before we begin, we need to collect all the config values we need to run the application:

| Config&nbsp;Value | Description                                                                                                                                                  |
| :---------------- | :----------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Account&nbsp;Sid  | Your primary Twilio account identifier - find this [in the Console](https://www.twilio.com/console).                                                         |
| Phone&nbsp;number | A Twilio phone number in [E.164 format](https://en.wikipedia.org/wiki/E.164) - you can [get one here](https://www.twilio.com/console/phone-numbers/incoming) |
| App&nbsp;Sid | The TwiML application with a voice URL configured to access your server running this app - create one [in the console here](https://www.twilio.com/console/voice/twiml/apps). Also, you will need to configure the Voice "REQUEST URL" on the TwiML app once you've got your server up and running. |
| API Key / API Secret | Your REST API Key information needed to create an [Access Token](https://www.twilio.com/docs/iam/access-tokens) - create [one here](https://www.twilio.com/console/project/api-keys). |

### Create a TwiML App

This project is configured to use a **TwiML App**, which allows us to easily set the voice URLs for all Twilio phone numbers we purchase in this app.

Create a new TwiML app at https://www.twilio.com/console/voice/twiml/apps and use its `Sid` as the `TWILIO_APPLICATION_SID` environment variable wherever you run this app.

Once you have created your TwiML app, configure your Twilio phone number to use it ([instructions here](https://www.twilio.com/help/faq/twilio-client/how-do-i-create-a-twiml-app)).

If you don't have a Twilio phone number yet, you can purchase a new number in your [Twilio Account Dashboard](https://www.twilio.com/user/account/phone-numbers/incoming).

### Local development

After the above requirements have been met:

1. Clone this repository and `cd` into it

    ```bash
    git clone git@github.com:TwilioDevEd/browser-calls-laravel.git
    cd browser-calls-laravel
    ```

1. Install PHP dependencies

    ```bash
    make install
    ```

1. Set your environment variables

    ```bash
    cp .env.example .env
    ```

    See [Twilio Account Settings](#twilio-account-settings) to locate the necessary environment variables.

1. Install Node dependencies
    ```bash
    npm install 
    ```

1. Build the frontend assets
    ```bash
    npm run dev
    ```

1. Run the application

    ```bash
    php artisan serve
    ```

1. Run the application

    ```bash
    make serve
    ```

1. Expose the application to the wider Internet using [ngrok](https://ngrok.com/)

   ```bash
   $ ngrok http 8000
   ```
   Once you have started ngrok, update your TwiML app's voice URL setting to use your ngrok hostname, so it will look something like this:

   ```
   https://<your-ngrok-subdomain>.ngrok.io/support/call
   ```

1. To create a support ticket go to the home page.
   On this page you could fill some fields and create a ticket or you can call to support.

   ```
   https://<your-ngrok-subdomain>.ngrok.io
   ```

   __Note:__ Make sure you use the `https` version of your ngrok URL as some
   browsers won't allow access to the microphone unless you are using a secure
   SSL connection.

1. To respond to support tickets go to the `dashboard` page (you should open two windows or tabs).
   On this page you could call customers and answers phone calls.

   ```
   https://<your-ngrok-subdomain>.ngrok.io/dashboard
   ```

    That's it!

### Docker

If you have [Docker](https://www.docker.com/) already installed on your machine, you can use our `docker-compose.yml` to setup your project.

1. Make sure you have the project cloned.
2. Setup the `.env` file as outlined in the [Local Development](#local-development) steps.
3. Run `docker-compose up`.
4. Follow the steps in [Local Development](#local-development) on how to expose your port to Twilio using a tool like [ngrok](https://ngrok.com/) and configure the remaining parts of your application

### Unit and Integration Tests

You can run the Unit and Feature tests locally by typing:
```bash
php artisan test
```

## Resources

- The CodeExchange repository can be found [here](https://github.com/twilio-labs/code-exchange/).

## License

[MIT](http://www.opensource.org/licenses/mit-license.html)

## Disclaimer

No warranty expressed or implied. Software is as is.

[twilio]: https://www.twilio.com
