<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Input;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yii\Widget\Exception\AttributeNotSet;
use Yii\Widget\Tests\Support\Form\TestForm;
use Yii\Widget\Tests\Support\Widget\InputWidget;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    public function testAutocomplete(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Autocomplete must be "on" or "off".');

        InputWidget::widget([new TestForm(), 'string'])->autocomplete('')->render();
    }

    public function testDirname(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value cannot be empty.');

        InputWidget::widget([new TestForm(), 'string'])->dirname('')->render();
    }

    public function testGetAttributeNotSet(): void
    {
        $this->expectException(AttributeNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because "attribute" is not set or not exists.');

        InputWidget::widget([new TestForm(), '']);
    }

    public function testGetAttributeNotExist(): void
    {
        $this->expectException(AttributeNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because "attribute" is not set or not exists.');

        InputWidget::widget([new TestForm(), 'noExist']);
    }

    public function testStep(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value must be a number.');

        InputWidget::widget([new TestForm(), 'string'])->step('x')->render();
    }

    public function testWrap(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid wrap value. Valid values are: hard, soft.');

        InputWidget::widget([new TestForm(), 'string'])->wrap('')->render();
    }
}
