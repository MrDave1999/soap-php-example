# soap-php-example

Este servicio web de ejemplo, expone una función `getProductsByCategory` en la cual se encarga de obtener productos por categoría.

## Instalación

**1.** Clone el repositorio:
```
git clone https://github.com/MrDave1999/soap-php-example.git
```
**2.** Cambie de directorio:
```
cd soap-php-example
```
**3.** Instale las dependencias del proyecto:
```
docker run --rm -it -v $PWD:/app composer install
```
**4.** Copie el contenido de `.env.example` en `.env`:
```
cp .env.example .env
```
**Nota:** Si en Windows no funciona el comando `cp`, use `xcopy`.

**5.** Construya la imagen e inicie los servicios:
```
docker-compose up --build -d
```
**6.** Acceda a la aplicación de esta forma:
```
http://localhost:8080/
```

## Prueba

Puedes usar el **cliente de prueba** para comprobar si todo está funcionando:
```
docker exec app php soapclient.php legumbres
```
