# CRUD con CodeIgniter 4

Este proyecto es una aplicación web CRUD desarrollada con CodeIgniter 4 que incluye dos formas de interactuar con los productos:

- Una interfaz web para gestionar productos desde el navegador.
- Un web service REST para consumir los datos desde otras aplicaciones, Postman o clientes HTTP.

## Descripción general

La aplicación permite realizar operaciones básicas de creación, lectura, actualización y eliminación de productos. El proyecto está organizado para separar la lógica de la web y la API.

## Tecnologías utilizadas

- PHP 8.2
- CodeIgniter 4
- MySQL
- Docker Compose
- Apache

## Estructura del proyecto

Archivos principales:

- [codeigniter/app/Controllers/Productos.php](codeigniter/app/Controllers/Productos.php): controlador web del CRUD.
- [codeigniter/app/Controllers/ApiProductos.php](codeigniter/app/Controllers/ApiProductos.php): controlador del web service REST.
- [codeigniter/app/Models/ProductoModel.php](codeigniter/app/Models/ProductoModel.php): modelo para gestionar los productos en la base de datos.
- [codeigniter/app/Views/productos](codeigniter/app/Views/productos): vistas para listar, crear y editar productos.
- [codeigniter/app/Config/Routes.php](codeigniter/app/Config/Routes.php): definición de rutas web y API.

## Requisitos

Para ejecutar este proyecto necesitas:

- Docker y Docker Compose instalados.
- Acceso a los puertos 8080 y 8000.

## Ejecución con Docker Compose

Desde la raíz del proyecto, ejecuta:

```bash
docker compose up --build
```

Una vez levantados los contenedores, puedes acceder a:

- Aplicación web: http://localhost:8080/productos
- phpMyAdmin: http://localhost:8000

## Base de datos

La configuración por defecto apunta a una base de datos MySQL llamada cruddb con las siguientes credenciales:

- Host: db
- Usuario: root
- Contraseña: secret
- Puerto: 3306

## Funcionalidad de la web CRUD

La parte web permite realizar estas acciones:

- Listar productos
- Crear un nuevo producto
- Editar un producto existente
- Eliminar un producto

### Rutas web

- GET /productos → muestra la lista de productos
- GET /productos/crear → muestra el formulario para crear un producto
- POST /productos/guardar → guarda un producto nuevo
- GET /productos/editar/{id} → muestra el formulario para editar un producto
- POST /productos/actualizar/{id} → actualiza un producto
- GET /productos/eliminar/{id} → elimina un producto

## Web service REST

La API REST permite consumir los productos desde un cliente HTTP o desde herramientas como Postman.

### URL base

```text
http://localhost:8080/api/productos
```

### Endpoints

#### 1. Listar productos

- Método: GET
- Ruta: /api/productos

Ejemplo:

```bash
curl http://localhost:8080/api/productos
```

#### 2. Ver un producto por ID

- Método: GET
- Ruta: /api/productos/{id}

Ejemplo:

```bash
curl http://localhost:8080/api/productos/1
```

#### 3. Crear un producto

- Método: POST
- Ruta: /api/productos
- Header: Content-Type: application/json

Ejemplo:

```bash
curl -X POST http://localhost:8080/api/productos \
  -H "Content-Type: application/json" \
  -d '{"nombre":"Mesa","precio":150000}'
```

También puedes enviar un arreglo de productos:

```bash
curl -X POST http://localhost:8080/api/productos \
  -H "Content-Type: application/json" \
  -d '[{"nombre":"Silla","precio":50000},{"nombre":"Lámpara","precio":80000}]'
```

#### 4. Actualizar un producto

- Método: PUT
- Ruta: /api/productos/{id}
- Header: Content-Type: application/json

Ejemplo:

```bash
curl -X PUT http://localhost:8080/api/productos/1 \
  -H "Content-Type: application/json" \
  -d '{"nombre":"Mesa actualizada","precio":180000}'
```

#### 5. Eliminar un producto

- Método: DELETE
- Ruta: /api/productos/{id}

Ejemplo:

```bash
curl -X DELETE http://localhost:8080/api/productos/1
```

## Formato de datos

Los productos esperan estos campos:

- nombre: string
- precio: number

Ejemplo de cuerpo JSON:

```json
{
  "nombre": "Producto de ejemplo",
  "precio": 25000
}
```

## Respuestas esperadas

- GET: devuelve un JSON con los datos de uno o varios productos.
- POST y PUT: devuelven un mensaje de éxito.
- DELETE: devuelve un mensaje de confirmación.

## Uso en Postman

1. Abre Postman.
2. Crea una nueva solicitud.
3. Selecciona el método HTTP correspondiente.
4. Ingresa la URL base, por ejemplo: http://localhost:8080/api/productos.
5. Si usas POST o PUT, agrega el header Content-Type: application/json y el cuerpo JSON.

## Notas adicionales

Este proyecto demuestra cómo combinar una interfaz CRUD tradicional con un servicio REST en CodeIgniter 4, permitiendo tanto la gestión visual desde navegador como la integración con otras aplicaciones.
