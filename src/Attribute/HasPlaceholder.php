<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasPlaceholder is used by widgets which have a placeholder attribute.
 */
trait HasPlaceholder
{
    /**
     * Returns a new instances specifying the placeholder attribute.
     *
     * @param string $value The placeholder text.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#the-placeholder-attribute
     */
    public function placeholder(string $value): static
    {
        $new = clone $this;
        $new->attributes['placeholder'] = $value;

        return $new;
    }
}
