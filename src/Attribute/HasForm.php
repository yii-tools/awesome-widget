<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasForm is used by widgets which have a form attribute.
 */
trait HasForm
{
    /**
     * Returns a new instance with specifies the form element the tag input element belongs to.
     *
     * The value of this attribute must be the id attribute of a {@see Form} element in the same document.
     *
     * @param string $value The id attribute of a {@see Form} element in the same document.
     *
     * @link https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#attr-fae-form
     */
    public function form(string $value): static
    {
        $new = clone $this;
        $new->attributes['form'] = $value;

        return $new;
    }
}
