<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Renderer\Php81\Components;

use gcgreycat\PhpCodeGenerator\Components;
use gcgreycat\PhpCodeGenerator\Renderer\AbstractComponent;

class Func extends AbstractComponent
{

    public function render(Components\IComponent $component): string
    {
        if (!($component instanceof Components\Func)) {
            return '';
        }
        $result = 'function ' . ($component->name ?? '');
        $result .= $this->drawArguments($component);
        $result .= $component->returnType ? ': ' . $component->returnType : '';
        $result .= "\n{\n";
        $result .= $this->renderer->render($component->component, false);
        if (!str_ends_with($result, "\n")) {
            $result .= "\n";
        }
        $result .= "}\n";
        return $result;
    }

    private function drawArguments(Components\IComponent $component): string
    {
        $list = [];
        if (!empty($component->arguments)) {
            foreach ($component->arguments as $argument) {
                $list[] = ($argument->type ? $argument->type . ' ' : '') . '$' . $argument->name;
            }
        }
        return '(' . join(', ', $list) . ')';
    }
}