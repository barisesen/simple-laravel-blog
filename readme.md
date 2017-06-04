# Simple Laravel Blog
Laravel is an example of a simple blog when I try to learn.

Demo link [http://learn-laravel-blog.herokuapp.com/](http://learn-laravel-blog.herokuapp.com/)
Admin Account:
email: test@test.com
password: 123456

User Account:
email: uye@test.com
password: 123456 

## Installation
 - Install laravel environment
 - clone this repo
 - cp .env.exampple .env
 - update .env file
 - php artisan migrate
 - php artisan db:seed
 - php artisan serve
 - open localhost:8000
 
## Features
  - Add new post, update, destroy
  - Check user authorizations
  - Check user is admin?
  - Add new comment
  - Simple form validation

## Todo list
  - Add photo upload Aws S3
  - Api
  - vs..

## Useful commands
  - php artisan serve
  - php artisan migrate
  - php artisan make:controller CommentController
  - php artisan make:model Comment
  - php artisan make:migration create_comments_table



## Contributors
- [barisesen](https://github.com/barisesen) Barış Esen - creator, maintainer
