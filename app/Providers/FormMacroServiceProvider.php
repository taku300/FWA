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
                return $this->toHtmlString(sprintf('
                <div>
                    <div class="max-w-xs bg-gray-800 text-sm text-red-600 rounded-md" role="alert">
                        <div class="flex p-4">%s</div>
                    </div>
                </div>
                ', $errors->first($name)));
            }
        });
    }
}
