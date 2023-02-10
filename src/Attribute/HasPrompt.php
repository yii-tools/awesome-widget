<?php

declare(strict_types=1);

namespace Yii\Widget\Attribute;

use Yii\Html\Tag;

/**
 * HasPrompt is used by widgets that can have a prompt option.
 */
trait HasPrompt
{
    private string $prompt = '';

    /**
     * Returns a new instances with the prompt option can be used to define a string that will be displayed on the first
     * line of the drop-down list widget.
     *
     * @param string $content The prompt content.
     * @param string $value The value for the prompt.
     */
    public function prompt(string $content, string $value = ''): static
    {
        $attributes = [];

        if ($value !== '') {
            $attributes['value'] = $value;
        }

        $new = clone $this;
        $new->prompt = Tag::create('option', $content, $attributes);

        return $new;
    }
}
