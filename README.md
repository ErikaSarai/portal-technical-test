# Portal Technical Test

<p align="center"><a href="#" target="_blank"><img src="#" ></a></p>
✨ Prueba Técnica, con un módulo auth (Inicio de Sesión y Register), y un cron job de comando artesanal programado para ejecutarse una una vez al día a las 15:00 (Zona Horaria: America/Asuncion).

## 🚀 Instalación
1. Clonar el Proyecto.
3. Crear el archivo `.env` a base del archivo `.env.example`, (debe poner sus credenciales para conectarse a su administrador de base de datos local).
4. Ejecutar el comando `composer install`, y luego ejecutar `npm install` para instalar los paquetes necesarios.
5. Ejecutar el comando `php artisan migrate` para migrar todas las migraciones con sus tablas.
6. Ejecuta el comando `php artisan key:generate`.
7. Para correr el entorno local, ejecute: `php artisan serve`.

## 🛠 Pruebas en Local (Scheduling Artisan Commands)
El job está programado para ejecutarse diariamente a las 15:00 (Zona Horaria: America/Asuncion).
Para hacer pruebas en local, puede cambiar la hora en el que quiere se ejecute en el `App\Console\Kernel.php`. 

El cron ejecuta un comando el cual se encarga de mandar un correo a todos los correos registrados, y contiene los usuarios registrados en las últimas 24 horas. 

Sin embargo, se agrego en el home, un botón para ejecutar esta misma funcionalidad de manera manual cuando se desee.

La zona horaria esta configurada para America/Asuncion.

El comando para ejecutar los jobs desde local es: php artisan schedule:run. Si se utilizara en el servidor necesita agregar un entrada cron:

1-. * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1

Este Cron llamará al programador de tareas de Laravel cada minuto. Cuando el comando schedule:run es ejecutado, Laravel evaluará tus tareas programadas y ejecutará las tareas pendientes.


## ✨ Lenguajes de programación y framework
* PHP 8.1.2
* Laravel Versión  9.1.0
* MySQL
* JavaScript
* Jquery
* HTML5
* AJAX