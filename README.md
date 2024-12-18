# Requirements
- PHP v8.2^
- MySQL or SQLite (Development only)
- Composer
- Docker (Optional)
- NodeJS v22^
- System Requirements
	- 2 CPU
	- 4 GB RAM
	- 2 GB Storage
## PHP Extensions
- **intl**
- **pdo_mysql or pdo_sqlite**
- **zip**

# Tools
- Herd or Laragon
- DBngin (DB Server)
- VSCode

# Installation
- Clone repo
- Install dependencies (Download a lot of libraries)
```sh
composer install
npm install
npm run build
```
- Add Environment Variables
	- Copy .env.example to create a new .env (change only needed)
```sh
APP_ENV=local
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost:8000 // change this if needed

APP_LOCALE=id // indonesian language
APP_FALLBACK_LOCALE=id
APP_FAKER_LOCALE=id_ID

DB_CONNECTION=sqlite // if use SQLite
or
DB_CONNECTION=mysql // if use MySQL
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<DB_NAME>
DB_USERNAME=root
DB_PASSWORD=
```
- Generate Key
```sh
php artisan key:generate
```
- Migration
```sh
php artisan migrate
```
- Linking Storage Files (Needed for store images)
> Be careful if your project directory or host changed it need to linking storage again.
```sh
php artisan storage:link
```
- Seeding Data (Only needed & look at DatabaseSeeder.php)
```sh
php artisan db:seed
```

# Run the APP
```sh
php artisan serve
```

# Deployments
- Change .env
```sh
APP_ENV=production
APP_DEBUG=false
APP_URL=https://YOUR_DOMAIN:PORT
```
- Caching app to improve performance
```sh
php artisan optimize
php artisan icons:cache
php artisan filament:cache-component
npm run build -- --prod
```
- Add permission to path
```bash
chown -R www-data:www-data APP_PATH
chmod -R 777 bootstrap storage
```
## Web Server
- Nginx
```conf
server {

listen 80;

listen [::]:80;

server_name YOUR_DOMAIN;

root YOUR_APP_PATH;

add_header X-Frame-Options "SAMEORIGIN";

add_header X-Content-Type-Options "nosniff";

index index.php;

charset utf-8;

location / {

try_files $uri $uri/ /index.php?$query_string;

}

location = /favicon.ico { access_log off; log_not_found off; }

location = /robots.txt { access_log off; log_not_found off; }

error_page 404 /index.php;

location ~ ^/index\.php(/|$) {

fastcgi_pass unix:/var/run/php/php8.3-fpm.sock; // don't forget this one!

fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;

include fastcgi_params;

fastcgi_hide_header X-Powered-By;

}

location ~ /\.(?!well-known).* {

deny all;

}

}
