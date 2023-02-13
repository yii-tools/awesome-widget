<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Support;

use Yii\Html\Tag;
use Yii\Widget\AbstractInputWidget;
use Yii\Widget\Attribute;

final class InputWidget extends AbstractInputWidget
{
    use Attribute\CanBeChecked;
    use Attribute\CanBeMultiple;
    use Attribute\HasAccept;
    use Attribute\HasAutocomplete;
    use Attribute\HasCols;
    use Attribute\HasContainer;
    use Attribute\HasDirname;
    use Attribute\HasGroup;
    use Attribute\HasItems;
    use Attribute\HasLabel;
    use Attribute\HasMax;
    use Attribute\HasMaxLength;
    use Attribute\HasMin;
    use Attribute\HasMinLength;
    use Attribute\HasPattern;
    use Attribute\HasPlaceholder;
    use Attribute\HasPrompt;
    use Attribute\HasRows;
    use Attribute\HasSize;
    use Attribute\HasStep;
    use Attribute\HasType;
    use Attribute\HasWrap;

    private string $tag = 'input';

    /**
     * Returns a new instance with the specified tag name.
     *
     * @param string $value The tag name.
     */
    public function tag(string $value): self
    {
        $new = clone $this;
        $new->tag = $value;

        return $new;
    }

    public function render(): string
    {
        $attributes = $this->attributes;
        $content = '';
        $type = 'text';
        $label = '';

        if ($this->getPlaceholder() !== '') {
            $attributes['placeholder'] = $this->getPlaceholder();
        }

        if (!empty($this->getValue())) {
            /** @psalm-var mixed */
            $attributes['value'] = $this->getValue();
        }

        if (array_key_exists('type', $attributes)) {
            $type = $attributes['type'];

            unset($attributes['type']);
        }

        if ($this->prompt !== '') {
            $content .= PHP_EOL . $this->prompt . PHP_EOL;
        }

        if ($this->label !== null && $this->label !== '') {
            $label = Tag::create('label', $this->label, $this->labelAttributes) . PHP_EOL;
        }

        $renderInput = $label . $this->run($this->tag, $content, $type, $attributes);

        return match ($this->container) {
            true => Tag::create('div', $renderInput, $this->containerAttributes),
            false => $renderInput,
        };
    }
}
