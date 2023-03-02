<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Support\Form;

use Yii\FormModel\AbstractFormModel;

final class TestForm extends AbstractFormModel
{
    private array $array = [];
    private string $mĄkA = '';
    private string|null $string = '';

    public function getPlaceholders(): array
    {
        return [
            'array' => 'array',
        ];
    }
}
