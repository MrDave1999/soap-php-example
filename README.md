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

En Linux:
```
docker run --rm -it -v $PWD:/app composer install
```
En Windows:
```
docker run --rm -it -v %cd%:/app composer install
```

**4.** Copie el contenido de `.env.example` en `.env`:

En Linux:
```
cp .env.example .env
```
En Windows:
```
xcopy .env.example .env
```

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
docker-compose exec app php soapclient.php legumbres
```
