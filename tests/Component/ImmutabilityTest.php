<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Component;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\ComponentWidget;
use Yii\Widget\Tests\Support\TestTrait;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutabilityTest extends TestCase
{
    use TestTrait;

    public function testImmutability(): void
    {
        $componentWidget = ComponentWidget::widget();

        $this->assertNotSame($componentWidget, $componentWidget->attributes([]));
        $this->assertNotSame($componentWidget, $componentWidget->autofocus());
        $this->assertNotSame($componentWidget, $componentWidget->class(''));
        $this->assertNotSame($componentWidget, $componentWidget->id(''));
        $this->assertNotSame($componentWidget, $componentWidget->name(''));
        $this->assertNotSame($componentWidget, $componentWidget->tabindex(0));
        $this->assertNotSame($componentWidget, $componentWidget->title(''));
        $this->assertNotSame($componentWidget, $componentWidget->value(null));
    }
}
