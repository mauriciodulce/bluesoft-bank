# Bluesoft Bank - Laravel 11

## Descripción

Bluesoft Bank es una aplicación web desarrollada en Laravel 11 para gestionar cuentas bancarias. Permite a los usuarios consultar saldos, ver movimientos recientes, generar extractos mensuales, y obtener reportes en tiempo real sobre transacciones y clientes.

## Requerimientos

- PHP 8.1 o superior
- Laravel 11
- Composer
- Base de datos (MySQL, PostgreSQL, SQLite, etc.)

## Instalación

Sigue estos pasos para instalar y configurar la aplicación en tu entorno local:

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/mauriciodulce/bluesoft-bank.git
   cd bluesoft-bank
   ```

2. **Instalar dependencias**

   ```bash
   composer install
   ```

3. **Configurar el archivo de entorno**

   Copia el archivo `.env.example` a `.env` y edítalo con las configuraciones adecuadas para tu entorno.

   ```bash
   cp .env.example .env
   ```

   Asegúrate de configurar los parámetros de la base de datos y otros detalles relevantes.

4. **Generar la clave de la aplicación**

   ```bash
   php artisan key:generate
   ```

5. **Migrar la base de datos**

   Ejecuta las migraciones para crear las tablas necesarias en la base de datos.

   ```bash
   php artisan migrate
   ```

6. **Sembrar datos iniciales**

   Si tienes datos iniciales, puedes sembrarlos con el siguiente comando:

   ```bash
   php artisan db:seed
   ```

7. **Iniciar el servidor**

   Finalmente, inicia el servidor de desarrollo de Laravel:

   ```bash
   php artisan serve
   ```

   La aplicación estará disponible en `http://localhost:8000`.

## Uso

### Consultar el saldo de la cuenta

Accede a `cuentas/consultar` para consultar el saldo de una cuenta específica.

### Consultar los movimientos más recientes

Accede a `/cuentas/movimientos` para ver los movimientos más recientes de una cuenta específica.



## Reglas de Negocio

- Una cuenta no puede tener un saldo negativo.
- El saldo de la cuenta siempre debe ser consistente frente a dos operaciones concurrentes (consignación, retiro).


Bluesoft Bank debe soportar los siguientes requerimientos para sus ahorradores:

- Consultar el saldo de la cuenta
- Consultar los movimientos más recientes
- Generar extractos mensuales

## Reglas de Negocio

- Una cuenta no puede tener un saldo negativo.
- El saldo de la cuenta siempre debe ser consistente frente a dos operaciones concurrentes (consignación, retiro).

## Reportes en Tiempo Real

- Listado de clientes con el número de transacciones para un mes específico, organizado descendentemente (primero el cliente con mayor número de transacciones en el mes).
- Clientes que retiran dinero fuera de la ciudad de origen de la cuenta, con el valor total de los retiros realizados superior a $1.000.000.

## Diagrama de Clases

A continuación se presenta el diagrama de clases que modela el problema:

```plaintext
+-----------------+
|     Cliente     |
+-----------------+
| - id: int       |
| - nombre: string|
| - ciudad: string|
+-----------------+
        |
        | 1
        |
        | *
+-----------------+
|     Cuenta      |
+-----------------+
| - id: int       |
| - saldo: float  |
| - tipo: string  |
| - ciudad: string|
+-----------------+
| +consultarSaldo()       |
| +consultarMovimientos() |
| +generarExtractos()     |
+-----------------+
        |
        | 1
        |
        | *
+-----------------+
|   Transaccion   |
+-----------------+
| - id: int       |
| - tipo: string  |
| - valor: float  |
| - fecha: Date   |
+-----------------+
```



