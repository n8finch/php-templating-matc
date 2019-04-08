# A Twig Templates for a REST API

This is a templating "proof of concept" project for the Advanced PHP class at Madison Area Technical College.

The main objective is to learn some templating principles and see how partial templates can be managed in a larger project, and how templates can work with data.

This project uses the [Twig templating engine](https://twig.symfony.com/).

### To get started with this project

1. Clone down this repo, however you like.
2. Make sure that this project is in the `public`, or `public_html` directory of your web server.
3. Make sure you have composer installed.
4. Run `composer install`.
5. Make sure you change the database credentials for this to suite your local environment in `controllers/StudentManager.php` (yes, I know, I know, this is not the best place for the db creds, I know...don't ever do this in production... don't!!! 🤓)
6. Make sure your db has as `students` table in it, with four columns:
    - `id` (Primary Key)
    - `name` (varchar 250)
    - `email` (varchar 250)
    - `created` (timestamp CURRENT_TIMESTAMP)

