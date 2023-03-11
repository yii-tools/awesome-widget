<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Widget;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Yii\Widget\Tests\Support\Widget\Widget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class LoadFileDefinitionTest extends TestCase
{
    public function testDefinition(): void
    {
        $this->assertSame(
            '<class="other-class">',
            Widget::widget(
                definitions: ['addAttribute()' => ['class', 'other-class']],
                file: __DIR__ . '/../Support/config/widget_definition.php',
            )->render(),
        );
    }

    public function testException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('File /path/to/file does not exist.');

        Widget::widget(file: '/path/to/file');
    }

    public function testRender(): void
    {
        $this->assertSame(
            '<class="test-class">',
            Widget::widget(file: __DIR__ . '/../Support/config/widget_definition.php')->render(),
        );
    }
}
