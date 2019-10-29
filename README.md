# Proyecto bitácora operaciones
Proyecto bitácora para el puesto de operaciones
## Getting Started

Proyecto creado con la finalidad de agilizar y facilitar el trabajo de los técnicos de operaciones.

### Requisitos

Necesario servidor Apache + MySQL

* Linux
```
sudo apt-get install apache2
```
* Windows (XAMPP)
```
Descargar e instalar el programa:
https://www.apachefriends.org/download.html
```
### Instalación

Solo es necesario ejecutar el siguiente comando:

Creación de la Base de Datos e inserción de registros
```
Cargar fichero sentencia1.sql
```
Una vez descargado, iniciar Apache, MySQL y ejecutar index.php

* Linux
```
/etc/init.d/apache2 start
```
* Windows (panel de XAMPP)
```
Arrancar Apache
Arrancar MySQL
```
## Funcionamiento

La base de datos se puede adaptar según las necesidades. Permite su utilización en casi cualquier proyecto, tan solo siendo necesario modificar los datos según correspondan (nombre de los operadores, servicios BI, etc.).

### Página principal

Aquí es donde se añaden los registros de la bitácora y se guardan en la base de datos

![firefox_2019-10-29_11-18-39](https://user-images.githubusercontent.com/51420640/67758656-64594880-fa3e-11e9-8cf4-5bc1c0104ff4.png)

### Página _Informes_

Actualmente, no proporciona ninguna funcionalidad. En un futuro será implementada y será útil para realiza los informes, ordenando las alertas por fechas, operadores, etc.

### Página _Revisar_ _Bitácora_

Desde esta página, se pueden modificar y eliminar los registros añadidos previamente.

![firefox_2019-10-29_11-45-39](https://user-images.githubusercontent.com/51420640/67760666-ff9fed00-fa41-11e9-8035-c6cb5b1a2939.png)

### Página _Cambio Turno _

Permite añadir mensajes que sean útiles para el cambio de turno. Las opciones son las siguientes y cambiará el icono a la hora de representarlas en la página principal:
*  Advertencia
*  Mensaje
*  Error

![firefox_2019-10-29_11-04-39](https://user-images.githubusercontent.com/51420640/67759357-96b77580-fa3f-11e9-8ddd-30bdc16413f1.png)

![firefox_2019-10-29_11-18-39](https://user-images.githubusercontent.com/51420640/67759570-f6158580-fa3f-11e9-945b-7d2decfc2808.png)

También se pueden eliminar dichos mensajes desde esta misma página.

## Herramientas utilizadas

* [NetBeans](https://netbeans.org/) - IDE utilizado
* [XAMPP](https://www.apachefriends.org/es/index.html) - Programa utilizado para simular el entorno
* [PHP 7.2.10](https://www.php.net/) - Versión de PHP utilizada
* [MySQL](https://www.mysql.com/) - Motor de BD utilizado


## Autor

* **Carlos Garcia** - *Programación, Front & BackEnd* - [c-garciao](https://github.com/c-garciao)

## Licencia

This project is licensed under the GNU License - see the [./LICENSE.md](LICENSE.md) file for details

## Agradecimientos

* A Félix, Alberto E y Alberto P, mis profesores de programación.
* A Mario y Alberto E, mis profesores de desarrollo web.
