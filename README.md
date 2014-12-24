#Versions

##1.0.1
* Removed bootstrap.min.js in config/asset.php
* Added application.js
* Fix checkbox, dropdown-list, radio button to Flat UI style

##1.0.0
* First release
* Forked from Mrjuliuss/Syntara v1.1.24
* Flat UI v2.2.2 
* VideoJS
* Added config/assets.php
* You can modify assets for development and production ( CSS and Javascripts for at this moment)
* You can set VideoJS swf for development and production





# Custom Development

## New assets

You can add some CSS and Javascripts in **app/config/packages/vrigzalejo/usermanager/assets.php**, like this. :

        /** CSS for development stage **/
    'css_dev' => array(
        '/assets/css/bootstrap.min.css',
        '/assets/css/flat-ui.min.css',
    ),
    
        /** JS for production stage **/
    'js_dev' => array(
        '/assets/js/jquery.min.js',
        '/assets/js/flat-ui.min.js',
        '/assets/js/application.js',
        '/assets/js/video.js'
    ),

   
        /** CSS for production stage **/
    'css_production'   => array(
        '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css',
        '/assets/css/flat-ui.min.css',
    ),
    
        /** JS for production stage **/
    'js_production' => array(
        '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js',
        '/assets/js/flat-ui.min.js',
        '/assets/js/application.js',
        '//vjs.zencdn.net/4.7/video.js',
    ),

        /** VideoJS SWF for development stage **/
    'videojs_swf_dev' => '/packages/vrigzalejo/usermanager/assets/js/video-js.swf',
    
        /** VideoJS SWF for production stage */
    'videojs_swf_production' => '//vjs.zencdn.net/c/video.js',


## New features

You must extend your new controller with the Usermanager BaseController, like this :

        /* app/controller/FeatureControler.php */
    use Vrigzalejo\Usermanager\Controllers\BaseController;

    class HomeController extends BaseController
    {
        public function getIndex()
        {
            $this->layout = View::make('index');
            $this->layout->title = 'My new feature';

            // add breadcrumb to current page
            $this->layout->breadcrumb = array(
                array(
                    'title' => 'My new feature',
                    'link' => 'dashboard',
                    'icon' => 'glyphicon-home'
                ),
                array(
                    'title' => 'Current Page',
                    'link' => 'dashboard/current',
                    'icon' => 'glyphicon-plus'
                ),
            );
        }

    }

To find your current loggued user, you need to add the ```basicAuth``` filter to your route : 

    Route::get('dashboard/home', array(
        'as' => 'test_home',
        'before' => 'basicAuth|hasPermissions:user.create',
        'uses' => 'HomeController@getIndex'
        )
    );

HomeController getIndex view :

        /* app/views/index.blade.php */

    @extends(Config::get('usermanager::views.master'))
    @section('content')

    {{var_dump($currentUser);}}

    @stop

## New permissions
Add permission to your new Controller route :

    Route::get('routes', array('as' => 'route_name', 'before' => 'hasPermissions:permission', 'uses' => 'Namespace\ControlerRoute'));

Where 'permission' is the name of your permission

Example :

    Route::get('blog/article/new', array('as' => 'new_article', 'before' => 'hasPermissions:create-article',
    'uses' => 'Vrigzalejo\Usermanager\Controllers\ArticleController@getCreate'));

## Custom view

To change a views by nother, you need tu override the config in ```app/routes.php``` or ```app/filters.php``` :

    Config::set('usermanager::views.dashboard-index', 'my-view')

Please see ```usermanager/src/config/views.php``` for more views

## Change site name

You can set the site name with View::composer in filters.php (or routes.php)

    View::composer('usermanager::layouts.dashboard.master', function($view)
    {
        $view->with('siteName', 'My Site');
    });

## Extend the user navigation

Pass in 2 views, 'left-nav' and 'right-nav'. These add links to the left or right of the navigation bar.

    View::composer('usermanager::layouts.dashboard.master', function($view)
    {
        $view->nest('navPages', 'left-nav');
        $view->nest('navPagesRight', 'right-nav');
    });

View ```left-nav.blade.php``` example :

    <li class=""><a href=""><i class="glyphicon glyphicon-home"></i> <span>Home</span></a></li>
    <li class="dropdown" >
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-home"></i> <span>Blog</span></a>
        <ul class="dropdown-menu">
            <li><a href="">Articles</a></li>
            <li><a href="">Comments</a></li>
        </ul>
    </li>


## Favicon

To add your own favicon to Usermanager, you need to use a view composer

    View::composer('usermanager::layouts.dashboard.master', function($view)
    {
        $view->with('favicon', 'favicon_path');
        $view->with('faviconType', 'favicon_type');
    });


## Lists

** Not yet release, available only on development branch **

Possibility to change number of items per page in lists (users/groups/permissions) 
Change the ```item-perge-page``` value in the main config file : ```app/config/packages/vrigzalejo/usermanager/config.php```


## Change validator rules

Change rules in the published validator config file : ```app/config/packages/vrigzalejo/usermanager/validator.php```

more informations about rules : http://laravel.com/docs/validation

## Permissions models

In your custom development, you might need to use the permission system : 

### Permission Provider

    use Vrigzalejo\Usermanager\Models\Facades\PermissionProvider;

Find a permission by id

    $permission = PermissionProvider::findById($id);

Find a permission by value

    $permission = PermissionProvider::findByValue('value');

Find all permissions

    $permission = PermissionProvider::findAll();


### Permission Model

Create a permission 

    $attributes = array(
        'name' => 'New',
        'value' => 'new-permission',
        'description' => 'This is a new permission'
    );
    $permissionModel = PermissionProvider::createPermission($attributes);

Create an empty permission

    $permissionModel = PermissionProvider::createModel();

## User / Group models

Usermanager uses Sentry 2 models for Users & Groups management, please read Sentry 2 docs :
http://docs.cartalyst.com/sentry-2

## User activation by email

** Not yet release, available only on development branch ** 

While creating user, he can be automatically activated or activated from an email. By default, user is activated automatically, you can change the activation in **app/config/packages/vrigzalejo/usermanager/config.php**, change ```user-activation``` from **auto** to **email**

    <?php

    return array(

        /**
         * User activation :
         * Values : auto (default), email
         */
        'user-activation' => 'email',
    );

### Email in queue

Emails sent from Usermanager are automatically send in a queue. For better performance you need to config a queue component in your application : http://laravel.com/docs/queues

### Email view

Change the email activation view :

In **app/config/packages/vrigzalejo/usermanager/mails.php**, change ```user-activation-view``` with your custom view

    <?php
    return array(
        /**
         * View for user activation email
         */
        'user-activation-view' => 'usermanager::mail.user-activation',
    );

### Email object

Possibility to change the email object :

In **app/config/packages/vrigzalejo/usermanager/mails.php**, change ```user-activation-object``` with your custom object

### Email contact name

Possibility to change the email contact name :

In **app/config/packages/vrigzalejo/usermanager/mails.php**, change ```contact``` with your custom name

### Email sender

Possibility to change the email sender :

In **app/config/packages/vrigzalejo/usermanager/mails.php**, change ```email``` with your custom email

## RTL (Right to Left) languages

In **app/config/packages/vrigzalejo/usermanager/config.php** , change ```direction``` from **LTR** to **RTL**





# Usermanager

Usermanager is an admin system ( forked from Syntara ) for Laravel 4, made for user management easier.

## Features

* Authentication
* Users management
* Groups & permissions management
* Responsive design
* i18n support :
    - English (en)
    - French (fr)
    - Italian (it)
    - Romanian (ro)
    - Russian (ru)
    - Slovenian (sl)
    - Vietnamese (vi)
    - Spanish (es)
    - Swedish (se)
    - Greek (el)
    - Turkish (tr)
    - Dutch (nl)
    - Uyghur (ug)
    - Khmer (km)
    - Polish (pl)
    - Bulgarian (bg)
    - Brazilian portugese (pt-br)
    - German (de)
    - Indonesian (id)
    - Filipino (fil)

* RTL languages support

## Requirements

* **Usermanager 1.0.x** : PHP 5.4+ - Laravel 4.1.x

## Dependencies

* [Cartalyst Sentry 2 package](https://github.com/cartalyst/sentry)
* jQuery 2.x
* Twitter Bootstrap 3.x
* Flat UI 2.x




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
