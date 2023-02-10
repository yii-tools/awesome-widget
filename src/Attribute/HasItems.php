<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

/**
 * HasItems provides methods to configure the data items for the widget.
 */
trait HasItems
{
    protected array $items = [];
    protected array $itemsAttributes = [];

    /**
     * Returns a new instances with the option data items.
     *
     * The array keys are option values, and the array values are the corresponding option labels. The array can also
     * be nested (i.e. some array values are arrays too). For each sub-array, an option group will be generated whose
     * label is the key associated with the sub-array. If you have a list of data, you may convert them into the format
     * described above using {@see \Yiisoft\Arrays\ArrayHelper::map()}
     *
     * Example:
     * ```php
     * [
     *     '1' => 'Santiago',
     *     '2' => 'Concepcion',
     *     '3' => 'Chillan',
     *     '4' => 'Moscu'
     *     '5' => 'San Petersburg',
     *     '6' => 'Novosibirsk',
     *     '7' => 'Ekaterinburgo'
     * ];
     * ```
     *
     * Example with options groups:
     * ```php
     * [
     *     '1' => [
     *         '1' => 'Santiago',
     *         '2' => 'Concepcion',
     *         '3' => 'Chillan',
     *     ],
     *     '2' => [
     *         '4' => 'Moscu',
     *         '5' => 'San Petersburg',
     *         '6' => 'Novosibirsk',
     *         '7' => 'Ekaterinburgo'
     *     ],
     * ];
     * ```
     *
     * @param array $value The option data items.
     */
    public function items(array $value = []): static
    {
        $new = clone $this;
        $new->items = $value;

        return $new;
    }

    /**
     * Returns a new instances with the HTML attributes for items. The following special options are recognized.
     *
     * @param array $values The Attribute values indexed by attribute names for hidden widget.
     */
    public function itemsAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->itemsAttributes = $values;

        return $new;
    }
}
