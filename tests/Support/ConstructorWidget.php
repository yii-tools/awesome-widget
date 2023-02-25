<?php

declare(strict_types=1);

namespace Forge\Widget\Tests\Stubs;

use Yii\Html\Helper\Attributes;
use Yii\Widget\AbstractWidget;

final class ConstructorWidget extends AbstractWidget
{
    public function __construct(private Attributes $attributesHelper)
    {
    }

    public function id(string $value): self
    {
        $new = clone $this;

        $new->attributes['id'] = $value;

        return $new;
    }

    protected function run(): string
    {
        return '<' . trim($this->attributesHelper->render($this->attributes)) . '>';
    }
}
