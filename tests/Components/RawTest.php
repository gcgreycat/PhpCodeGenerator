<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Tests\Components;

use gcgreycat\PhpCodeGenerator\Components\Raw;
use PHPUnit\Framework\TestCase;

class RawTest extends TestCase
{

    public function test__construct(): void
    {
        $content = <<<'TEXT'
$foo = 'bar';
var_dump($foo);
TEXT;

        $raw = new Raw($content);

        $this->assertEquals($content, $raw->content);
    }
}
