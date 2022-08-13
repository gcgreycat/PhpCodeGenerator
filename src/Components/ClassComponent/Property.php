<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components\ClassComponent;

class Property
{
    public function __construct(
        public readonly Visibility $visibility,
        public readonly string $name,
        public readonly ?string $type = null,
        public readonly mixed $defaultValue = null
    )
    {

    }
}