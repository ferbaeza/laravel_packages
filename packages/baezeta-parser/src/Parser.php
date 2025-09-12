<?php

namespace Baezeta\Parser;

class Parser
{
    public function parse(string $content): array
    {
        // Aquí implementarás tu lógica de parsing
        return [
            'original' => $content,
            'parsed' => 'Contenido parseado',
            'timestamp' => now()
        ];
    }

    public function parseJson(string $json): array
    {
        return json_decode($json, true) ?? [];
    }

    public function parseXml(string $xml): array
    {
        $data = simplexml_load_string($xml);
        return json_decode(json_encode($data), true) ?? [];
    }
}
