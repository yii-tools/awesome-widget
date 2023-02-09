<?php

declare(strict_types=1);

namespace Yii\Widget\Input;

use Yii\FormModel\FormModelInterface;
use Yii\Html\Helper\Utils;
use Yii\Html\Tag;
use Yii\Widget\Attribute;
use Yii\Widget\Component\AbstractComponentWidget;
use Yii\Widget\Exception\AttributeNotSet;

use function implode;

/**
 * AbstractInputWidget is the base class for widgets that collect user input.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.html
 */
abstract class AbstractInputWidget extends AbstractComponentWidget
{
    use Attribute\CanBeDisabled;
    use Attribute\CanBeReadonly;
    use Attribute\CanBeRequired;
    use Attribute\HasAriaDescribedBy;
    use Attribute\HasAriaLabel;
    use Attribute\HasForm;
    use Attribute\HasPrefixAndSuffix;

    private string $charset = 'UTF-8';
    private string $template = '{prefix}{input}{suffix}';

    public function __construct(protected FormModelInterface $formModel, protected string $attribute)
    {
        if ($this->formModel->has($this->attribute) === false) {
            throw new AttributeNotSet();
        }
    }

    /**
     * Returns a new instance specifying the character encoding of the form submission.
     *
     * @param string $value The character encoding of the form submission.
     */
    public function charset(string $value): static
    {
        $new = clone $this;
        $new->charset = $value;

        return $new;
    }

    /**
     * @return string The attribute of the widget.
     */
    public function getAttribute(): string
    {
        return $this->attribute;
    }

    /**
     * @return string The errors messages for the attribute.
     */
    public function getErrorsForAttribute(): string
    {
        return implode("<br>", $this->formModel->getError($this->attribute));
    }

    /**
     * @return string The firts error message for the attribute.
     */
    public function getErrorFirstForAttribute(): string
    {
        return $this->formModel->getFirstError($this->attribute);
    }

    /**
     * @return FormModelInterface The form model of the widget.
     */
    public function getFormModel(): FormModelInterface
    {
        return $this->formModel;
    }

    /**
     * @return string The ID of the widget.
     */
    public function getId(): string
    {
        return match (isset($this->attributes['id']) && is_string($this->attributes['id'])) {
            true => $this->attributes['id'],
            false => Utils::generateInputId($this->formModel->getFormName(), $this->attribute),
        };
    }

    /**
     * @return bool Whether the widget is valid.
     */
    public function isValidated(): bool
    {
        return !$this->isEmpty() && !$this->hasError();
    }

    /**
     * @return bool Whether the widget has an error.
     */
    public function hasError(): bool
    {
        return $this->formModel->hasError($this->attribute);
    }

    /**
     * @return string The placeholder of the widget.
     */
    protected function getPlaceholder(): string
    {
        return $this->formModel->getPlaceholder($this->attribute);
    }

    /**
     * @return mixed The value of the widget.
     */
    protected function getValue(): mixed
    {
        return $this->formModel->getAttributeValue($this->attribute);
    }

    protected function run(string $tag, string $content, string|null $type, array $attributes): string
    {
        $attributes['type'] = $type;
        $prefix = $this->prefix;
        $suffix = $this->suffix;

        if ($prefix !== '') {
            $prefix .= PHP_EOL;
        }

        if (!array_key_exists('id', $attributes)) {
            $attributes['id'] = Utils::generateInputId($this->formModel->getFormName(), $this->attribute);
        }

        if (!array_key_exists('name', $attributes)) {
            $attributes['name'] = Utils::generateInputName($this->formModel->getFormName(), $this->attribute);
        }

        if ($suffix !== '') {
            $suffix = PHP_EOL . $suffix;
        }

        $attributes = array_merge(
            $attributes,
            $this->formModel->getRuleHtmlAttributes($this->formModel, $this->attribute),
        );

        return strtr(
            $this->template,
            [
                '{prefix}' => $prefix,
                '{input}' => Tag::create($tag, $content, $attributes),
                '{suffix}' => $suffix,
            ],
        );
    }

    /**
     * @return bool Whether the widget is empty.
     */
    private function isEmpty(): bool
    {
        return $this->formModel->isEmpty();
    }
}
