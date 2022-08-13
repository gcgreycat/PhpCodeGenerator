<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components;

use gcgreycat\PhpCodeGenerator\Components\Func\ArgumentList;

class Func implements IComponent
{
    public function __construct(
        public readonly IComponent   $component,
        public readonly ?string      $name = null,
        public readonly ArgumentList $arguments = new ArgumentList(),
        public readonly ?string      $returnType = null
    )
    {
    }
}