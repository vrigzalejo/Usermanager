<?php namespace Vrigzalejo\Usermanager;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Environment;

class UsermanagerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	
	public function boot()
	{
		$this->package('vrigzalejo/usermanager');
		$this->loadIncludes();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	

		// load package config
	public function register()
	{
        // load package config
		$this->app['config']->package('vrigzalejo/usermanager', __DIR__.'/../../config');
        // add the user seed command to the application
		$this->app['create:user'] = $this->app->share(function ($app) {
			return new Commands\UserSeedCommand($app);
		});
        // add the install command to the application
		$this->app['usermanager:install'] = $this->app->share(function ($app) {
			return new Commands\InstallCommand($app);
		});
        // add the update command to the application
		$this->app['usermanager:update'] = $this->app->share(function ($app) {
			return new Commands\UpdateCommand($app);
		});
        // register helpers
		$this->registerHelpers();
        // register models
		$this->registerModels();
        // add commands
		$this->commands('create:user');
		$this->commands('usermanager:install');
		$this->commands('usermanager:update');
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
    /**
     * Include some specific files from the src-root.
     *
     * @return void
     */
    private function loadIncludes()
    {
        // Add file names without the `php` extension to this list as needed.
    	$filesToLoad = array(
    		'composers',
    		'filters',
    		'routes',
    		);
        // Run through $filesToLoad array.
    	foreach ($filesToLoad as $file) {
            // Add needed database structure and file extension.
    		$file = __DIR__ . '/../../' . $file . '.php';
            // If file exists, include.
    		if (is_file($file)) include $file;
    	}
    }
    /**
    * Register helpers in app
    */
    public function registerHelpers()
    {
        // register breadcrumbs
    	$this->app['breadcrumbs'] = $this->app->share(function () {
    		return new \Vrigzalejo\Usermanager\Helpers\Breadcrumbs\Breadcumbs();
    	});
        // shortcut so developers don't need to add an Alias in app/config/app.php
    	$this->app->booting(function () {
    		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
    		$loader->alias('Breadcrumbs', 'Vrigzalejo\Usermanager\Helpers\Breadcrumbs\Facades\Breadcrumbs');
    	});
    }
    public function registerModels()
    {
        // register permission provider
    	$this->app['permissionProvider'] = $this->app->share(function () {
    		return new \Vrigzalejo\Usermanager\Models\Permissions\PermissionProvider();
    	});
        // add permission provider to aliases
    	$this->app->booting(function () {
    		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
    		$loader->alias('PermissionProvider', 'Vrigzalejo\Usermanager\Facades\PermissionProvider');
    	});
    }


}
