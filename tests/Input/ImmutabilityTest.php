<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Input;

use PHPUnit\Framework\TestCase;
use Yii\Widget\Tests\Support\InputWidget;
use Yii\Widget\Tests\Support\TestForm;
use Yii\Widget\Tests\Support\TestTrait;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutabilityTest extends TestCase
{
    use TestTrait;

    public function testImmutability(): void
    {
        $inputWidget = InputWidget::widget([new TestForm(), 'string']);

        $this->assertNotSame($inputWidget, $inputWidget->accept(''));
        $this->assertNotSame($inputWidget, $inputWidget->ariaDescribedBy(''));
        $this->assertNotSame($inputWidget, $inputWidget->ariaLabel(''));
        $this->assertNotSame($inputWidget, $inputWidget->autocomplete('on'));
        $this->assertNotSame($inputWidget, $inputWidget->charset(''));
        $this->assertNotSame($inputWidget, $inputWidget->cols(0));
        $this->assertNotSame($inputWidget, $inputWidget->container(true));
        $this->assertNotSame($inputWidget, $inputWidget->containerAttributes([]));
        $this->assertNotSame($inputWidget, $inputWidget->containerClass(''));
        $this->assertNotSame($inputWidget, $inputWidget->dirname('test'));
        $this->assertNotSame($inputWidget, $inputWidget->disabled());
        $this->assertNotSame($inputWidget, $inputWidget->form(''));
        $this->assertNotSame($inputWidget, $inputWidget->groups([]));
        $this->assertNotSame($inputWidget, $inputWidget->items([]));
        $this->assertNotSame($inputWidget, $inputWidget->itemsAttributes([]));
        $this->assertNotSame($inputWidget, $inputWidget->max(''));
        $this->assertNotSame($inputWidget, $inputWidget->maxLength(0));
        $this->assertNotSame($inputWidget, $inputWidget->min(''));
        $this->assertNotSame($inputWidget, $inputWidget->minLength(0));
        $this->assertNotSame($inputWidget, $inputWidget->multiple());
        $this->assertNotSame($inputWidget, $inputWidget->pattern(''));
        $this->assertNotSame($inputWidget, $inputWidget->placeholder(''));
        $this->assertNotSame($inputWidget, $inputWidget->prefix(''));
        $this->assertNotSame($inputWidget, $inputWidget->prompt('', ''));
        $this->assertNotSame($inputWidget, $inputWidget->readonly());
        $this->assertNotSame($inputWidget, $inputWidget->required());
        $this->assertNotSame($inputWidget, $inputWidget->rows(0));
        $this->assertNotSame($inputWidget, $inputWidget->size(0));
        $this->assertNotSame($inputWidget, $inputWidget->step(0));
        $this->assertNotSame($inputWidget, $inputWidget->suffix(''));
        $this->assertNotSame($inputWidget, $inputWidget->type(''));
        $this->assertNotSame($inputWidget, $inputWidget->wrap('soft'));
    }
}
