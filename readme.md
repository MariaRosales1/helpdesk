# HELP DESK APP

## Ejecutar la aplicación de manera local

### Requisitos

* PHP 7.2+
* Composer
* MySQL 5.2+

### Instrucciones

Para poner el proyecto en ejecución se deben seguir una serie de pasos que se detallan a continuación, a modo de ejemplo todos los snippets de comandos se ejecutan en el directorio `/tmp` del OS.

Clonar el repositorio:
```console
user@host:/tmp/$ git clone https://github.com/MariaRosales1/helpdesk.git
```

Entrar en el directorio de la app ejecutar:
```console 
user@host:/tmp$ cd helpdesk/
user@host:/tmp/helpdesk$ composer update && composer install && composer dump-autoload  && npm install &&  composer require pusher/pusher-php-server
```
Cear archivo de variables de entorno:
```console
user@host:/tmp/helpdesk$ cp .env.example .env
```
Actualizar los siguientes variables:
```console
DB_CONNECTION=mysql
DB_HOST=<ip-address>
DB_PORT=3306
DB_DATABASE=<database>
DB_USERNAME=<user>
DB_PASSWORD=<password>

BROADCAST_DRIVER=pusher

PUSHER_APP_ID=anyID
PUSHER_APP_KEY=anyKey
PUSHER_APP_SECRET=anySecret
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

Generar id de la aplicación:
```console
user@host:/tmp/helpdesk$ php artisan key:generate
```

Ejecutar la aplicación:
```console
user@host:/tmp/helpdesk$ php artisan migrate && \
        php artisan db:seed && \
        php artisan serve --host "<ip>"
```
