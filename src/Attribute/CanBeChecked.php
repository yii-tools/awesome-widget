<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * CanBeChecked is an attribute that can be used by widgets that can be checked.
 */
trait CanBeChecked
{
    protected bool $checked = false;

    /**
     * Returns a new instance with specifies the checked content attribute is a boolean attribute that gives the default
     * checkedness of the input element.
     *
     * @param bool $value The value of the checked attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-checked
     */
    public function checked(bool $value): static
    {
        $new = clone $this;
        $new->checked = $value;

        return $new;
    }
}
