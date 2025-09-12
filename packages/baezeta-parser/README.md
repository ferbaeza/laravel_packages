# Baezeta Parser

Librería de parsing personalizada para Laravel.

## Instalación

```bash
composer require baezeta/parser
```

## Uso

### Usando la clase directamente

```php
use Baezeta\Parser\Parser;

$parser = new Parser();
$result = $parser->parse('contenido a parsear');
```

### Usando la Facade

```php
use Baezeta\Parser\Facades\Parser;

$result = Parser::parse('contenido a parsear');
```

### Usando inyección de dependencias

```php
use Baezeta\Parser\Parser;

class MiControlador extends Controller
{
    public function __construct(private Parser $parser)
    {
        //
    }

    public function parsear()
    {
        $result = $this->parser->parse('contenido');
        return response()->json($result);
    }
}
```

## Métodos disponibles

- `parse(string $content)`: Parsea contenido genérico
- `parseJson(string $json)`: Parsea contenido JSON
- `parseXml(string $xml)`: Parsea contenido XML

## Desarrollo

Esta librería está en desarrollo activo. Para contribuir:

1. Clona el repositorio
2. Ejecuta `composer install`
3. Ejecuta las pruebas con `composer test`
