## Laravel Town halls (Current: Laravel 8.*)

Laravel Town halls is a multilingual admin panel based on the Laravel 8.

## Setup

Clone the repo and follow below steps.
1. Run `composer install`
2. Copy `.env.example` to `.env`
3. Set valid database credentials of env variables `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`
4. Run `php artisan key:generate` to generate application key
5. Run `php artisan migrate`
7. Run `php artisan db:seed` to seed your database
8. Run `npm i` (Recommended node version `>= V13.14.0`)
9. Run `npm run dev` or `npm run prod` as per your environment

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## ScreenShots

## List Town halls

![List Town halls](https://user-images.githubusercontent.com/53783920/180729710-95f36cb7-e2fe-44a3-bef3-e530c5c5e6b5.png)

## List Users

![List Users](https://user-images.githubusercontent.com/53783920/180729760-3afe2884-0d70-464e-bf7f-97fb145e23e9.png)

## List Roles

![List Roles](https://user-images.githubusercontent.com/53783920/180729850-5c903b21-c161-47b8-995d-9deb94957e03.png)
