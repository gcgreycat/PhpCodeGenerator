<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Tests\Renderer\Php81\Components;

use gcgreycat\PhpCodeGenerator\Components\Raw;
use gcgreycat\PhpCodeGenerator\Renderer\Php81\Components\Condition;
use gcgreycat\PhpCodeGenerator\Renderer\Php81\Renderer;
use PHPUnit\Framework\TestCase;

class ConditionTest extends TestCase
{

    public function testRender(): void
    {
        $conditionRenderer = new Condition(new Renderer());
        $condition = new \gcgreycat\PhpCodeGenerator\Components\Condition(new Raw("var_dump('if');"), 'true !== false');

        $expected = <<<'EXPECTED'
if (true !== false) {
var_dump('if');
}

EXPECTED;
        $this->assertEquals($expected, $conditionRenderer->render($condition), 'if only');

        $condition->addCondition(new Raw("var_dump('else');"));
        $expected = <<<'EXPECTED'
if (true !== false) {
var_dump('if');
} else {
var_dump('else');
}

EXPECTED;
        $this->assertEquals($expected, $conditionRenderer->render($condition), 'if/else');

        $condition->addCondition(new Raw("var_dump('if/else');"), 'false');
        $expected = <<<'EXPECTED'
if (true !== false) {
var_dump('if');
} elseif (false) {
var_dump('if/else');
} else {
var_dump('else');
}

EXPECTED;
        $this->assertEquals($expected, $conditionRenderer->render($condition), 'if/elseif/else');

        $condition->addCondition(new Raw("var_dump('if/else 2');"), 'false');
        $expected = <<<'EXPECTED'
if (true !== false) {
var_dump('if');
} elseif (false) {
var_dump('if/else');
var_dump('if/else 2');
} else {
var_dump('else');
}

EXPECTED;
        $this->assertEquals($expected, $conditionRenderer->render($condition), 'if/elseif/else 2');
    }
}
