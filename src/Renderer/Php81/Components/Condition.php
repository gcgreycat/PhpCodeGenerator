<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Renderer\Php81\Components;

use gcgreycat\PhpCodeGenerator\Components;
use gcgreycat\PhpCodeGenerator\Renderer\AbstractComponent;

class Condition extends AbstractComponent
{
    public function render(Components\IComponent $component): string
    {
        if (!($component instanceof Components\Condition)) {
            return '';
        }
        $result = '';
        foreach ($component->getStatements() as $expression => $statements) {
            $result .= ($result ? ' elseif ' : 'if ') . "(${expression}) {\n";
            $result .= $this->renderStatementList($statements);
            $result .= "}";
        }
        if (!empty($component->getElseStatements())) {
            $result .= " else {\n";
            $result .= $this->renderStatementList($component->getElseStatements());
            $result .= '}';
        }
        $result .= "\n";
        return $result;
    }

    private function renderStatementList(array $statements): string
    {
        $result = '';
        foreach ($statements as $statement) {
            $result .= $this->renderer->render($statement, false);
            if (!str_ends_with($result, "\n")) {
                $result .= "\n";
            }
        }
        return $result;
    }
}