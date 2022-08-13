<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components\ClassComponent;

use gcgreycat\PhpCodeGenerator\AbstractClassList;

class MethodList extends AbstractClassList
{
    public function current(): ?Method
    {
        return current($this->list);
    }

    protected function getClass(): string
    {
        return Method::class;
    }
}