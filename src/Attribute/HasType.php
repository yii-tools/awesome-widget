<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasType is used by widgets which have a type attribute.
 */
trait HasType
{
    /**
     * Returns a new instance with the specified that its input element is a button with no additional semantics.
     *
     * @param mixed $value The type of the button, 'button', 'submit', 'reset'.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.button.html#input.button.attrs.type
     */
    public function type(mixed $value): static
    {
        $new = clone $this;
        $new->attributes['type'] = $value;

        return $new;
    }
}
