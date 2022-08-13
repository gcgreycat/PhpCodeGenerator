<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Renderer\Php81\Components;

use gcgreycat\PhpCodeGenerator\Components;
use gcgreycat\PhpCodeGenerator\Renderer\AbstractComponent;

class ClassComponent extends AbstractComponent
{
    public function render(Components\IComponent $component): string
    {
        if (!($component instanceof Components\ClassComponent)) {
            return '';
        }
        $result = 'class ' . $component->name;
        $result .= "\n{\n";
        $result .= $this->drawProperties($component->properties) . "\n";
        $result .= $this->drawMethods($component->methods);
        $result .= "}\n";

        return $result;
    }

    private function drawProperties(Components\ClassComponent\PropertyList $propertyList): string
    {
        $result = '';
        foreach ($propertyList as $property) {
            $parts = [];
            $parts[] = $property->visibility->value;
            if (!empty($property->type)) {
                $parts[] = $property->type;
            }
            $parts[] = '$' . $property->name;
            if (!is_null($property->defaultValue)) {
                $parts[] = '= ' . var_export($property->defaultValue, true);
            }
            $result .= join(' ', $parts) . ";\n";
        }
        return $result;
    }

    private function drawMethods(Components\ClassComponent\MethodList $methodList): string
    {
        $result = '';
        foreach ($methodList as $method) {
            $result .= $method->visibility->value . ' ' . $this->renderer->render($method->func, false) . "\n";
        }
        return $result;
    }
}