<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Tests\Renderer\Php81\Components;

use gcgreycat\PhpCodeGenerator\Components\ClassComponent\Method;
use gcgreycat\PhpCodeGenerator\Components\ClassComponent\MethodList;
use gcgreycat\PhpCodeGenerator\Components\ClassComponent\Property;
use gcgreycat\PhpCodeGenerator\Components\ClassComponent\PropertyList;
use gcgreycat\PhpCodeGenerator\Components\ClassComponent\Visibility;
use gcgreycat\PhpCodeGenerator\Components\Func;
use gcgreycat\PhpCodeGenerator\Components\Raw;
use gcgreycat\PhpCodeGenerator\Renderer\Php81\Components\ClassComponent;
use gcgreycat\PhpCodeGenerator\Renderer\Php81\Renderer;
use PHPUnit\Framework\TestCase;

class ClassComponentTest extends TestCase
{

    public function testRender()
    {
        $classRenderer = new ClassComponent(new Renderer());
        $properties = new PropertyList();
        $properties[] = new Property(Visibility::Public, 'property1');
        $properties[] = new Property(Visibility::Protected, 'property2', 'bool', true);
        $properties[] = new Property(Visibility::Private, 'property3', 'int', 10);
        $properties[] = new Property(Visibility::Private, 'property4', 'string', 'value');
        $methods = new MethodList();
        $methods[] = new Method(
            Visibility::Public,
            new Func(
                new Raw("var_dump('foobar');"),
                'method1',
                new Func\ArgumentList(),
                'void'
            )
        );

        $object = new \gcgreycat\PhpCodeGenerator\Components\ClassComponent('Foobar', $properties, $methods);

        $expected = <<<'EXPECTED'
class Foobar
{
public $property1;
protected bool $property2 = true;
private int $property3 = 10;
private string $property4 = 'value';

public function method1(): void
{
var_dump('foobar');
}

}

EXPECTED;
        $this->assertEquals($expected, $classRenderer->render($object));
    }
}
