<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Tests\Components;

use gcgreycat\PhpCodeGenerator\Components\Condition;
use gcgreycat\PhpCodeGenerator\Components\IComponent;
use PHPUnit\Framework\TestCase;

class ConditionTest extends TestCase
{

    public function testCreation()
    {
        $component = $this->createStub(IComponent::class);

        $condition = new Condition($component, 'true');

        $this->assertEquals([
            'true' => [$component],
        ], $condition->getStatements());

        $condition->addCondition($component, 'true');
        $condition->addCondition($component, 'false');
        $condition->addCondition($component);

        $this->assertEquals([
            'true' => [
                $component,
                $component,
            ],
            'false' => [
                $component,
            ]
        ], $condition->getStatements());

        $this->assertEquals([$component], $condition->getElseStatements());
    }
}
