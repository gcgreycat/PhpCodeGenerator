<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator;

abstract class AbstractClassList implements \ArrayAccess, \Iterator
{
    protected array $list = [];

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->list[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->list[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!is_a($value, $this->getClass())) {
            throw new \InvalidArgumentException("'" . $this->getClass() . "' instance is waited");
        }
        if (is_null($offset)) {
            $this->list[] = $value;
        } else {
            $this->list[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->list[$offset]);
    }

    public function current(): ?object
    {
        return current($this->list);
    }

    public function next(): void
    {
        next($this->list);
    }

    public function key(): string|int|null
    {
        return key($this->list);
    }

    public function valid(): bool
    {
        return !is_null(key($this->list));
    }

    public function rewind(): void
    {
        reset($this->list);
    }

    protected abstract function getClass(): string;
}