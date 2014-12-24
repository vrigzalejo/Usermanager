# Installation

You need to have an installed Laravel 4, if not : please read the [L4 install doc](http://laravel.com/docs/installation)

## Composer
In the require key of composer.json file add the following line


If your application uses **Laravel 4.1/4.2** :

```"vrigz/usermanager": "1.0.x"```

Run the **Composer** update command

```composer update```

## Application

### Config providers & alias

In **app/config/app.php** <br/>
Add ```'Cartalyst\Sentry\SentryServiceProvider'``` <br/>and ```'Vrigzalejo\Usermanager\SyntaraServiceProvider'``` to the end of the **$providers** array


    'providers' => array(
        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Auth\AuthServiceProvider',
        ...
        'Cartalyst\Sentry\SentryServiceProvider',
        'Vrigzalejo\Usermanager\UsermanagerServiceProvider'
    ),

Add  ```'Sentry' => 'Cartalyst\Sentry\Facades\Laravel\Sentry'``` to the end of the **$aliases** array

    'aliases' => array(

        'App'             => 'Illuminate\Support\Facades\App',
        'Artisan'         => 'Illuminate\Support\Facades\Artisan',
        ...
        'Sentry'          => 'Cartalyst\Sentry\Facades\Laravel\Sentry'
    ),

Before the next step, don't forget to configure your database in ```app/config/database.php```
Please note that usermanager is **not compatible with sqlite**.

### Install command
```php artisan usermanager:install```

### Create first user 

The first user must add to the "Admin" group, to allow you an access to all features

```php artisan create:user username email password Admin```

Now you can access to the login page : ```http://your-url/dashboard/login```


### Update command

To update Usermanager, you need to start an update via composer : ```composer update```
After this update, just start ```php artisan usermanager:update```

This command does the same as the install command, only it won't publish again the config files, overwriting your changes, allowing users to run any new database migrations or publish any new assets.

## Configuration

### Staging

Set the local environment first in your project's bootstrap/start.php
 
Replace this one:

    $env = $app->detectEnvironment(array(

        'local' => array('homestead'),

    ));

  
With this one below:

    $env = $app->detectEnvironment(function()
    {

        return getenv('APP_ENV') ?: 'local';

    });



### Login

Users can be logged using **email** (default) or **username**.

In ```app/config/packages/cartalyst/sentry/config.php```, change ```login_attribute``` from ```email``` to ```username```.
