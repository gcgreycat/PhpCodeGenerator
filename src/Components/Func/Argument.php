<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components\Func;

class Argument
{
    public function __construct(public readonly string $name, public readonly ?string $type = null)
    {

    }
}