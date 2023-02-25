<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AfterRunTest extends TestCase
{
    public function testRender(): void
    {
        Widget::widget()->id('afterrun')->begin();

        $output = Widget::end();

        $this->assertSame('<div><id="afterrun"></div>', $output);
    }
}
