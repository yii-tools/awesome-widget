<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasId is used by widgets which have a id attribute.
 */
trait HasId
{
    /**
     * Returns a new instance with the specified the ID of the widget.
     *
     * @param string|null $id The ID of the widget.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-id-attribute
     */
    public function id(string|null $id): static
    {
        $new = clone $this;
        $new->attributes['id'] = $id;

        return $new;
    }
}
