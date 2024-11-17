# WEB2-TRABAJOESPECIAL-PARTE3

## Integrantes

### *Luca Sebastian Gorosito - email: @gmail.com*

### *>Tomas Cruz - tc22142@gmail.com*

## Tema del trabajo

Marcas y botines

## Descripcion

En esta entrega creamos nuestra API RESTful de Marcas y Botines donde cualquier consumidor va a poder acceder a nuestros catalogos de marcas y botines, mediante el uso de los siguientes metodos **GET**,**POST**,**PUT** que ya fueron testeados dentro de postman y thunder cient por nosotros.

## EndPoints

Aclaracion : los ejemplos de los endpoints pueden que no sean exactamentes iguales a la base de datos original, ya que al hacer pruebas la base se fue modificando en nuestro ordenador por lo que el consumidor cuando haga las pruebas puede que tengas diferente orden ya que nosotros eliminamos,modifificamos y agregamos botines.

### Endpoints de la tabla botines

#### Obtener todos los botines (GET)

-Obtiene un catalogo de botines.

-Endpoint: http://localhost/web2/TPE-Parte-3-Web2/api/botines - Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/botines.

-Ejemplo de respuesta del endpoint:

```json
[
  {
    "id_botin": 1,
    "modelo": "tempo",
    "color": "negro",
    "talle": 42,
    "gama": "alta",
    "precio": 120000,
    "id_marca": 1
  },
  {
    "id_botin": 19,
    "modelo": "Phantom GT",
    "color": "negro",
    "talle": 42,
    "gama": "alta",
    "precio": 250000,
    "id_marca": 1
  }
]
```
### En este apartado estan los Opcionales del trabajo

-Si el consumidor lo desea puede hacer combinaciones de los opcionales.
Gorooo!!!!!!
-( 1er Opcional ) : Si el consumidor lo desea puede hacer un SORT con (ID,Nombre,Genero,Editorial,Autor) y ORDER con (ASC,DESC) pasandolos por URL.
    Aclaracion: por default sort = ID y order ASC. tal cual como se veria en la tabla de la base de datos

-Ejemplo del Opcional 1: http://localhost/tudai/parte3/api/libros?sort=Nombre&order=DESC. 

-( 2do Opcional ) : Si el consumidor lo desea puede hacer un LIMIT con un valor entero y PAGE con un valor entero pasandolos por URL.
    Aclaracion: por default LIMIT = 2 y PAGE = 1.

-Ejemplo del Opcional 2: http://localhost/tudai/parte3/api/libros?limit=3&page=2. 

-( 3er Opcional ) : Si el consumidor lo desea puede filtrar los botines pasando la columna a filtrar y el valor deseado, las columnas que se pueden filtrar son modelo, color, talle, gama, precio e id_marca.

-Ejemplo del Opcional 3:
http://localhost/tudai/parte3/api/libros?modelo=tempo&talle=42.


#### Obtener un botin (GET)

-Obtiene un botin a eleccion pasando una id por parametro

-Endpoint: http://localhost/web2/TPE-Parte-3-Web2/api/botines/ID - Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/botines/ID.

-Ejemplo: con id 1

```json
[
    {
    "modelo": "tempo",
    "color": "negro",
    "talle": 42,
    "gama": "alta",
    "precio": 120000,
    "id_marca": 1
    }
]
```

#### Crear un botin (POST)

-Crea un libro para insertarlo en la tabla

-Endpoint: http://localhost/web2/TPE-Parte-3-Web2/api/botines - Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/botines.

-Ejemplo: en el caso de la marca debera colocar una id valida que sea de alguna  ya existente

```json
[
    {
    "modelo": "Botin X",
    "color": "verde",
    "talle": 00,
    "gama": "alta",
    "precio": 000000,
    "id-marca": 0
    }
]
```


#### Editar un botin (PUT)

-Edita un botin de la tabla

-Endpoint: http://localhost/web2/TPE-Parte-3-Web2/api/botines/ID - Aclaracion: el endpoint anterior es en nuestro caso,en el caso del consumidor debera colocar la ubicacion de donde tendra guardado los archivos del trabajo http://localhost/Ubicacion/api/botines/ID.

-Ejemplo: el ID debe ser existente y en caso de la marca debe ser un ID existente tambien.

```json
[
    {
    "modelo": "Nuevo contenido",
    "color": "Nuevo contenido",
    "talle": "Nuevo contenido",
    "gama": "Nuevo contenido",
    "precio": "Nuevo contenido",
    "id-marca": "ID existente"
    }
]
```
