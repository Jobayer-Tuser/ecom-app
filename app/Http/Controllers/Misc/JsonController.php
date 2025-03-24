<?php

namespace App\Http\Controllers\Misc;

use Stringable;

readonly class JsonController implements Stringable
{
    public function __construct(private array $json){}

    public function value(string $key, mixed $default = null): mixed
    {
        return $this->json[$key] ?? $default;
    }

    public function __toString(): string
    {
        return json_encode($this->json);
    }
}

/*
    function json(mixed ...$args): JsonController
    {
        return new JsonController($args);
    }

    $json = json(
        name: 'Dilo surucu',
        job: 'Development',
        status: true
    );

    echo $json;
    {'name':'Dilo surucu','job':'Development','status':true}

    echo $json->value('name');
    echo $json->value('job');
*/
