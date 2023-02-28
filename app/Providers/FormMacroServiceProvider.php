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
                return $this->toHtmlString(sprintf("
                <div class='mb-1'>
                    <div class='max-w-xs bg-red-100 text-sm border-red-400 text-red-700 rounded-md' role='alert'>
                        <div class='flex p-4'>%s</div>
                    </div>
                </div>
                ", $errors->first($name)));
            }
        });
    }
}
