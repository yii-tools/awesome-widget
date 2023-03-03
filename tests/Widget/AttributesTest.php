<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class AttributesTest extends TestCase
{
    public function testRender(): void
    {
        Widget::widget()->id('id-test')->attributes(['class' => 'text-danger'])->begin();

        $output = Widget::end();

        $this->assertSame('<class="text-danger" id="id-test">', $output);
    }
}
