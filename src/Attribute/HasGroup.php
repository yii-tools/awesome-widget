<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasGroup is used to set the attributes for the optgroup tags.
 */
trait HasGroup
{
    protected array $groups = [];

    /**
     * Returns a new instances with the attributes for the optgroup tags.
     *
     * The structure of this is similar to that of 'attributes', except that the array keys represent the optgroup
     * labels specified in $items.
     *
     * ```php
     * [
     *     'groups' => [
     *         '1' => ['label' => 'Chile'],
     *         '2' => ['label' => 'Russia']
     *     ],
     * ];
     * ```
     *
     * @param array $value The attributes for the optgroup tags.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/optgroup.html#optgroup
     */
    public function groups(array $value = []): static
    {
        $new = clone $this;
        $new->groups = $value;

        return $new;
    }
}
