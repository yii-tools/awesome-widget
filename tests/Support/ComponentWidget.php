<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Support;

use Yii\Html\Tag;
use Yii\Widget\Component\AbstractComponentWidget;

final class ComponentWidget extends AbstractComponentWidget
{
    public function render(): string
    {
        $attributes = $this->attributes;

        if ($this->getPlaceholder() !== '') {
            $attributes['placeholder'] = $this->getPlaceholder();
        }

        if (!empty($this->getValue())) {
            /** @psalm-var mixed */
            $attributes['value'] = $this->getValue();
        }

        $renderInput = $this->run('component', '', '', $attributes);

        return match ($this->container) {
            true => Tag::create('div', $renderInput, $this->getContainerAttributes()),
            false => $renderInput,
        };
    }
}
