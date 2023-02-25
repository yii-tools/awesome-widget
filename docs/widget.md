## Widgets

Widgets are reusable building blocks used in views to create complex and configurable user interface elements in an object-oriented fashion. For example, a date picker widget may generate a fancy date picker that allows users to pick a date as their input.

Widgets are mainly used in `views` to generate the needed `HTML` code that displays the corresponding user interface element. They may also be used in `forms` to generate the needed `HTML` code for displaying the corresponding form field.

## Using

Widgets are primarily used in views. You can call the `Yii\Widget\AbstractWidget::widget()` method to use a widget in a view. The method has two parameters, the firts is the `constructor` parameters and the second is the `definitions` array. When you explicitly define the `constructor` parameters in the widget() method, the `constructor` in the `definitions` array will be ignored.

In the view:

```php
<?php

declare(strict_types=1);

use App\Widget\Widget;

Widget::widget()->id('id-test')->attributes(['class' => 'text-danger'])->render();
```

That would generate the following code:

```html
<id="id-test" class="text-danger">
```

## Creating

To create a widget, you need to extend the `Yii\Widget\AbstractWidget::class` and implement the `Yii\Widget\Widget::run()` protected method. The `run()` method will be called by the widget() method when you use the widget in a view.

For example, the following code creates a simple widget named `Widget`:

```php
<?php

declare(strict_types=1);

namespace App\Widget;

use Yiisoft\Widget\AbstractWidget;

final class Widget extends AbstractWidget
{
    protected function run(): string
    {
        return 'myWidget';
    }
}
```

## Capturing content

Widgets may capture the content enclosed between the `begin()` and `end()` calls. This is useful when you want to generate a widget that contains some content. For example, you may want to generate a widget that mimic opening and closing HTML tags.

For your widget to do this, you need override the `parent begin()` method and don't forget to call `parent::begin()`:

```php
<?php

declare(strict_types=1);

namespace App\Widget;

use Yiisoft\Widget\AbstractWidget;

final class Widget extends AbstractWidget
{
    public function begin(): string
    {
        parent::begin();

        ob_start();
        ob_implicit_flush(false);

        return '';
    }

    public function render(): string
    {
        return (string) ob_get_clean();
    }
}
```

Then you can use the widget like the following:

```php
<?= Widget::widget()->begin() ?>
    Content
<?= Widget::end() ?>
```

## Before run

The `beforeRun()` method is called right before running the widget. The return value of the method will determine whether the widget should continue to run. When overriding this method, make sure you call the `parent` implementation like the following:

```php
protected function beforeRun(): bool
{
    parent::beforeRun();

    // your custom code here

    return true; // or false to not run the widget
}
```

## After run

The `afterRun()` method is called right after running the widget. The return value of the method will be used as the widget's return value. When overriding this method, make sure you call the `parent` implementation like the following:

```php
protected function afterRun(string $result): string
{
    $result = parent::afterRun($result);

    // your custom code here

    return $result;
}
```

