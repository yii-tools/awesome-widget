<?php

declare(strict_types=1);

namespace Yii\Widget;

use RuntimeException;
use ReflectionClass;

use function array_pop;
use function get_class;

/**
 * AbstractWidget is the base class for widgets. A widget is a reusable component that can be used in different views.
 * It encapsulates the rendering logic of a particular UI component.
 */
abstract class AbstractWidget extends Base\AbstractBaseWidget
{
    use Attribute\HasAttributes;

    /**
     * The attributes for the widget.
     */
    protected array $attributes = [];

    final public static function end(): string
    {
        $class = static::class;

        if (self::$stack === []) {
            throw new RuntimeException("Unexpected $class::end() call. A matching begin() is not found.");
        }

        $widget = array_pop(self::$stack);
        $widgetClass = get_class($widget);

        if ($widgetClass !== static::class) {
            throw new RuntimeException("Expecting end() of $widgetClass found $class.");
        }

        return $widget->render();
    }

    final public function render(): string
    {
        if (!$this->beforeRun()) {
            return '';
        }

        return $this->afterRun($this->run());
    }

    final public static function widget(array $construct = [], array $definitions = []): static
    {
        $reflection = new ReflectionClass(static::class);

        if ($construct !== []) {
            unset($definitions['__construct()']);
        }

        $widget = $reflection->newInstanceArgs($construct);

        return Factory\SimpleWidgetFactory::factory($definitions, $widget);
    }
}
