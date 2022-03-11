<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        view()->composer('layout.sidebar', function ($view) {
            $view->with('tagsCloud', \App\Models\Tag::tagsCloud());
        });

        Blade::component('components.alert', 'alert');

        Blade::directive('admin', function ($name) {
            return "<?php if ($name == 'admin') { ?>";
        });

        Blade::directive('elseadmin', function () {
            return '<?php } else { ?>';
        });

        Blade::directive('endadmin', function () {
            return '<?php } ?>';
        });
    }
}
