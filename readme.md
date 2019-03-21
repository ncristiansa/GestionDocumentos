## Gestor de Documentos.
Cuenta de usuario de la Base de Datos:
#### Usuario: admin
#### Clave: admin
Una vez clonado el proyecto importante realizar las siguientes comandas en la terminal:
#### composer install
A continuación generar el archivo .env, para ello vamos a copiar el contenido de .env.example sobre nuestro nuevo .env:
#### sudo cp .env.example .env
Una vez generado el archivo vamos a modificar los siguientes campos:
#### DB_CONNECTION=mysql
#### DB_HOST=localhost
#### DB_PORT=3306
#### DB_DATABASE=gestordoc
#### DB_USERNAME=admin
#### DB_PASSWORD=admin
Una vez guardado estos datos, tenemos que crear un base de datos en nuestro [localhost/phpmyadmin](http://localhost/phpmyadmin/).
A continuación abrimos una terminal y ejecutamos la siguiente comanda:
#### php artisan migrate

Nuevas comandas a realizar:
- Para generar el seeder: sudo php artisan migrate:refres --seeder (recomendable borrar las tablas de la DB en phpmyadmin y deshabilitar la revisión de las claves foráneas).
- Para poder visualizar y descargar los PDF: sudo php artisan storage:link

Integrantes:
- [Miguel](https://github.com/MiguelArteaga).
- [Khalid](https://github.com/KhalidAlouan).
- [Cristian](https://github.com/ncristiansa).