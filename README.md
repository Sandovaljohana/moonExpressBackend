# Desafío Hackatón: Marketplace

## Descripción

Este proyecto ha sido creado con el propósito de implementar una API, para un exclusivo marketplace de suministros lunares, En este repositorio encontrará la construcción del backend del marketplace, una API que está diseñada con Laravel, para proporcionar una interfaz entre el cliente y el servidor, permitiendo la comunicación y el intercambio de datos. Temporalmente se encuentra en proceso de creación, con rellenado de las bases de datos con factorías (datos falsos) y a futuro próximo insertar imáges a través de cloudinary y de ser desplegada a través de railway.app

## Tecnologías

- PHP >= 8.2
- Composer
- Laravel >= 10.x

## Instalación

Sigue estos pasos para desplegar el proyecto:

1. **Clonar el repositorio**


git clone https://github.com/Sandovaljohana/moonExpressBackend


2. **Instalar dependencias**

Navega hasta el directorio del proyecto y ejecuta el siguiente comando:

``` 
composer install 
```

3. **Configurar el entorno**

Copia el archivo `.env.example` a `.env` y modifica las variables de entorno según tus necesidades.


4. **Generar la clave de la aplicación**

```
php artisan key:generate
```

5. **Ejecutar las migraciones y los seeders**

```
php artisan migrate --seed
```

6. **Iniciar el servidor**

```
php artisan serve
```

Ahora deberías poder acceder a la aplicación en `http://localhost:8000`.

## Endpoints de la API

Puedes encontrar la documentación de la API en `http://localhost:8000/api/...`.

-products
-users
-services
-providers

## Licencia

Este proyecto está licenciado bajo la licencia MIT. Consulta el archivo LICENSE para obtener más detalles.

## Autoras

[Marta Parra](https://github.com/Macata47) 🎸
<br>
[Johana Sandoval](https://github.com/Sandovaljohana)💛

