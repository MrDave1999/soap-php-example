# soap-php-example

Este servicio web de ejemplo, expone una función `getProductsByCategory` en la cual se encarga de obtener productos por categoría.

## Instalación

Para probar esta implementación se necesita tener:

- Apache HTTP
- PHP 8.0
  - Las extensiones `php8.0-mysqli` y `php8.0-xml` deben estar habilitadas.
- Biblioteca NuSOAP
- MySQL Server 8.0

Para importar `storedb.sql` necesita primero crear la base de datos:
```sql
CREATE DATABASE storedb;
```
Luego ejecute este comando (reemplace en `username` por el nombre de usuario que use, por ejemplo: `root`):
```bash
mysql -u username -p storedb < storedb.sql 
```

**Nota:** No olvide modificar el archivo `config.php` de acuerdo a sus necesidades.

Para ejecutar el cliente, simplemente especifique una categoría como argumento en el *script*:
```bash
php soapclient.php legumbres
```