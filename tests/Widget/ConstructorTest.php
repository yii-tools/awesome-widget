<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Html\Helper\Attributes;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ConstructorTest extends TestCase
{
    public function testRender(): void
    {
        $output = Widget::widget([new Attributes()])->id('w0');

        $this->assertSame('<id="w0">', $output->render());
    }

    public function testConstructorWithDefinitions(): void
    {
        $definitions = [
            '__construct()' => [new Attributes()],
        ];

        $output = Widget::widget(definitions: $definitions)->id('w0');

        $this->assertSame('<id="w0">', $output->render());
    }

    public function testConstructorWithArgumentsAndDefinitions(): void
    {
        $definitions = [
            '__construct()' => ['foo' => 'bar'],
        ];

        $output = Widget::widget([new Attributes()], $definitions)->id('w0');

        $this->assertSame('<id="w0">', $output->render());
    }
}
