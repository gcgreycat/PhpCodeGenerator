<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Tests\Renderer\Php81;

use gcgreycat\PhpCodeGenerator\Components\IComponent;
use gcgreycat\PhpCodeGenerator\Components\Raw;
use gcgreycat\PhpCodeGenerator\Renderer\Php81\Renderer;
use gcgreycat\PhpCodeGenerator\Renderer\RenderException;
use PHPUnit\Framework\TestCase;

class RendererTest extends TestCase
{

    public function testRender()
    {
        $renderer = new Renderer();

        $raw = new Raw('var_dump("Foobar");');
        $expected = <<<'EXPECTED'
<?php
declare(strict_types=1);

var_dump("Foobar");
EXPECTED;
        $this->assertEquals($expected, $renderer->render($raw));
    }

    public function testRenderInvalidComponent()
    {
        $renderer = new Renderer();
        $component = $this->createStub(IComponent::class);

        $this->expectException(RenderException::class);
        $this->assertEquals('', $renderer->render($component));
    }
}
