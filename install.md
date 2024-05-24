

# PROCEDIMIENTO DE INSTALACIÓN DEL DIRECTORIO EXPORTADOR - DESARROLLO

## Paso 1
###### clonar el repositorio 
$ git clone https://github.com/Juan-Valencia98/directorio_expor_oficial.git

## Paso 2 
###### Ingresar al archivo 
$ cd directorio_expor_oficial

## PASO 3
###### Instalar dependecia 
$ composer install

## PASO 4
$ npm install

## Paso 5
###### Cambiar el nombre del archivo .env.example por .env
###### y configurar Base de Datos y gmail

###### Base de datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=senavex_oficial
DB_USERNAME=root
DB_PASSWORD=

###### Gmail
MAIL_MAILER=smtp
MAIL_HOST=mail.senavex.gob.bo
MAIL_PORT=25
MAIL_USERNAME=pruebas.upea
MAIL_PASSWORD=in6cHe3k35V@rW3PefX1
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=pruebas.upea@senavex.gob.bo
MAIL_FROM_NAME="${APP_NAME}"

## Paso 6
###### API PARA EL LOGIN 
Controllers->Auth->LoginController.php 
linea 56 
$api_rest = 'http://api.taypi.senavex.gob.bo/api/pruebas/upea/v1/signin';

## Paso 7
###### Para crear las tablas en la bd
php artisan migrate:fresh
### Para añadir tablas 
php artisan migrate

## Paso 8
###### Para subir datos de prueba
php artisan db:seed

## Paso 9
###### Storage publico
agregar winrar images 
storage->app->public->aqui....
php artisan storage:link

## Paso 10
###### Levantar servidor
$ php artisan serve


## Limpiar cache produccion
npm run dev
php artisan cache:clear
php artisan config:clear
php artisan config:cache