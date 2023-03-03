<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class StringableTest extends TestCase
{
    public function testRender(): void
    {
        $output = Widget::widget()->id('w0');

        $this->assertSame('<id="w0">', (string) $output);
    }
}
