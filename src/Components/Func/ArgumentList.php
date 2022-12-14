<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components\Func;

use gcgreycat\PhpCodeGenerator\AbstractClassList;

class ArgumentList extends AbstractClassList
{
    public function current(): ?Argument
    {
        return current($this->list);
    }

    protected function getClass(): string
    {
        return Argument::class;
    }
}