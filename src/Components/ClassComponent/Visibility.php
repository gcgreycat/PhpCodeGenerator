<?php
declare(strict_types=1);

namespace gcgreycat\PhpCodeGenerator\Components\ClassComponent;

enum Visibility: string
{
    case Public = 'public';
    case Protected = 'protected';
    case Private = 'private';
}
