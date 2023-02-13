<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

use Yii\Html\Helper\CssClass;

/**
 * HasLabel provides methods to configure the label for the widget.
 */
trait HasLabel
{
    protected string|null $label = '';
    protected array $labelAttributes = [];

    /**
     * Return new instance specified the container tag name for the label element.
     *
     * @param string $value The container tag name for the label element.
     */
    public function label(string $value): self
    {
        $new = clone $this;
        $new->label = $value;

        return $new;
    }

    /**
     * Return new instance specified the HTML attributes for the label container.
     *
     * @param array $values The HTML attributes for the label container.
     */
    public function labelAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->labelAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with add css class to the label container.
     *
     * @param string $value The css class name
     */
    public function labelClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->labelAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance specifying whether the label not to be displayed.
     */
    public function notLabel(): static
    {
        $new = clone $this;
        $new->label = null;

        return $new;
    }
}
