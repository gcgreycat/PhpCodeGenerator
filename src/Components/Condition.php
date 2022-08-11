<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components;

class Condition implements IComponent
{
    private array $statements = [];
    private array $elseStatements = [];

    public function __construct(IComponent $component, ?string $expression = null)
    {
        $this->addCondition($component, $expression);
    }

    public function addCondition(IComponent $component, ?string $expression = null): void
    {
        if (is_null($expression)) {
            $this->elseStatements[] = $component;
            return;
        }
        if (empty($this->statements[$expression])) {
            $this->statements[$expression] = [];
        }
        $this->statements[$expression][] = $component;
    }

    public function getStatements(): array
    {
        return $this->statements;
    }

    public function getElseStatements(): array
    {
        return $this->elseStatements;
    }
}