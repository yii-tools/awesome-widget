<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Support;

use Yii\Widget\Factory\WidgetFactory;
use Yiisoft\Definitions\Exception\InvalidConfigException;
use Yiisoft\Test\Support\Container\SimpleContainer;
use Yii\Html\Helper\Attributes;

trait TestTrait
{
    /**
     * @throws InvalidConfigException
     */
    protected function setUp(): void
    {
        parent::setUp();

        WidgetFactory::config(new SimpleContainer([Attributes::class => new Attributes()]));
    }
}
