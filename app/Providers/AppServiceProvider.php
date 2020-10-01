<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('attributeTemplate', function ($expression) {
            return "<?php echo attributeTemplate({$expression}); ?>";
        });
        
        Blade::directive('nextKey', function ($parentValue) {
            return "<?php echo nextKey({$parentValue}); ?>";
        });

        Blade::directive('languageSwitch', function () {
            return "<?php echo languageSwitch(); ?>";
        });
    }
}
