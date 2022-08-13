<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components\ClassComponent;

use gcgreycat\PhpCodeGenerator\AbstractClassList;

class PropertyList extends AbstractClassList
{
    public function current(): ?Property
    {
        return current($this->list);
    }

    protected function getClass(): string
    {
        return Property::class;
    }
}