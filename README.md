AFTER DOWNLOADING THE CODE
-- npm install
-- composer install

php artisan serve // to run the server
npm run dev --- to enable hot restart

using bootstrap
composer require laravel/ui --dev
php artisan ui bootstrap --auth
npm install

to run vite: npm run dev

jwt authentication
https://jwt-auth.readthedocs.io/en/develop/
https://dev.to/wenlopes/laravel-and-jwt-authentication-with-custom-model-4m3n

github.com/gnongkynrih
restapi

localhost:8000 //default port is 8000
create database dbname
dbeaver
xampp php 8
composer

composer create-project laravel/laravel projectname

php artisan serve //to start the server

php artisan migrate

table name is always plural and starts with small letter
model name is singular and starts with capital letter

php artisan make:model Religion -m //create model and migration file
php artisan make:controller NameOfTheController

php artisan make:request CreateReligionRequest

php artisan make:resource
Assignment:
todo app
table-- tasks (id,taskname,is_completed)

the default pk is always id
and the default foreign key is tablename_id
eg. admission_users table pk is id

in the applicants table to link with admission users table the fk column will be admission_user_id

php artisan make:migration add_column_a
ddress_proof_to_table_applicants --table=applicants
