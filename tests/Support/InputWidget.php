<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Support;

use Yii\Html\Tag;
use Yii\Widget\Input\AbstractInputWidget;
use Yii\Widget\Attribute;

final class InputWidget extends AbstractInputWidget
{
    use Attribute\CanBeMultiple;
    use Attribute\HasAccept;
    use Attribute\HasAutocomplete;
    use Attribute\HasCols;
    use Attribute\HasContainer;
    use Attribute\HasDirname;
    use Attribute\HasMax;
    use Attribute\HasMaxLength;
    use Attribute\HasMin;
    use Attribute\HasMinLength;
    use Attribute\HasPattern;
    use Attribute\HasPlaceholder;
    use Attribute\HasRows;
    use Attribute\HasSize;
    use Attribute\HasStep;
    use Attribute\HasType;
    use Attribute\HasWrap;

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
