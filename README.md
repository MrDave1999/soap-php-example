# soap-php-example

This example web service, exposes a function `getProductsByCategory` which is responsible for getting products by category. 

## Install

**1.** Clone the repository:
```
git clone https://github.com/MrDave1999/soap-php-example.git
```
**2.** Change directory:
```
cd soap-php-example
```
**3.** Install the project dependencies:
```
docker run --rm -it -v $PWD:/app composer install
```
**4.** Copy the content from `.env.example` to `.env`:
```
cp .env.example .env
```
**Note:** If on windows doesn't work the `cp` command, use `xcopy` instead.

**5.** Build the image and start the services 
```
docker-compose up --build -d
```
**6.** Access the application this way:
```
http://localhost:8080/
```

## Test

You can user the **test client** to check that everything is working:
```
docker run --rm \
    --network storeapp \
    -w /app \
    -v $PWD:/app \
    php:8.0-apache \
    php soapclient.php legumbres
```
