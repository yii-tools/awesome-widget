<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

use InvalidArgumentException;

/**
 * HasStep is used by widgets which have a step attribute.
 */
trait HasStep
{
    /**
     * Returns a new instances specifying the value granularity of the element’s value.
     *
     * @param int|string $value The value granularity of the element’s value.
     */
    public function step(int|string $value): static
    {
        if (!is_numeric($value)) {
            throw new InvalidArgumentException('The value must be a number.');
        }

        $new = clone $this;
        $new->attributes['step'] = $value;

        return $new;
    }
}
