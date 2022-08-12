<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Tests\Renderer\Php81\Components;

use gcgreycat\PhpCodeGenerator\Components\Func\Argument;
use gcgreycat\PhpCodeGenerator\Components\Func\ArgumentList;
use gcgreycat\PhpCodeGenerator\Components\Raw;
use gcgreycat\PhpCodeGenerator\Renderer\Php81\Components\Func;
use gcgreycat\PhpCodeGenerator\Renderer\Php81\Renderer;
use PHPUnit\Framework\TestCase;

class FuncTest extends TestCase
{

    public function testAnonymous(): void
    {
        $funcRenderer = new Func(new Renderer());
        $func = new \gcgreycat\PhpCodeGenerator\Components\Func(new Raw("var_dump('Function');"));

        $expected = <<<'EXPECTED'
function ()
{
var_dump('Function');
}

EXPECTED;
        $this->assertEquals($expected, $funcRenderer->render($func));
    }

    public function testAnonymousWithArguments(): void
    {
        $funcRenderer = new Func(new Renderer());
        $arguments = new ArgumentList();
        $arguments[] = new Argument('foo', 'string');
        $arguments[] = new Argument('bar');
        $func = new \gcgreycat\PhpCodeGenerator\Components\Func(new Raw("var_dump('Function');"), null, $arguments);

        $expected = <<<'EXPECTED'
function (string $foo, $bar)
{
var_dump('Function');
}

EXPECTED;
        $this->assertEquals($expected, $funcRenderer->render($func));
    }

    public function testNamedWithReturnType(): void
    {
        $funcRenderer = new Func(new Renderer());
        $arguments = new ArgumentList();
        $arguments[] = new Argument('foo', 'string');
        $arguments[] = new Argument('bar');
        $func = new \gcgreycat\PhpCodeGenerator\Components\Func(new Raw("var_dump('Function');\nreturn 'Function';"), 'foobar', $arguments, 'string');

        $expected = <<<'EXPECTED'
function foobar(string $foo, $bar): string
{
var_dump('Function');
return 'Function';
}

EXPECTED;
        $this->assertEquals($expected, $funcRenderer->render($func));
    }
}
