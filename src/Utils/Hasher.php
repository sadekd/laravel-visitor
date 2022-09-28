<?php
declare(strict_types=1);

namespace SadekD\LaravelVisitor\Utils;

class Hasher
{
    public function __construct(
        private $algo = 'sha256'
    )
    {
    }

    public function hash(string $data): string
    {
        return hash($this->algo, $data);
    }
}
