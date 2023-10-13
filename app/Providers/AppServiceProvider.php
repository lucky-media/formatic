<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Statamic\Statamic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Statamic\Fieldtypes\Section::makeSelectableInForms();
        \Statamic\Fieldtypes\ButtonGroup::makeSelectableInForms();
        \Statamic\Fieldtypes\Date::makeSelectableInForms();
        \Statamic\Fieldtypes\Range::makeSelectableInForms();
        \Statamic\Fieldtypes\Lists::makeSelectableInForms();


         \Statamic\Fieldtypes\Checkboxes::appendConfigField('grid_options', [
            'type' => 'button_group',
            'options' => [
                'column' => 'One Column Grid',
                'grid-2' => 'Two Column Grid',
                'grid-3' => 'Three Column Grid',
                'grid-4' => 'Four Column Grid',
            ],
            'default' => 'grid-2',
            'display' => 'Display Options',
            'instructions' => 'How should the checkboxes be displayed?',
            'icon' => 'button_group',
            'listable' => 'hidden',
            'instructions_position' => 'above',
            'visibility' => 'visible',
            'hide_display' => false,
            'unless' => [
                'inline' => true,
            ],
        ]);
        // Statamic::vite('app', [
        //     'resources/js/cp.js',
        //     'resources/css/cp.css',
        // ]);
    }
}
