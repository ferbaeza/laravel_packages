# Caso de Uso: Login de Usuario

Este módulo implementa el caso de uso de autenticación de usuarios siguiendo los principios de Clean Architecture.

## Estructura

```
src/Usuarios/
├── Application/
│   ├── LoginCommand.php           # DTO/Command con datos de entrada
│   ├── LoginCommandHandler.php    # Application Service (Caso de Uso)
│   └── LoginResult.php           # DTO de resultado
├── Domain/
│   ├── Entity/
│   │   └── Usuario.php           # Entidad de dominio
│   ├── Interfaces/
│   │   └── UsuarioRepositoryInterface.php  # Contrato del repositorio
│   ├── Services/
│   │   └── LoginService.php      # Servicio de dominio con lógica de negocio
│   └── Exception/
│       ├── InvalidCredentialsException.php
│       └── UserNotFoundException.php
└── Infrastructure/
    ├── Datasource/
    │   └── EloquentUsuarioRepository.php  # Implementación del repositorio
    ├── Http/
    │   ├── LoginController.php           # Controlador HTTP
    │   └── Requests/
    │       └── LoginRequest.php          # Request de validación
    └── Bindings/
        └── UsuariosServiceProvider.php   # Inyección de dependencias
```

## Flujo del Caso de Uso

1. **HTTP Request** → `LoginController`
2. **Controller** → Crea `LoginCommand` y llama a `LoginCommandHandler`
3. **CommandHandler** → Llama al `LoginService` (dominio)
4. **LoginService** → Usa `UsuarioRepositoryInterface` para buscar el usuario
5. **Repository** → Accede a la base de datos a través de Eloquent
6. **Validación** → Se verifica email y contraseña en el dominio
7. **Respuesta** → Se devuelve `LoginResult` con el resultado

## Uso desde el Controller

```php
// Ejemplo de cómo usar el caso de uso
$command = new LoginCommand('user@example.com', 'password123');
$result = $this->loginCommandHandler->handle($command);

if ($result->isSuccess()) {
    $usuario = $result->getUsuario();
    // Login exitoso
} else {
    $error = $result->getErrorMessage();
    // Manejar error
}
```

## Configuración

1. Registrar el ServiceProvider en `config/app.php`:

```php
'providers' => [
    // ...
    Devpack\src\Usuarios\Infrastructure\Bindings\UsuariosServiceProvider::class,
],
```

2. Agregar la ruta en `routes/web.php` o `routes/api.php`:

```php
use Devpack\src\Usuarios\Infrastructure\Http\LoginController;

Route::post('/login', [LoginController::class, 'login']);
```

## API Response

### Éxito
```json
{
    "success": true,
    "message": "Login exitoso",
    "data": {
        "usuario": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "isEmailVerified": true
        }
    }
}
```

### Error
```json
{
    "success": false,
    "message": "Las credenciales proporcionadas son inválidas",
    "errors": {
        "credentials": ["Las credenciales proporcionadas son inválidas"]
    }
}
```

## Características

- ✅ Separación clara de responsabilidades
- ✅ Inyección de dependencias
- ✅ Validación de entrada
- ✅ Manejo de errores específicos
- ✅ Arquitectura hexagonal/Clean Architecture
- ✅ Testeable (cada capa se puede testear independientemente)
- ✅ SOLID principles
- ✅ Domain-driven design (DDD)

## Extensibilidad

El diseño permite fácilmente:
- Agregar nuevos métodos de autenticación
- Cambiar el sistema de persistencia
- Agregar logging, métricas, etc.
- Implementar autenticación en 2 factores
- Agregar rate limiting