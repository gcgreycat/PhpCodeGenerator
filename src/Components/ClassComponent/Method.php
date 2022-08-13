<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components\ClassComponent;

use gcgreycat\PhpCodeGenerator\Components\Func;

class Method
{
    public function __construct(
        public readonly Visibility $visibility,
        public readonly Func $func
    )
    {

    }
}