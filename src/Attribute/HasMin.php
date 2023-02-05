<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasMin is used by widgets which have a min attribute.
 */
trait HasMin
{
    /**
     * Returns a new instance with the minimum value.
     *
     * @param int|string $value The minimum value.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#attr-input-min
     */
    public function min(int|string $value): static
    {
        $new = clone $this;
        $new->attributes['min'] = $value;

        return $new;
    }
}
