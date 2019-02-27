
##Yêu cầu hệ thống 
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension
- npm 6.5
- node >=9

1. Extract the archive and put it in the folder you want

2. Prepare your .env file there with database connection and EMAIL CONECTION settings

3. Run "composer install" command

4. Run "php artisan migrate --seed" command. Notice: seed is important, because it will create the first admin user for you.

5. Run "php artisan key:generate" command.

6. Run "php artisan passport:install" command.

7. Run "npm install" command.

8. Run "npm run dev" command.

9. Run application: "php artisan serve"

Default application url: http://127.0.0.1:8000
Admin account

Email: admin@admin.com
Password: password


