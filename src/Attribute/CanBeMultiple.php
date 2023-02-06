<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * CanBeMultiple is used by widgets which can be multiple.
 */
trait CanBeMultiple
{
    /**
     * Returns a new instances specifying the element allows multiple values.
     *
     * @param bool $value Whether the element allows multiple values.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-multiple
     */
    public function multiple(bool $value = true): static
    {
        $new = clone $this;
        $new->attributes['multiple'] = $value;

        return $new;
    }
}
