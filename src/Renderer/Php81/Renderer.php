<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Renderer\Php81;

use gcgreycat\PhpCodeGenerator\Components\IComponent;
use gcgreycat\PhpCodeGenerator\Renderer\IComponent as IRendererComponent;
use gcgreycat\PhpCodeGenerator\Renderer\IRenderer;
use gcgreycat\PhpCodeGenerator\Renderer\RenderException;

class Renderer implements IRenderer
{
    /**
     * @param IComponent $component
     * @param bool $prependPhpTag
     * @return string
     * @throws RenderException
     */
    public function render(IComponent $component, bool $prependPhpTag = true): string
    {
        $class = get_class($component);
        if (($position = strrpos($class, '\\')) !== false) {
            $class = substr($class, $position + 1);
        }
        $rendererClass = __NAMESPACE__ . "\\Components\\{$class}";
        if (!class_exists($rendererClass)) {
            throw new RenderException('Unknown renderer');
        }
        if (empty(class_implements($rendererClass)[IRendererComponent::class])) {
            throw new RenderException('Invalid renderer');
        }

        $renderer = new $rendererClass($this);

        return ($prependPhpTag ? $this->getPrependPhpTag() : '') . $renderer->render($component);
    }

    protected function getPrependPhpTag(): string
    {
        return <<<'PREPEND_TAG'
<?php
declare(strict_types=1);


PREPEND_TAG;
    }
}