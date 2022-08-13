<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components;

use gcgreycat\PhpCodeGenerator\Components\ClassComponent\MethodList;
use gcgreycat\PhpCodeGenerator\Components\ClassComponent\PropertyList;

class ClassComponent implements IComponent
{
    public function __construct(
        public readonly string       $name,
        public readonly PropertyList $properties,
        public readonly MethodList   $methods
    )
    {

    }
}