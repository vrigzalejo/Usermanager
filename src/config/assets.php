<?php

return array(
    /***********************************************************
     * Set the local environment first in bootstrap/start.php
     *
     * Replace this one:
     *
     *     $env = $app->detectEnvironment(array(
     *
     *      'local' => array('homestead'),
     *
     *     ));
     *
     *
     * With this one below:
     *
     *     $env = $app->detectEnvironment(function()
     *     {
     *
     *       return getenv('APP_ENV') ?: 'local';
     *
     *     });
     *
     **********************************************************/


    /**
     * CSS for development stage
     */
    'css_dev' => array(
        '/packages/vrigzalejo/usermanager/assets/css/bootstrap.min.css',
        '/packages/vrigzalejo/usermanager/assets/css/flat-ui.min.css',
    ),
    /**
     * JS for production stage
     */
    'js_dev' => array(
        '/packages/vrigzalejo/usermanager/assets/js/jquery.min.js',
        '/packages/vrigzalejo/usermanager/assets/js/flat-ui.min.js',
        '/packages/vrigzalejo/usermanager/assets//js/application.js',
        '/packages/vrigzalejo/usermanager/assets/js/video.js',
    ),


    /**
     * CSS for production stage
     */
    'css_production' => array(
        '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css',
        '//designmodo.github.io/Flat-UI/dist/css/flat-ui.min.css',
    ),
    /**
     * JS for production stage
     */
    'js_production' => array(
        '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js',
        '//designmodo.github.io/Flat-UI/dist/js/flat-ui.min.js',
        '//designmodo.github.io/Flat-UI/docs/assets/js/application.js',
        '//vjs.zencdn.net/4.7/video.js',
    ),


    /**
     * VideoJS SWF for development stage
     * Wrap it with quotes e.g. '"/packages/vrigzalejo/usermanager/assets/js/video-js.swf"'
     */
    'videojs_swf_dev' => '"/packages/vrigzalejo/usermanager/assets/js/video-js.swf"',
    /**
     * VideoJS SWF for production stage
     * Wrap it with quotes e.g. '"//vjs.zencdn.net/c/video.js"'
     */
    'videojs_swf_production' => '"//vjs.zencdn.net/c/video.js"',
);
