<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class BeforeRunTest extends TestCase
{
    public function testRender(): void
    {
        Widget::widget()->begin();

        $output = Widget::end();

        $this->assertSame('<>', $output);
    }

    public function testBeforeRun(): void
    {
        Widget::widget()->id('beforerun')->begin();

        $output = Widget::end();

        $this->assertEmpty($output);
    }
}
