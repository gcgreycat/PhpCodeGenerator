<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components\Func;

class ArgumentList implements \ArrayAccess, \Iterator
{
    private array $arguments = [];

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->arguments[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->arguments[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!is_a($value, Argument::class)) {
            throw new \InvalidArgumentException("'" . Argument::class . "' instance is waited");
        }
        if (is_null($offset)) {
            $this->arguments[] = $value;
        } else {
            $this->arguments[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->arguments[$offset]);
    }

    public function current(): ?Argument
    {
        return current($this->arguments);
    }

    public function next(): void
    {
        next($this->arguments);
    }

    public function key(): string|int|null
    {
        return key($this->arguments);
    }

    public function valid(): bool
    {
        return !is_null(key($this->arguments));
    }

    public function rewind(): void
    {
        reset($this->arguments);
    }
}