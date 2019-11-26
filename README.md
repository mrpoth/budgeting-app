# A simple Laravel budgeting app

This budgeting app is incredibly simple and was mostly made for a few reasons:
1. To practice Laravel and learn best practices.
2. To tinker with deploying an app.
3. To have a simple app to remember my expenses!

## Features

Not a whole lot to talk about here. You can enter incomes and expenses and choose between various levels of frequency:

1. One-off
2. Daily
3. Weekly
4. Monthly
5. Annually

There are 3 separate tables:

1. One-offs.
2. List of recurring items.
3. Totals

## Tech used:

Mainly Laravel due to the reasons stated above. Front-end with Bootstrap just to save time.

## How to use

1. Clone.
2. Run the following:
``composer install`` ``npm install``
to install dependencies. Alternatively, you can skip ``npm install`` and use ``yarn`` instead
3. Copy the *.env-example* file and rename to *.env*
4. Create a database and populate the *.env* file with your local db config details.
5. Run ``php artisan key:generate``
6. Run ``php artisan migrate``

You should now be up and running.
