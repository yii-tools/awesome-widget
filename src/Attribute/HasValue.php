<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasValue is used by widgets which have a value attribute.
 */
trait HasValue
{
    /**
     * Returns a new instance with the specified the value content attribute gives the default value of the field.
     *
     * @param mixed $value The value of the widget.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-value
     */
    public function value(mixed $value): static
    {
        $new = clone $this;
        $new->attributes['value'] = $value;

        return $new;
    }
}
