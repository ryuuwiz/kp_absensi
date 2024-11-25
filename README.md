<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Sistem Absensi Berbasis Web

## Setup
### Development

> Copy .env.example to a new file .env 
#### Install all dependencies.
```shell
composer install
npm install
```
#### Generate Encryption Key
```shell
php artisan key:generate
```
#### Link Storage
```shell
php artisan storage:link
```
#### Migration
```shell
php artisan migrate --seed
```
#### Run
```shell
php artisan serve
npm run dev
```

### Production

#### Configure Env
```dotenv
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain/
```
#### Optimize for production
```shell
npm run build
php artisan optimize
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
