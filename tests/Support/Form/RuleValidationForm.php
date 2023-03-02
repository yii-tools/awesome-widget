<?php

declare(strict_types=1);

namespace Yii\Widget\Tests\Support\Form;

use Yii\FormModel\AbstractFormModel;

final class RuleValidationForm extends AbstractFormModel
{
    private array $array = [];
    private string|null $string = '';

    public function getRuleOptionsAttribute(string $attribute): array
    {
        return match ($attribute) {
            'string' => ['required' => true],
            default => [],
        };
    }
}
