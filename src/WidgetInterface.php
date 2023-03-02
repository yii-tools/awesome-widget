<?php

declare(strict_types=1);

namespace Yii\Widget;

use Stringable;
use RuntimeException;

/**
 * AbstractBaseWidget is the base class for widgets. A widget is a reusable component that can be used in different
 * views.
 */
interface WidgetInterface extends Stringable
{
    /**
     * Used to open a wrapping widget (the one with begin/end).
     *
     * When implementing this method, don't forget to call parent::begin().
     *
     * @return string Opening part of widget markup.
     */
    public function begin(): string;

    /**
     * Executes the widget.
     *
     * @return string The result of widget execution to be outputted.
     */
    public function render(): string;

    /**
     * Checks that the widget was opened with {@see begin()}. If so, runs it and returns content generated.
     *
     * @throws RuntimeException
     */
    public static function end(): string;

    /**
     * Creates a widget instance.
     *
     * @param array $construct The constructor arguments for the widget.
     * @param array $definitions The configuration array for factory.
     */
    public static function widget(array $construct = [], array $definitions = []): WidgetInterface;
}
