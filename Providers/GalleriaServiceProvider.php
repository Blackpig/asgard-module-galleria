<?php namespace Modules\Galleria\Providers;

use Illuminate\Support\ServiceProvider;

class GalleriaServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Galleria\Repositories\GalleriaRepository',
            function () {
                $repository = new \Modules\Galleria\Repositories\Eloquent\EloquentGalleriaRepository(new \Modules\Galleria\Entities\Galleria());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Galleria\Repositories\Cache\CacheGalleriaDecorator($repository);
            }
        );
// add bindings

    }
}
