<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Renderer;

use gcgreycat\PhpCodeGenerator\Components\IComponent;

interface IRenderer
{
    public function render(IComponent $component, bool $prependPhpTag = true): string;
}