<?php

declare(strict_types=1);

namespace Yii\Widget\Factory;

use Yii\Widget\AbstractWidget;

use function call_user_func_array;
use function str_ends_with;
use function substr;

final class SimpleWidgetFactory
{
    public static function factory(array $definitions, AbstractWidget $widget): AbstractWidget
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

        /** @psalm-var AbstractWidget $widget */
        return $widget;
    }
}
