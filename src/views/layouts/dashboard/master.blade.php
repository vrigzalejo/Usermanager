<html>
    <head>
        @if(App::environment('local'))
            @foreach(Config::get('usermanager::assets.css_dev') as $style)
                {{ HTML::style($style) }}
            @endforeach
        @else
            @foreach(Config::get('usermanager::assets.css_production') as $style)
                {{ HTML::style($style) }}
            @endforeach
        @endif

        @if(Config::get('usermanager::config.direction') === 'rtl')
            <link rel="stylesheet" href="{{ asset('packages/vrigzalejo/usermanager/assets/css/bootstrap-rtl.min.css') }}" media="all">
            <link rel="stylesheet" href="{{ asset('packages/vrigzalejo/usermanager/assets/css/base-rtl.css') }}" media="all">
        @endif
        <link rel="stylesheet" href="{{ asset('packages/vrigzalejo/usermanager/assets/css/toggle-switch.css') }}" />

        <link rel="stylesheet" href="{{ asset('packages/vrigzalejo/usermanager/assets/css/base.css') }}" media="all">

        <link rel="stylesheet" href="{{ asset('packages/vrigzalejo/usermanager/assets/css/style.css') }}" media="all">


        @if(Config::get('usermanager::config.direction') === 'rtl')
            <link rel="stylesheet" href="{{ asset('packages/vrigzalejo/usermanager/assets/css/base-rtl.css') }}" media="all">
        @endif

        @if (!empty($favicon))
        <link rel="icon" {{ !empty($faviconType) ? 'type="' . $faviconType . '"' : '' }} href="{{ $favicon }}" />
        @endif

        @if(App::environment('local'))
            @foreach(Config::get('usermanager::assets.js_dev') as $script)
                {{ HTML::script($script) }}
            @endforeach
        @else
            @foreach(Config::get('usermanager::assets.js_production') as $script)
                {{ HTML::script($script) }}
            @endforeach
        @endif


        @if(App::environment('local'))
            <script>
                videojs.options.flash.swf = {{ Config::get('usermanager::assets.videojs_swf_dev') }}
            </script>
        @else
            <script>
                videojs.options.flash.swf = {{ Config::get('usermanager::assets.videojs_swf_production') }}
            </script>
        @endif


        <script src="{{ asset('packages/vrigzalejo/usermanager/assets/js/dashboard/base.js') }}"></script>

        <title>{{ (!empty($siteName)) ? $siteName : "User Manager"}} - {{isset($title) ? $title : '' }}</title>
    </head>
    <body>

        @include(Config::get('usermanager::views.header'))
        {{ isset($breadcrumb) ? Breadcrumbs::create($breadcrumb) : ''; }}
        <div id="content">
            @yield('content')
        </div>
    </body>
</html>
