<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Input;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yii\Widget\Exception\AttributeNotSet;
use Yii\Widget\Tests\Support\InputWidget;
use Yii\Widget\Tests\Support\TestForm;
use Yiisoft\Definitions\Exception\CircularReferenceException;
use Yiisoft\Definitions\Exception\InvalidConfigException;
use Yiisoft\Definitions\Exception\NotInstantiableException;
use Yiisoft\Factory\NotFoundException;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ExceptionTest extends TestCase
{
    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testAutocomplete(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Autocomplete must be "on" or "off".');

        InputWidget::widget([new TestForm(), 'string'])->autocomplete('')->render();
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testDirname(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value cannot be empty.');

        InputWidget::widget([new TestForm(), 'string'])->dirname('')->render();
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testGetAttributeNotSet(): void
    {
        $this->expectException(AttributeNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because "attribute" is not set or not exists.');

        InputWidget::widget([new TestForm(), '']);
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testGetAttributeNotExist(): void
    {
        $this->expectException(AttributeNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because "attribute" is not set or not exists.');

        InputWidget::widget([new TestForm(), 'noExist']);
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testStep(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value must be a number.');

        InputWidget::widget([new TestForm(), 'string'])->step('x')->render();
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testWrap(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid wrap value. Valid values are: hard, soft.');

        InputWidget::widget([new TestForm(), 'string'])->wrap('')->render();
    }
}
