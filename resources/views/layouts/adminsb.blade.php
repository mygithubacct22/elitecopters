<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Elitecopters') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
    @yield('styles')
        <style>
            @yield('inline_styles')
            /* 46726564204a61636f6220536f726961 ; */
        </style>
    </head>
    <body>
         <div class="wrapper">
        <div id="app">
           
            @include('nav')

            <main class="py-4">
                @yield('content')
            </main>
            
              
              <div class="push"></div>
            </div>
            
                @include('footer')
          
        </div>
        @yield('scripts')
        <script type="text/javascript">
            @yield('inline_js')
        </script>

           
    </body>
</html>
