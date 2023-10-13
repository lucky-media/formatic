<?php

namespace App\Services;

use Symfony\Component\Yaml\Yaml;


class RetrieveUserPassword
{
    public static function retrieve(): array|null
   {
       $default = [
           'secret'
       ];

       $file = file_get_contents(base_path('content/globals/formatic.yaml'));

        if (! $file) {
            return $default;
        }

        $attributes = Yaml::parse($file);

        $passwords = data_get($attributes, 'data.allowed_passwords');

        if (is_null($passwords)) {
            return $default;
        }

       return $passwords;
   }
}
