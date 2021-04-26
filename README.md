# crm
CRM de clientes con Dashboard general y por cliente

# Instalación
Necesitas MySQL y PHP, preferiblemente en sus versiones de MySQL.
Aquí un tutorial usando XAMPP: https://parzibyte.me/blog/2017/12/11/configurar-instalar-php-7-apache-server-mysql-windows/


*Nota*: para las operaciones SQL puedes usar la consola o phpmyadmin

1. Copia todos estos archivos a tu carpeta pública, si estás en Windows con XAMPP, es en C:\xampp\htdocs\crm (si no existe, crea la carpeta)
2. Crea la base de datos en MySQL
3. Importa el archivo esquema.sql a la base de datos, ya sea copiando y pegando o importando
4. Configura las credenciales de tu base de datos en el archivo __funciones.php__ dentro de la función `obtenerBD`
5. Configura en ese mismo archivo la zona horaria, por defecto está para México
6. Visita tu proyecto en http://localhost/crm

Nota: si cambiaste el nombre de tu proyecto o tu sistema operativo es distinto, los pasos podrían cambiar

# Créditos
<div>Icons made by <a href="https://www.flaticon.com/authors/dimitry-miroliubov" title="Dimitry Miroliubov">Dimitry Miroliubov</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>

<div>Icons made by <a href="https://www.flaticon.com/authors/icongeek26" title="Icongeek26">Icongeek26</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>

<div>Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>

<div>Icons made by <a href="https://www.flaticon.com/authors/iconixar" title="iconixar">iconixar</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>

<div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>