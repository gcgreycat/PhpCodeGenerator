<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Renderer\Php81\Components;

use gcgreycat\PhpCodeGenerator\Components;
use gcgreycat\PhpCodeGenerator\Renderer\AbstractComponent;

class Raw extends AbstractComponent
{
    public function render(Components\IComponent $component): string
    {
        if (property_exists($component, 'content')) {
            return $component->content;
        }
        return '';
    }
}