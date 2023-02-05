<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasMax is used by widgets which have a max attribute.
 */
trait HasMax
{
    /**
     * Returns a new instance with the maximum value.
     *
     * @param int|string $value The maximum value.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-max
     */
    public function max(int|string $value): static
    {
        $new = clone $this;
        $new->attributes['max'] = $value;

        return $new;
    }
}
