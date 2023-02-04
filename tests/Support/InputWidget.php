<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Support;

use Yii\Html\Tag;
use Yii\Widget\Input\AbstractInputWidget;
use Yii\Widget\Input\Concern;

final class InputWidget extends AbstractInputWidget
{
    use Concern\HasAutocomplete;
    use Concern\HasContainer;
    use Concern\HasDirname;
    use Concern\HasMax;
    use Concern\HasMaxLength;
    use Concern\HasMin;
    use Concern\HasMinLength;
    use Concern\HasPattern;
    use Concern\HasPlaceholder;
    use Concern\HasSize;
    use Concern\HasStep;
    use Concern\HasType;

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

        $renderInput = $this->run('input', '', 'text', $attributes);

        return match ($this->container) {
            true => Tag::create('div', $renderInput, $this->getContainerAttributes()),
            false => $renderInput,
        };
    }
}
