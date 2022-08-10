<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components;

class Raw implements IComponent
{
    public function __construct(public readonly string $content)
    {
    }
}