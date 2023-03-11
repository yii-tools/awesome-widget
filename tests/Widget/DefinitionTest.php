<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class DefinitionTest extends TestCase
{
    public function testRender(): void
    {
        $this->assertSame(
            '<class="test-class">',
            Widget::widget(definitions: ['addAttribute()' => ['class', 'test-class']])->render(),
        );
    }
}
