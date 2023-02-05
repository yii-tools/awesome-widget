<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasRows is used by widgets which have a rows attribute.
 */
trait HasRows
{
    /**
     * The number of lines of text for the UA to show.
     *
     * @param int $value The number of lines of text for the UA to show.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html#textarea.attrs.rows
     */
    public function rows(int $value): self
    {
        $new = clone $this;
        $new->attributes['rows'] = $value;

        return $new;
    }
}
