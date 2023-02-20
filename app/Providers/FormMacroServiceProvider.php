<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FormMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Form::macro('error', function ($name) {
            $errors = view()->shared('errors');
            if ($errors->has($name)) {
                return $this->toHtmlString(sprintf('<p class="text-red-500 text-[14px]"><i>%s</i></p>', $errors->first($name)));
            }
        });
    }
}
