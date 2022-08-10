<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Renderer;

abstract class AbstractComponent implements IComponent
{
    public function __construct(protected IRenderer $renderer)
    {
    }
}