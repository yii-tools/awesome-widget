<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Yii\Widget\Tests\Support\Widget\InputWidget;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class BeginEndTest extends TestCase
{
    public function testRender(): void
    {
        Widget::widget()->id('test')->begin();

        $output = Widget::end();

        $this->assertSame('<id="test">', $output);
    }

    /**
     * @depends testRender
     */
    public function testStackTracking(): void
    {
        $widget = Widget::widget();

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            'Unexpected Yii\Widget\Tests\Support\Widget\Widget::end() call. A matching begin() is not found.'
        );

        $widget::end();
    }

    /**
     * @depends testRender
     */
    public function testStackTrackingWithDiferentClass(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(
            'Expecting end() of Yii\Widget\Tests\Support\Widget\Widget found Yii\Widget\Tests\Support\Widget\InputWidget.'
        );

        Widget::widget()->begin();
        InputWidget::end();
    }
}
