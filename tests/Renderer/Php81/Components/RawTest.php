<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Tests\Renderer\Php81\Components;

use gcgreycat\PhpCodeGenerator\Components\IComponent;
use gcgreycat\PhpCodeGenerator\Renderer\IRenderer;
use gcgreycat\PhpCodeGenerator\Renderer\Php81\Components\Raw;
use PHPUnit\Framework\TestCase;

class RawTest extends TestCase
{
    public function testRender(): void
    {
        $renderer = $this->createStub(IRenderer::class);
        $raw = new Raw($renderer);

        $component = $this->createStub(IComponent::class);
        $this->assertEmpty($raw->render($component));

        $component = $this->createStub(IComponent::class);
        $expectedContent = 'Test Content';
        $component->content = $expectedContent;
        $this->assertEquals($expectedContent, $raw->render($component));
    }
}
