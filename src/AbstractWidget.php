<?php

declare(strict_types=1);

namespace Yii\Widget;

use ReflectionClass;
use ReflectionException;
use RuntimeException;
use Stringable;

use function array_pop;
use function call_user_func_array;
use function get_class;
use function str_ends_with;
use function substr;

/**
 * AbstractWidget is the base class for widgets. A widget is a reusable component that can be used in different views.
 * It encapsulates the rendering logic of a particular UI component.
 */
abstract class AbstractWidget implements Stringable
{
    use Attribute\HasAttributes;

    protected array $attributes = [];

    public function __construct()
    {
    }

    /**
     * Renders widget content.
     *
     * This method is used by {@see render()} and is meant to be overridden when implementing concrete widget.
     */
    abstract protected function run(): string;

    /**
     * The widgets that are currently opened and not yet closed.
     * This property is maintained by {@see begin()} and {@see end()} methods.
     *
     * @var static[]
     */
    private static array $stack = [];

    /**
     * Used to open a wrapping widget (the one with begin/end).
     *
     * When implementing this method, don't forget to call parent::begin().
     *
     * @return string Opening part of widget markup.
     */
    public function begin(): string
    {
        self::$stack[] = $this;

        return '';
    }

    /**
     * Allows not to call `->render()` explicitly:
     *
     * ```php
     * <?= MyWidget::create(); ?>
     * ```
     */
    final public function __toString(): string
    {
        return $this->run();
    }

    /**
     * Creates a widget instance.
     *
     * @param array $construct The constructor arguments for the widget.
     * @param array $definitions The configuration array for factory.
     *
     * @throws ReflectionException
     */
    final public static function widget(array $construct = [], array $definitions = []): static
    {
        $reflection = new ReflectionClass(static::class);

        if ($construct !== []) {
            unset($definitions['__construct()']);
        }

        $widget = $reflection->newInstanceArgs($construct);

        return $widget->factory($definitions, $widget);
    }

    /**
     * Checks that the widget was opened with {@see begin()}. If so, runs it and returns content generated.
     *
     * @throws RuntimeException
     */
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

    /**
     * Executes the widget.
     *
     * @return string The result of widget execution to be outputted.
     */
    final public function render(): string
    {
        if (!$this->beforeRun()) {
            return '';
        }

        return $this->afterRun($this->run());
    }

    /**
     * This method is invoked right after a widget is executed.
     *
     * The return value of the method will be used as the widget return value.
     *
     * If you override this method, your code should look like the following:
     *
     * ```php
     * public function afterRun(string $result): string
     * {
     *     $result = parent::afterRun($result);
     *     // your custom code here
     *     return $result;
     * }
     * ```
     *
     * @param string $result The widget return result.
     *
     * @return string The processed widget result.
     */
    protected function afterRun(string $result): string
    {
        return $result;
    }

    /**
     * This method is invoked right before the widget is executed.
     *
     * The return value of the method will determine whether the widget should continue to run.
     *
     * When overriding this method, make sure you call the parent implementation like the following:
     *
     * ```php
     * public function beforeRun(): bool
     * {
     *     if (!parent::beforeRun()) {
     *         return false;
     *     }
     *
     *     // your custom code here
     *
     *     return true; // or false to not run the widget
     * }
     * ```
     *
     * @return bool Whether the widget should continue to be executed.
     */
    protected function beforeRun(): bool
    {
        return true;
    }

    private function factory(array $definitions, self $widget): static
    {
        /**
         * @var array<string, mixed> $definitions
         * @var mixed $arguments
         */
        foreach ($definitions as $action => $arguments) {
            if (str_ends_with($action, '()')) {
                /** @var mixed */
                $setter = call_user_func_array([$widget, substr($action, 0, -2)], $arguments);

                if ($setter instanceof $widget) {
                    /** @var object */
                    $widget = $setter;
                }
            }
        }

        /** @psalm-var static $widget */
        return $widget;
    }
}
