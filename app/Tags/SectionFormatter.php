<?php

namespace App\Tags;

use Statamic\Statamic;
use Statamic\Tags\Tags;

class SectionFormatter extends Tags
{
    /**
     * The {{ section_formatter }} tag.
     *
     * */
    public function index()
    {
        $items = collect($this->params->get('items'))
        ->transform(function ($item, $index) {
            $step = $index + 1;
            return collect($item['fields'])->transform(function ($field) {
                    if (! array_key_exists('validate', $field)) {
                        return false;
                    }

                    if (
                        in_array('required', $field['validate']) ||
                        str($field['validate'][0])->startsWith('required_if') ||
                        str($field['validate'][0])->startsWith('required_unless') ||
                        str($field['validate'][0])->startsWith('required_with')
                    ) {
                        return $field['handle'];
                    }

                    return false;
                })->filter()->toArray();
        })->toArray();

        return json_encode($items);
    }
}
