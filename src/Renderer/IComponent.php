<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Renderer;

use gcgreycat\PhpCodeGenerator\Components;

interface IComponent
{
    public function __construct(IRenderer $renderer);
    public function render(Components\IComponent $component): string;
}